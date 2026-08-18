<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::orderBy('sort_order', 'asc')->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'quote' => ['required', 'string'],
            'rating' => ['nullable', 'integer', 'min:1', 'max:5'],
            'avatar' => ['nullable', 'image', 'max:2048'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = store_image($request->file('avatar'), 'testimonials');
        }

        Testimonial::create([
            'name' => $validated['name'],
            'company' => $validated['company'] ?? null,
            'role' => $validated['role'] ?? null,
            'quote' => $validated['quote'],
            'rating' => $validated['rating'] ?? 5,
            'avatar' => $avatarPath,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Müşteri yorumu eklendi.');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'quote' => ['required', 'string'],
            'rating' => ['nullable', 'integer', 'min:1', 'max:5'],
            'avatar' => ['nullable', 'image', 'max:2048'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $avatarPath = $testimonial->avatar;
        if ($request->hasFile('avatar')) {
            $avatarPath = store_image($request->file('avatar'), 'testimonials');
        }

        $testimonial->update([
            'name' => $validated['name'],
            'company' => $validated['company'] ?? null,
            'role' => $validated['role'] ?? null,
            'quote' => $validated['quote'],
            'rating' => $validated['rating'] ?? 5,
            'avatar' => $avatarPath,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Müşteri yorumu güncellendi.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Müşteri yorumu silindi.');
    }

    public function toggle(Testimonial $testimonial): JsonResponse
    {
        $testimonial->is_active = !$testimonial->is_active;
        $testimonial->save();

        return response()->json([
            'success' => true,
            'is_active' => $testimonial->is_active,
            'message' => "Yorum durumu " . ($testimonial->is_active ? 'aktif' : 'pasif') . ' yapıldı.',
        ]);
    }
}
