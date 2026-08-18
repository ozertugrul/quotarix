<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectLegacyHtml
{
    /**
     * Map of legacy .html URLs to new SEO-friendly routes.
     */
    protected array $redirectMap = [
        'kvkk.html' => '/kvkk',
        'privacy-policy.html' => '/gizlilik-politikasi',
        'privacy-policy' => '/gizlilik-politikasi',
        'terms-of-service.html' => '/kullanim-kosullari',
        'terms-of-service' => '/kullanim-kosullari',
        'mesafeli-satis-sozlesmesi.html' => '/mesafeli-satis-sozlesmesi',
        'iptal-iade-politikasi.html' => '/iptal-ve-iade-politikasi',
        'iptal-iade-politikasi' => '/iptal-ve-iade-politikasi',
        'teslimat-bilgileri.html' => '/teslimat-bilgileri',
        'on-bilgilendirme.html' => '/on-bilgilendirme',
        'index.html' => '/',
        '_index.html' => '/',
        'index copy.html' => '/',
        'index%20copy.html' => '/',
        'firsat-form-mockup.html' => '/demo',
    ];

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $path = ltrim($request->path(), '/');

        // Direct match in explicit redirect map
        if (isset($this->redirectMap[$path])) {
            return redirect($this->redirectMap[$path], 301);
        }

        // Generic fallback for any other .html request
        if (str_ends_with($path, '.html')) {
            $cleanSlug = substr($path, 0, -5);
            return redirect('/' . $cleanSlug, 301);
        }

        return $next($request);
    }
}
