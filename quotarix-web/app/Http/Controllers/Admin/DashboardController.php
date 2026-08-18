<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Lead;
use App\Models\Plan;
use App\Models\Post;
use App\Models\Section;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $unreadLeads = Lead::unread()->count();
        $totalLeads = Lead::count();
        $featuresCount = Feature::count();
        $postsCount = Post::count();
        $plansCount = Plan::count();

        $recentLeads = Lead::latest()->take(5)->get();
        $toggleableSections = Section::whereIn('key', ['pricing', 'testimonials', 'video'])->get();

        return view('admin.dashboard', compact(
            'unreadLeads',
            'totalLeads',
            'featuresCount',
            'postsCount',
            'plansCount',
            'recentLeads',
            'toggleableSections'
        ));
    }
}
