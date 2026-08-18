<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $xml = Cache::remember('sitemap_xml', 3600 * 6, function () {
            $urls = [];

            // Static pages
            $urls[] = ['loc' => url('/'), 'priority' => '1.0', 'changefreq' => 'weekly'];
            $urls[] = ['loc' => route('features'), 'priority' => '0.9', 'changefreq' => 'weekly'];
            $urls[] = ['loc' => route('why'), 'priority' => '0.8', 'changefreq' => 'monthly'];
            $urls[] = ['loc' => route('roadmap'), 'priority' => '0.7', 'changefreq' => 'monthly'];
            $urls[] = ['loc' => route('pricing'), 'priority' => '0.8', 'changefreq' => 'weekly'];
            $urls[] = ['loc' => route('blog'), 'priority' => '0.8', 'changefreq' => 'daily'];
            $urls[] = ['loc' => route('faq'), 'priority' => '0.7', 'changefreq' => 'monthly'];
            $urls[] = ['loc' => route('demo'), 'priority' => '0.9', 'changefreq' => 'monthly'];
            $urls[] = ['loc' => route('contact'), 'priority' => '0.7', 'changefreq' => 'monthly'];

            // Features detail
            foreach (Feature::mainFeatures()->get() as $feature) {
                $urls[] = [
                    'loc' => route('features.show', $feature->slug),
                    'priority' => '0.8',
                    'changefreq' => 'weekly',
                    'lastmod' => $feature->updated_at->toAtomString(),
                ];
            }

            // Blog posts
            foreach (Post::published()->get() as $post) {
                $urls[] = [
                    'loc' => route('blog.show', $post->slug),
                    'priority' => '0.7',
                    'changefreq' => 'monthly',
                    'lastmod' => ($post->updated_at ?: $post->published_at)->toAtomString(),
                ];
            }

            // Legal pages
            foreach (Page::active()->whereNotNull('body')->get() as $page) {
                $urls[] = [
                    'loc' => route('page', $page->slug),
                    'priority' => '0.5',
                    'changefreq' => 'monthly',
                    'lastmod' => $page->updated_at->toAtomString(),
                ];
            }

            $content = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
            $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
            foreach ($urls as $u) {
                $content .= '  <url>' . PHP_EOL;
                $content .= '    <loc>' . htmlspecialchars($u['loc'], ENT_XML1, 'UTF-8') . '</loc>' . PHP_EOL;
                if (!empty($u['lastmod'])) {
                    $content .= '    <lastmod>' . $u['lastmod'] . '</lastmod>' . PHP_EOL;
                }
                $content .= '    <changefreq>' . $u['changefreq'] . '</changefreq>' . PHP_EOL;
                $content .= '    <priority>' . $u['priority'] . '</priority>' . PHP_EOL;
                $content .= '  </url>' . PHP_EOL;
            }
            $content .= '</urlset>';

            return $content;
        });

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
