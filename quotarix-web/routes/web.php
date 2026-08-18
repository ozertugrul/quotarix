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

// Yasal sayfalar + diğer DB sayfaları — EN SONDA (catch-all)
Route::get('{slug}', [PageController::class, 'show'])
    ->where('slug', '[a-z0-9-]+')
    ->name('page');
