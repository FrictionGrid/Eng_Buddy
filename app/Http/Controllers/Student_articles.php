<?php

namespace App\Http\Controllers;

use App\Models\Student_article;
use Illuminate\Http\Request;

class Student_articles extends Controller
{

    public function index(Request $request)
    {
        $category = $request->get('category');

        $query = Student_article::published()->orderBy('published_at', 'desc');

        if ($category) {
            $query->category($category);
        }

        $articles = $query->get();


        $categories = Student_article::published()
                            ->select('category')
                            ->selectRaw('count(*) as count')
                            ->groupBy('category')
                            ->get()
                            ->pluck('count', 'category');

        return view('Student_articles', compact('articles', 'categories'));
    }


    public function show($slug)
    {
        $article = Student_article::where('slug', $slug)->firstOrFail();

  
        $article->incrementViews();


        // Related Articles - improved algorithm
        $relatedArticles = Student_article::published()
                                  ->category($article->category)
                                  ->where('id', '!=', $article->id)
                                  ->orderBy('views', 'desc')
                                  ->orderBy('published_at', 'desc')
                                  ->limit(3)
                                  ->get();

        // If not enough related articles in same category, get from other categories
        if ($relatedArticles->count() < 3) {
            $moreArticles = Student_article::published()
                                   ->where('id', '!=', $article->id)
                                   ->whereNotIn('id', $relatedArticles->pluck('id'))
                                   ->orderBy('is_featured', 'desc')
                                   ->orderBy('views', 'desc')
                                   ->limit(3 - $relatedArticles->count())
                                   ->get();

            $relatedArticles = $relatedArticles->merge($moreArticles);
        }

        return view('Student_article', compact('article', 'relatedArticles'));
    }
}
