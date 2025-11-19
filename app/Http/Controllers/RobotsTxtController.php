<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class RobotsTxtController extends Controller
{
    public function index()
    {
        $baseUrl = url('/');

        $robotsTxt = "# Robots.txt for EngBuddy\n";
        $robotsTxt .= "# English Tutor Platform Thailand\n\n";

        $robotsTxt .= "User-agent: *\n";
        $robotsTxt .= "Allow: /\n";
        $robotsTxt .= "Disallow: /admin/\n";
        $robotsTxt .= "Disallow: /dashboard/\n";
        $robotsTxt .= "Disallow: /api/\n";
        $robotsTxt .= "Disallow: /*.json$\n";
        $robotsTxt .= "Disallow: /storage/\n";
        $robotsTxt .= "Disallow: /vendor/\n";
        $robotsTxt .= "Disallow: /login\n";
        $robotsTxt .= "Disallow: /register\n\n";

        $robotsTxt .= "# Sitemap\n";
        $robotsTxt .= "Sitemap: {$baseUrl}/sitemap.xml\n\n";

        $robotsTxt .= "# Crawl-delay (optional)\n";
        $robotsTxt .= "# Crawl-delay: 1\n";

        return response($robotsTxt, 200)
            ->header('Content-Type', 'text/plain');
    }
}
