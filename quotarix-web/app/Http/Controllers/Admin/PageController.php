<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(): View
    {
        $legalPages = Page::whereNotNull('body')->get();
        $metaPages = Page::whereNull('body')->get();

        return view('admin.pages.index', compact('legalPages', 'metaPages'));
    }

    public function edit(Page $page): View
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:pages,slug,' . $page->id],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'og_image' => ['nullable', 'string', 'max:255'],
            'og_image_file' => ['nullable', 'image', 'max:4096'],
            'body' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $ogImagePath = $page->og_image;
        if ($request->hasFile('og_image_file')) {
            $ogImagePath = store_image($request->file('og_image_file'), 'pages');
        } elseif (!empty($validated['og_image'])) {
            $ogImagePath = $validated['og_image'];
        }

        $page->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['slug']),
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'og_image' => $ogImagePath,
            'body' => $validated['body'] ?? $page->body,
            'is_active' => $request->boolean('is_active', true),
        ]);

        Cache::forget('site_page_metas');

        return redirect()->route('admin.pages.index')->with('success', 'Sayfa içeriği ve meta bilgileri güncellendi.');
    }
}
