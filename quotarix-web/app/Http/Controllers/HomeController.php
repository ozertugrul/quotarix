<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Feature;
use App\Models\Plan;
use App\Models\Post;
use App\Models\Testimonial;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $features = Feature::mainFeatures()->take(3)->get();
        $roadmapFeatures = Feature::roadmap()->take(2)->get();
        $latestPosts = Post::published()->take(3)->get();
        $faqs = Faq::active()->take(3)->get();
        $plans = Plan::active()->get();
        $testimonials = Testimonial::active()->get();
        $video = Video::active()->where('placement', 'home')->first();
        $meta = page_meta('home');

        return view('pages.home', compact(
            'meta',
            'features',
            'roadmapFeatures',
            'latestPosts',
            'faqs',
            'plans',
            'testimonials',
            'video'
        ));
    }
}
