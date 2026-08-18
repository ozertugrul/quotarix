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
        $meta = page_meta('why');

        return view('pages.why', compact('meta'));
    }

    public function show(string $slug): View|RedirectResponse
    {
        $page = Page::active()->where('slug', $slug)->firstOrFail();

        // If it's a meta record without content body, redirect to named route permanently (301)
        if (is_null($page->body) && $page->key !== null) {
            return match ($page->key) {
                'home' => redirect()->route('home', [], 301),
                'features_index' => redirect()->route('features', [], 301),
                'why' => redirect()->route('why', [], 301),
                'roadmap' => redirect()->route('roadmap', [], 301),
                'pricing' => redirect()->route('pricing', [], 301),
                'blog_index' => redirect()->route('blog', [], 301),
                'faq' => redirect()->route('faq', [], 301),
                'demo' => redirect()->route('demo', [], 301),
                'contact' => redirect()->route('contact', [], 301),
                default => abort(404),
            };
        }

        return view('pages.legal', compact('page'));
    }
}
