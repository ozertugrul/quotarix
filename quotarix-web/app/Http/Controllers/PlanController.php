<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Page;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlanController extends Controller
{
    public function index(): View
    {
        $plans = Plan::active()->get();
        $meta = Page::where('key', 'pricing')->first();
        $faqs = Faq::active()->take(4)->get();

        return view('pages.pricing', compact('plans', 'meta', 'faqs'));
    }
}
