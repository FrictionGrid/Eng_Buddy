<?php

namespace App\Http\Controllers;

use App\Models\Student_article;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $articles = Student_article::published()
                                   ->orderBy('updated_at', 'desc')
                                   ->get();

        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Homepage
        $sitemap .= '<url>';
        $sitemap .= '<loc>' . url('/student/home') . '</loc>';
        $sitemap .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
        $sitemap .= '<changefreq>daily</changefreq>';
        $sitemap .= '<priority>1.0</priority>';
        $sitemap .= '</url>';

        // Articles Index
        $sitemap .= '<url>';
        $sitemap .= '<loc>' . route('articles.index') . '</loc>';
        $sitemap .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
        $sitemap .= '<changefreq>daily</changefreq>';
        $sitemap .= '<priority>0.9</priority>';
        $sitemap .= '</url>';

        // Course Page
        $sitemap .= '<url>';
        $sitemap .= '<loc>' . url('/student/course') . '</loc>';
        $sitemap .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
        $sitemap .= '<changefreq>weekly</changefreq>';
        $sitemap .= '<priority>0.8</priority>';
        $sitemap .= '</url>';

        // Apply Page
        $sitemap .= '<url>';
        $sitemap .= '<loc>' . url('/student/apply') . '</loc>';
        $sitemap .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
        $sitemap .= '<changefreq>monthly</changefreq>';
        $sitemap .= '<priority>0.7</priority>';
        $sitemap .= '</url>';

        // Promotion Page
        $sitemap .= '<url>';
        $sitemap .= '<loc>' . url('/student/promotion') . '</loc>';
        $sitemap .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
        $sitemap .= '<changefreq>weekly</changefreq>';
        $sitemap .= '<priority>0.7</priority>';
        $sitemap .= '</url>';

        // All Articles
        foreach ($articles as $article) {
            $sitemap .= '<url>';
            $sitemap .= '<loc>' . route('articles.show', $article->slug) . '</loc>';
            $sitemap .= '<lastmod>' . $article->updated_at->toAtomString() . '</lastmod>';
            $sitemap .= '<changefreq>weekly</changefreq>';
            $sitemap .= '<priority>0.8</priority>';
            $sitemap .= '</url>';
        }

        // Category Pages
        $categories = Student_article::published()
                                     ->select('category')
                                     ->groupBy('category')
                                     ->pluck('category');

        foreach ($categories as $category) {
            $sitemap .= '<url>';
            $sitemap .= '<loc>' . route('articles.index', ['category' => $category]) . '</loc>';
            $sitemap .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
            $sitemap .= '<changefreq>daily</changefreq>';
            $sitemap .= '<priority>0.7</priority>';
            $sitemap .= '</url>';
        }

        $sitemap .= '</urlset>';

        return response($sitemap, 200)
            ->header('Content-Type', 'application/xml');
    }
}
