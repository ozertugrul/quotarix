<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VideoController extends Controller
{
    public function index(): View
    {
        $videos = Video::orderBy('sort_order', 'asc')->get();

        return view('admin.videos.index', compact('videos'));
    }

    public function create(): View
    {
        return view('admin.videos.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'video_url' => ['required', 'string', 'max:500'],
            'placement' => ['required', 'in:home,features,why'],
            'thumbnail' => ['nullable', 'image', 'max:4096'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $thumbPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbPath = store_image($request->file('thumbnail'), 'videos');
        }

        Video::create([
            'title' => $validated['title'],
            'video_url' => $validated['video_url'],
            'placement' => $validated['placement'],
            'thumbnail' => $thumbPath,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.videos.index')->with('success', 'Video başarıyla eklendi.');
    }

    public function edit(Video $video): View
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'video_url' => ['required', 'string', 'max:500'],
            'placement' => ['required', 'in:home,features,why'],
            'thumbnail' => ['nullable', 'image', 'max:4096'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $thumbPath = $video->thumbnail;
        if ($request->hasFile('thumbnail')) {
            $thumbPath = store_image($request->file('thumbnail'), 'videos');
        }

        $video->update([
            'title' => $validated['title'],
            'video_url' => $validated['video_url'],
            'placement' => $validated['placement'],
            'thumbnail' => $thumbPath,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.videos.index')->with('success', 'Video güncellendi.');
    }

    public function destroy(Video $video): RedirectResponse
    {
        $video->delete();

        return redirect()->route('admin.videos.index')->with('success', 'Video silindi.');
    }
}
