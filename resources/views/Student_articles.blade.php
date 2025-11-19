@extends('student_layout')

@section('title', 'บทความภาษาอังกฤษ เทคนิคการเรียน TOEIC IELTS Grammar | EngBuddy')

@section('meta_description', 'รวมบทความภาษาอังกฤษ เทคนิคการเรียน คอร์สติวอังกฤษ แนวข้อสอบ TOEIC IELTS Grammar สำหรับนักเรียนและผู้ที่ต้องการพัฒนาทักษะภาษาอังกฤษ')

@section('meta_keywords', 'บทความภาษาอังกฤษ, เทคนิคเรียนอังกฤษ, TOEIC, IELTS, Grammar, คอร์สติวอังกฤษ, แนวข้อสอบ, สอนอังกฤษ')

@section('meta_author', 'EngBuddy Team')

@section('canonical_url', route('articles.index'))

@section('content')


<section class="article-section">
  
    <h1 class="banner">บทความ</h1>
    <div class="container">

  

    <!-- Articles List -->
    <h3 class="article-list-title">
      @if(request('category'))
        <span>บทความในหมวด: {{ request('category') }}</span>
        <a href="{{ route('articles.index') }}">[ดูทั้งหมด]</a>
      @else
        <span>บทความทั้งหมด</span>
      @endif
    </h3>

    @forelse($articles as $article)
    <a href="{{ route('articles.show', $article->slug) }}" class="article-card">
      <div class="article-card-inner">
        @if($article->image)
        <img src="{{ asset('storage/' . $article->image) }}"
             alt="ภาพประกอบบทความ {{ $article->title }} - {{ $article->category }}"
             loading="lazy"
             class="article-card-image">
        @endif
        <div class="article-card-content">
          <div class="article-card-tags">
            <span class="article-tag">{{ $article->category }}</span>
            @if($article->is_featured)
            <span class="article-tag featured">แนะนำ</span>
            @endif
          </div>
          <h3 class="article-card-title">{{ $article->title }}</h3>
          <p class="article-card-description">{{ Str::limit($article->short_description, 150) }}</p>
          <div class="article-card-meta">
            @if($article->author)
            <span>{{ $article->author }}</span>
            @endif
            <span>{{ $article->published_at->format('d/m/Y') }}</span>
            <span>{{ number_format($article->views) }} ครั้ง</span>
          </div>
        </div>
      </div>
    </a>
    @empty
    <div class="article-empty">
      <p class="article-empty-title">ยังไม่มีบทความในขณะนี้</p>
      <p class="article-empty-subtitle">กรุณาติดตามบทความใหม่ๆ เร็วๆ นี้</p>
    </div>
    @endforelse

    </div>

</section>


@endsection
