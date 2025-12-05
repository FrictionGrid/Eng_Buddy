@extends('Tutor_layout')

@section('title', 'เข้าสู่ระบบ | EngBuddy')
@section('meta_description', 'เข้าสู่ระบบสำหรับติวเตอร์ EngBuddy เพื่อจัดการโปรไฟล์ ดูงานสอน และรับนักเรียนใหม่')

@section('content')
    <section class="login-page">
        <div class="login-card">
            <h2 class="login-title">Tutor Log in</h2>

            @if (session('success'))
                <div
                    style="padding: 12px; margin-bottom: 16px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px;">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div
                    style="padding: 12px; margin-bottom: 16px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 4px;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="login-form" method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div class="login-row">
                    <label for="email">อีเมล <span class="req">*</span></label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="login-row">
                    <label for="password">รหัสผ่าน <span class="req">*</span></label>
                    <input id="password" type="password" name="password" required>
                </div>

                <div class="login-options">
                    <label style="display: flex; align-items: center; gap: 8px; font-size: 14px;">
                        <input type="checkbox" name="remember" value="1">
                        <span>จดจำการเข้าสู่ระบบ</span>
                    </label>
                </div>

                <button type="submit" class="login-btn">เข้าสู่ระบบ</button>
            </form>

            <p class="login-footer">
                ยังไม่มีบัญชี? <a href="{{ route('register') }}" class="link-highlight">สมัครติวเตอร์</a>
            </p>

            <div class="login-social">
                <a href="#" class="line-btn">LINE <span>@EngBuddy</span></a>
                <a href="#" class="tiktok-btn">TikTok <span>@EngBuddy</span></a>
            </div>
        </div>
    </section>
@endsection
