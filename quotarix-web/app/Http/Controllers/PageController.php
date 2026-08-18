<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function why(): View
    {
        $meta = Page::where('key', 'why')->first();

        return view('pages.why', compact('meta'));
    }

    public function show(string $slug): View|RedirectResponse
    {
        $page = Page::active()->where('slug', $slug)->firstOrFail();

        // If it's a meta record without content body, redirect to named route
        if (is_null($page->body) && $page->key !== null) {
            return match ($page->key) {
                'home' => redirect()->route('home'),
                'features_index' => redirect()->route('features'),
                'why' => redirect()->route('why'),
                'roadmap' => redirect()->route('roadmap'),
                'pricing' => redirect()->route('pricing'),
                'blog_index' => redirect()->route('blog'),
                'faq' => redirect()->route('faq'),
                'demo' => redirect()->route('demo'),
                'contact' => redirect()->route('contact'),
                default => abort(404),
            };
        }

        return view('pages.legal', compact('page'));
    }
}
