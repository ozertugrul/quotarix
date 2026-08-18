<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('ozellikler', [FeatureController::class, 'index'])->name('features');
Route::get('ozellikler/{slug}', [FeatureController::class, 'show'])->name('features.show');
Route::get('yol-haritasi', [FeatureController::class, 'roadmap'])->name('roadmap');

Route::get('neden-quotarix', [PageController::class, 'why'])->name('why');
Route::get('fiyatlandirma', [PlanController::class, 'index'])->name('pricing');

Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::get('blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('sss', [FaqController::class, 'index'])->name('faq');

Route::get('demo', [LeadController::class, 'demo'])->name('demo');
Route::post('demo', [LeadController::class, 'store'])->name('demo.store');
Route::get('iletisim', [LeadController::class, 'contact'])->name('contact');
Route::post('iletisim', [LeadController::class, 'store'])->name('contact.store');

// Sitemap
Route::get('sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Admin
    Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [\App\Http\Controllers\Admin\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

    // Authenticated Admin (auth:admin)
    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        // 1. Sections (AJAX switch & SortableJS)
        Route::get('sections', [\App\Http\Controllers\Admin\SectionController::class, 'index'])->name('sections.index');
        Route::post('sections/{section}/toggle', [\App\Http\Controllers\Admin\SectionController::class, 'toggle'])->name('sections.toggle');
        Route::post('sections/reorder', [\App\Http\Controllers\Admin\SectionController::class, 'reorder'])->name('sections.reorder');

        // 2. Features CRUD
        Route::resource('features', \App\Http\Controllers\Admin\FeatureController::class);

        // 3. Blog Posts CRUD
        Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);

        // 4. FAQs CRUD + Reorder
        Route::post('faqs/reorder', [\App\Http\Controllers\Admin\FaqController::class, 'reorder'])->name('faqs.reorder');
        Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class);

        // 5. Plans CRUD
        Route::resource('plans', \App\Http\Controllers\Admin\PlanController::class);

        // 6. Testimonials CRUD + Toggle
        Route::post('testimonials/{testimonial}/toggle', [\App\Http\Controllers\Admin\TestimonialController::class, 'toggle'])->name('testimonials.toggle');
        Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);

        // 7. Videos CRUD
        Route::resource('videos', \App\Http\Controllers\Admin\VideoController::class);

        // 8. Leads / Talepler
        Route::get('leads/export', [\App\Http\Controllers\Admin\LeadController::class, 'exportCsv'])->name('leads.export');
        Route::post('leads/{lead}/toggle-read', [\App\Http\Controllers\Admin\LeadController::class, 'toggleRead'])->name('leads.toggle-read');
        Route::resource('leads', \App\Http\Controllers\Admin\LeadController::class)->only(['index', 'show', 'destroy']);

        // 9. Pages (Legal & Meta)
        Route::resource('pages', \App\Http\Controllers\Admin\PageController::class)->only(['index', 'edit', 'update']);

        // 10. Settings
        Route::get('settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
    });
});

/*
|--------------------------------------------------------------------------
| Dynamic Pages (Catch-All - MUST BE AT THE VERY END)
|--------------------------------------------------------------------------
*/
Route::get('{slug}', [PageController::class, 'show'])
    ->where('slug', '[a-z0-9-]+')
    ->name('page');
