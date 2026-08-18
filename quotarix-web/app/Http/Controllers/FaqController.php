<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(): View
    {
        $faqs = Faq::active()->get();
        $meta = Page::where('key', 'faq')->first();

        return view('pages.faq', compact('faqs', 'meta'));
    }
}
