<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Student_article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'content',
        'image',
        'category',
        'author',
        'views',
        'is_featured',
        'is_active',
        'published_at',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'published_at' => 'datetime',
        'views' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            // Only generate slug if not provided
            if (empty($article->slug)) {
                $slug = Str::slug($article->title);

                // If title is Thai and generates empty slug, create unique slug
                if (empty($slug)) {
                    $slug = 'article-' . time() . '-' . rand(1000, 9999);
                }

                $article->slug = $slug;
            }
        });
    }

 
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    
    public function scopePublished($query)
    {
        return $query->where('is_active', true)
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }

  
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

   
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

 
    public function incrementViews()
    {
        $this->increment('views');
    }
}
