@extends('student_layout')

@section('title', $article->title . ' | EngBuddy')

@section('meta_description', Str::limit(strip_tags($article->short_description ?? $article->content), 155))

@section('meta_keywords', $article->category . ', ภาษาอังกฤษ, ' . implode(', ', array_slice(explode(' ', $article->title), 0, 5)))

@section('meta_author', $article->author ?? 'EngBuddy Team')

@section('canonical_url', route('articles.show', $article->slug))

@section('content')

<style>
  .article-detail {
    max-width: 900px;
    margin: 40px auto;
    padding: 0 20px;
  }

  .back-link {
    display: inline-block;
    margin-bottom: 20px;
    color: #3498db;
    text-decoration: none;
    font-size: 14px;
  }

  .back-link:hover {
    text-decoration: underline;
  }

  .detail-card {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    margin-bottom: 40px;
  }

  .detail-image {
    width: 100%;
    height: auto;
    max-height: 500px;
    object-fit: cover;
  }

  .detail-content {
    padding: 30px;
  }

  .detail-title {
    font-size: 28px;
    color: #2c3e50;
    margin-bottom: 15px;
    line-height: 1.3;
  }

  .detail-meta {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 2px solid #ecf0f1;
    flex-wrap: wrap;
  }

  .meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    color: #7f8c8d;
  }

  .category-badge {
    display: inline-block;
    background: #3498db;
    color: white;
    padding: 6px 14px;
    border-radius: 4px;
    font-size: 13px;
  }

  .featured-badge {
    display: inline-block;
    background: #e74c3c;
    color: white;
    padding: 6px 14px;
    border-radius: 4px;
    font-size: 13px;
  }

  .detail-body {
    font-size: 16px;
    line-height: 1.8;
    color: #34495e;
    margin-top: 20px;
  }

  .detail-body p {
    margin-bottom: 15px;
  }

  .detail-body h2, .detail-body h3 {
    margin-top: 25px;
    margin-bottom: 15px;
    color: #2c3e50;
  }

  .detail-body ul, .detail-body ol {
    margin-left: 20px;
    margin-bottom: 15px;
  }

  .detail-body li {
    margin-bottom: 8px;
  }

  .related-section {
    margin-top: 50px;
  }

  .related-title {
    font-size: 22px;
    color: #2c3e50;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #ecf0f1;
  }

  .related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
  }

  .related-card {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    text-decoration: none;
    color: inherit;
    transition: transform 0.2s;
  }

  .related-card:hover {
    transform: translateY(-4px);
  }

  .related-card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
  }

  .related-card-body {
    padding: 15px;
  }

  .related-card-title {
    font-size: 16px;
    color: #2c3e50;
    margin-bottom: 8px;
    line-height: 1.4;
  }

  .related-card-meta {
    font-size: 12px;
    color: #95a5a6;
  }
</style>

<div class="article-detail">
  <!-- Breadcrumbs -->
  <nav aria-label="breadcrumb" style="margin-bottom:20px;">
    <ol style="display:flex;gap:8px;flex-wrap:wrap;padding:12px 0;margin:0;list-style:none;font-size:14px;color:#7f8c8d;">
      <li><a href="{{ url('/student/home') }}" style="color:#3498db;text-decoration:none;">หน้าแรก</a></li>
      <li style="color:#bdc3c7;">/</li>
      <li><a href="{{ route('articles.index') }}" style="color:#3498db;text-decoration:none;">บทความ</a></li>
      <li style="color:#bdc3c7;">/</li>
      <li><a href="{{ route('articles.index', ['category' => $article->category]) }}" style="color:#3498db;text-decoration:none;">{{ $article->category }}</a></li>
      <li style="color:#bdc3c7;">/</li>
      <li style="color:#2c3e50;font-weight:500;">{{ Str::limit($article->title, 50) }}</li>
    </ol>
  </nav>

  <a href="{{ route('articles.index') }}" class="back-link">← กลับไปหน้ารายการบทความ</a>

  <div class="detail-card">
    @if($article->image)
    <img src="{{ asset('storage/' . $article->image) }}"
         alt="ภาพหน้าปก: {{ $article->title }} - {{ $article->category }} | EngBuddy"
         loading="eager"
         class="detail-image">
    @endif

    <div class="detail-content">
      <div class="detail-meta">
        <span class="category-badge">{{ $article->category }}</span>
        @if($article->is_featured)
        <span class="featured-badge">แนะนำ</span>
        @endif
        @if($article->author)
        <span class="meta-item">✍️ {{ $article->author }}</span>
        @endif
        <span class="meta-item">📅 {{ $article->published_at->format('d/m/Y') }}</span>
        <span class="meta-item">👁️ {{ number_format($article->views) }} ครั้ง</span>
      </div>

      <h1 class="detail-title">{{ $article->title }}</h1>

      @if($article->short_description)
      <div style="font-size:18px;color:#7f8c8d;margin-bottom:20px;padding:15px;background:#f8f9fa;border-left:4px solid #3498db;">
        {{ $article->short_description }}
      </div>
      @endif

      <div class="detail-body">
        @if($article->content)
          {!! nl2br(e($article->content)) !!}
        @else
          <p>{{ $article->short_description }}</p>
        @endif
      </div>
    </div>
  </div>

  <!-- Related Articles -->
  @if($relatedArticles->count() > 0)
  <div class="related-section">
    <h2 class="related-title">บทความที่เกี่ยวข้อง</h2>
    <div class="related-grid">
      @foreach($relatedArticles as $related)
      <a href="{{ route('articles.show', $related->slug) }}" class="related-card">
        @if($related->image)
        <img src="{{ asset('storage/' . $related->image) }}"
             alt="บทความ: {{ $related->title }} - {{ $related->category }}"
             loading="lazy">
        @endif
        <div class="related-card-body">
          <h3 class="related-card-title">{{ Str::limit($related->title, 60) }}</h3>
          <p class="related-card-meta">
            {{ $related->published_at->format('d/m/Y') }} • {{ number_format($related->views) }} ครั้ง
          </p>
        </div>
      </a>
      @endforeach
    </div>
  </div>
  @endif
</div>

@endsection

@push('seo_schema')
<!-- Article Schema (JSON-LD) -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "{{ $article->title }}",
  "description": "{{ strip_tags($article->short_description ?? Str::limit($article->content, 200)) }}",
  @if($article->image)
  "image": "{{ asset('storage/' . $article->image) }}",
  @endif
  "author": {
    "@type": "Person",
    "name": "{{ $article->author ?? 'EngBuddy Team' }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "EngBuddy",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ asset('images/logo.png') }}"
    }
  },
  "datePublished": "{{ $article->published_at->toIso8601String() }}",
  "dateModified": "{{ $article->updated_at->toIso8601String() }}",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{ route('articles.show', $article->slug) }}"
  },
  "articleSection": "{{ $article->category }}",
  "keywords": "{{ $article->category }}, ภาษาอังกฤษ, {{ implode(', ', array_slice(explode(' ', $article->title), 0, 5)) }}",
  "wordCount": {{ str_word_count(strip_tags($article->content)) }},
  "inLanguage": "th-TH"
}
</script>

<!-- Breadcrumb Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "หน้าแรก",
      "item": "{{ url('/student/home') }}"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "บทความ",
      "item": "{{ route('articles.index') }}"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "{{ $article->category }}",
      "item": "{{ route('articles.index', ['category' => $article->category]) }}"
    },
    {
      "@type": "ListItem",
      "position": 4,
      "name": "{{ $article->title }}",
      "item": "{{ route('articles.show', $article->slug) }}"
    }
  ]
}
</script>

<!-- Organization Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "EngBuddy",
  "url": "{{ url('/') }}",
  "logo": "{{ asset('images/logo.png') }}",
  "description": "แพลตฟอร์มหาติวเตอร์ภาษาอังกฤษตัวต่อตัวและออนไลน์ทั่วไทย",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+66-61-825-5910",
    "contactType": "Customer Service"
  },
  "sameAs": [
    "https://www.facebook.com/EngBuddy",
    "https://line.me/ti/p/@EngBuddy"
  ]
}
</script>
@endpush
