<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class FeatureController extends Controller
{
    public function index(): View
    {
        $features = Feature::orderBy('sort_order', 'asc')->get();

        return view('admin.features.index', compact('features'));
    }

    public function create(): View
    {
        return view('admin.features.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:features,slug'],
            'icon' => ['nullable', 'string', 'max:100'],
            'summary' => ['nullable', 'string', 'max:500'],
            'body' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'badge' => ['nullable', 'string', 'max:50'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = store_image($request->file('image'), 'features');
        }

        Feature::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'icon' => $validated['icon'] ?? 'bi-stars',
            'summary' => $validated['summary'] ?? null,
            'body' => $validated['body'] ?? null,
            'image' => $imagePath,
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'badge' => $validated['badge'] ?: null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.features.index')->with('success', 'Özellik başarıyla oluşturuldu.');
    }

    public function edit(Feature $feature): View
    {
        return view('admin.features.edit', compact('feature'));
    }

    public function update(Request $request, Feature $feature): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:features,slug,' . $feature->id],
            'icon' => ['nullable', 'string', 'max:100'],
            'summary' => ['nullable', 'string', 'max:500'],
            'body' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'badge' => ['nullable', 'string', 'max:50'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $imagePath = $feature->image;
        if ($request->hasFile('image')) {
            $imagePath = store_image($request->file('image'), 'features');
        }

        $feature->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['slug']),
            'icon' => $validated['icon'] ?? $feature->icon,
            'summary' => $validated['summary'] ?? null,
            'body' => $validated['body'] ?? null,
            'image' => $imagePath,
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'badge' => $validated['badge'] ?: null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.features.index')->with('success', 'Özellik başarıyla güncellendi.');
    }

    public function destroy(Feature $feature): RedirectResponse
    {
        $feature->delete();

        return redirect()->route('admin.features.index')->with('success', 'Özellik silindi.');
    }
}
