<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeadController extends Controller
{
    public function demo(): View
    {
        $meta = page_meta('demo');

        return view('pages.demo', compact('meta'));
    }

    public function contact(): View
    {
        $meta = page_meta('contact');

        return view('pages.contact', compact('meta'));
    }

    public function store(Request $request): RedirectResponse
    {
        $throttleKey = 'lead_submission|' . $request->ip();

        if (\Illuminate\Support\Facades\RateLimiter::tooManyAttempts($throttleKey, 3)) {
            $seconds = \Illuminate\Support\Facades\RateLimiter::availableIn($throttleKey);
            return back()->withErrors([
                'rate_limit' => "Çok fazla form gönderimi yaptınız. Lütfen {$seconds} saniye sonra tekrar deneyin.",
            ])->withInput();
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'message' => ['nullable', 'string', 'max:2000'],
            'source' => ['nullable', 'in:demo,contact,newsletter'],
        ]);

        \Illuminate\Support\Facades\RateLimiter::hit($throttleKey, 60);

        // Sanitize string inputs against XSS script injection
        $lead = Lead::create([
            'name' => sanitize_input($validated['name']),
            'company' => sanitize_input($validated['company'] ?? null),
            'email' => strtolower(trim($validated['email'])),
            'phone' => sanitize_input($validated['phone'] ?? null),
            'message' => sanitize_input($validated['message'] ?? null),
            'source' => $validated['source'] ?? ($request->routeIs('demo.store') ? 'demo' : 'contact'),
            'ip' => $request->ip(),
        ]);

        $successMessage = ($lead->source === 'demo')
            ? 'Demo talebiniz başarıyla alındı. Uzman ekibimiz 24 saat içinde sizinle iletişime geçecektir.'
            : 'Mesajınız başarıyla iletildi. En kısa sürede size geri dönüş yapacağız.';

        return back()->with('success', $successMessage);
    }
}
