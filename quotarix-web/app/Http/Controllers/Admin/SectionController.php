<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SectionController extends Controller
{
    public function index(): View
    {
        $sections = Section::orderBy('sort_order', 'asc')->get();

        return view('admin.sections.index', compact('sections'));
    }

    public function toggle(Section $section): JsonResponse
    {
        $section->is_active = !$section->is_active;
        $section->save();

        Cache::forget('site_active_sections');

        return response()->json([
            'success' => true,
            'is_active' => $section->is_active,
            'message' => "{$section->key} bölümü " . ($section->is_active ? 'aktif' : 'pasif') . ' yapıldı.',
        ]);
    }

    public function reorder(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'order' => ['required', 'array'],
            'order.*' => ['integer', 'exists:sections,id'],
        ]);

        foreach ($validated['order'] as $index => $id) {
            Section::where('id', $id)->update(['sort_order' => $index + 1]);
        }

        Cache::forget('site_active_sections');

        return response()->json([
            'success' => true,
            'message' => 'Bölüm sıralaması güncellendi.',
        ]);
    }
}
