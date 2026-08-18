<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlanController extends Controller
{
    public function index(): View
    {
        $plans = Plan::orderBy('sort_order', 'asc')->get();

        return view('admin.plans.index', compact('plans'));
    }

    public function create(): View
    {
        return view('admin.plans.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['nullable', 'numeric'],
            'currency' => ['nullable', 'string', 'max:10'],
            'period' => ['nullable', 'string', 'max:50'],
            'features_raw' => ['nullable', 'string'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $featuresList = $this->parseFeaturesRaw($validated['features_raw'] ?? '');

        Plan::create([
            'name' => $validated['name'],
            'price' => $validated['price'] ?? null,
            'currency' => $validated['currency'] ?: 'USD',
            'period' => $validated['period'] ?: 'ay / kullanıcı',
            'features_list' => $featuresList,
            'is_featured' => $request->boolean('is_featured'),
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.plans.index')->with('success', 'Plan başarıyla eklendi.');
    }

    public function edit(Plan $plan): View
    {
        return view('admin.plans.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['nullable', 'numeric'],
            'currency' => ['nullable', 'string', 'max:10'],
            'period' => ['nullable', 'string', 'max:50'],
            'features_raw' => ['nullable', 'string'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $featuresList = $this->parseFeaturesRaw($validated['features_raw'] ?? '');

        $plan->update([
            'name' => $validated['name'],
            'price' => $validated['price'] ?? null,
            'currency' => $validated['currency'] ?: 'USD',
            'period' => $validated['period'] ?: 'ay / kullanıcı',
            'features_list' => $featuresList,
            'is_featured' => $request->boolean('is_featured'),
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.plans.index')->with('success', 'Plan güncellendi.');
    }

    public function destroy(Plan $plan): RedirectResponse
    {
        $plan->delete();

        return redirect()->route('admin.plans.index')->with('success', 'Plan silindi.');
    }

    protected function parseFeaturesRaw(string $raw): array
    {
        $lines = preg_split('/\r\n|\r|\n/', trim($raw));
        $filtered = array_values(array_filter(array_map('trim', $lines), fn($l) => !empty($l)));

        return $filtered;
    }
}
