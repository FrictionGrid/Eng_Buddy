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

    <!-- Category Filter -->
    @if($categories->count() > 0)
    <div style="margin-bottom:30px;">
      <h3 style="margin-bottom:15px;color:#2c3e50;">หมวดหมู่</h3>
      <div class="article-grid">
        @foreach($categories as $cat => $count)
        <a href="{{ route('articles.index', ['category' => $cat]) }}" class="article-box">
          {{ $cat }} ({{ $count }})
        </a>
        @endforeach
      </div>
    </div>
    @endif

    <!-- Articles List -->
    <h3 style="margin-bottom:20px;color:#2c3e50;">
      @if(request('category'))
        บทความในหมวด: {{ request('category') }}
        <a href="{{ route('articles.index') }}" style="font-size:14px;color:#3498db;margin-left:10px;">[ดูทั้งหมด]</a>
      @else
        บทความทั้งหมด
      @endif
    </h3>

    @forelse($articles as $article)
    <a href="{{ route('articles.show', $article->slug) }}" style="display:block;margin-bottom:30px;text-decoration:none;color:inherit;background:white;padding:20px;border-radius:8px;box-shadow:0 2px 4px rgba(0,0,0,0.1);transition:transform 0.2s;">
      <div style="display:flex;gap:20px;align-items:start;">
        @if($article->image)
        <img src="{{ asset('storage/' . $article->image) }}"
             alt="ภาพประกอบบทความ {{ $article->title }} - {{ $article->category }}"
             loading="lazy"
             style="width:200px;height:150px;object-fit:cover;border-radius:4px;">
        @endif
        <div style="flex:1;">
          <div style="display:flex;align-items:center;gap:10px;margin-bottom:10px;">
            <span style="background:#3498db;color:white;padding:4px 12px;border-radius:4px;font-size:12px;">{{ $article->category }}</span>
            @if($article->is_featured)
            <span style="background:#e74c3c;color:white;padding:4px 12px;border-radius:4px;font-size:12px;">แนะนำ</span>
            @endif
          </div>
          <h3 style="font-size:20px;color:#2c3e50;margin-bottom:10px;">{{ $article->title }}</h3>
          <p style="color:#7f8c8d;line-height:1.6;margin-bottom:10px;">{{ Str::limit($article->short_description, 150) }}</p>
          <div style="display:flex;gap:15px;font-size:13px;color:#95a5a6;">
            @if($article->author)
            <span>✍️ {{ $article->author }}</span>
            @endif
            <span>📅 {{ $article->published_at->format('d/m/Y') }}</span>
            <span>👁️ {{ number_format($article->views) }} ครั้ง</span>
          </div>
        </div>
      </div>
    </a>
    @empty
    <div style="text-align:center;padding:60px 20px;color:#999;">
      <p style="font-size:18px;">ยังไม่มีบทความในขณะนี้</p>
      <p>กรุณาติดตามบทความใหม่ๆ เร็วๆ นี้</p>
    </div>
    @endforelse

    </div>

</section>


@endsection
