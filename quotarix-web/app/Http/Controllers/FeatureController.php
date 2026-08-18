<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FeatureController extends Controller
{
    public function index(): View
    {
        $features = Feature::mainFeatures()->get();
        $roadmapFeatures = Feature::roadmap()->get();
        $meta = Page::where('key', 'features_index')->first();

        return view('pages.features', compact('features', 'roadmapFeatures', 'meta'));
    }

    public function show(string $slug): View
    {
        $feature = Feature::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $otherFeatures = Feature::mainFeatures()->where('id', '!=', $feature->id)->take(3)->get();

        return view('pages.feature-detail', compact('feature', 'otherFeatures'));
    }

    public function roadmap(): View
    {
        $roadmapFeatures = Feature::roadmap()->get();
        $meta = Page::where('key', 'roadmap')->first();

        return view('pages.roadmap', compact('roadmapFeatures', 'meta'));
    }
}
