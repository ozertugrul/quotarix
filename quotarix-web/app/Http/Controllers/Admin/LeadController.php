<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LeadController extends Controller
{
    public function index(Request $request): View
    {
        $query = Lead::orderByDesc('created_at');

        if ($request->filled('source')) {
            $query->where('source', $request->input('source'));
        }

        if ($request->input('status') === 'unread') {
            $query->unread();
        }

        $leads = $query->paginate(20)->withQueryString();
        $unreadCount = Lead::unread()->count();

        return view('admin.leads.index', compact('leads', 'unreadCount'));
    }

    public function show(Lead $lead): View
    {
        if (is_null($lead->read_at)) {
            $lead->update(['read_at' => now()]);
        }

        return view('admin.leads.show', compact('lead'));
    }

    public function toggleRead(Lead $lead): RedirectResponse
    {
        $lead->read_at = $lead->read_at ? null : now();
        $lead->save();

        return back()->with('success', 'Talep durumu güncellendi.');
    }

    public function destroy(Lead $lead): RedirectResponse
    {
        $lead->delete();

        return redirect()->route('admin.leads.index')->with('success', 'Talep silindi.');
    }

    public function exportCsv(): StreamedResponse
    {
        $fileName = 'quotarix_talepler_' . date('Y-m-d_His') . '.csv';
        $leads = Lead::orderByDesc('created_at')->get();

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$fileName}\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        return response()->stream(function () use ($leads) {
            $handle = fopen('php://output', 'w');

            // UTF-8 BOM for Microsoft Excel Turkish character support
            fprintf($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));

            // CSV Header Row
            fputcsv($handle, [
                'ID',
                'Tarih',
                'Kaynak',
                'Ad Soyad',
                'Şirket',
                'E-posta',
                'Telefon',
                'Mesaj / Not',
                'IP Adresi',
                'Okundu Durumu'
            ], ';');

            foreach ($leads as $lead) {
                fputcsv($handle, [
                    $lead->id,
                    $lead->created_at ? $lead->created_at->format('d.m.Y H:i') : '',
                    strtoupper($lead->source),
                    $lead->name,
                    $lead->company ?? '',
                    $lead->email,
                    $lead->phone ?? '',
                    $lead->message ?? '',
                    $lead->ip ?? '',
                    $lead->read_at ? 'Okundu (' . $lead->read_at->format('d.m.Y H:i') . ')' : 'Okunmadı'
                ], ';');
            }

            fclose($handle);
        }, 200, $headers);
    }
}
