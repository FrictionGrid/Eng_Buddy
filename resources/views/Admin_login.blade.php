<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | EngBuddy</title>
    <link rel="stylesheet" href="{{ asset('css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Admin_login.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <!-- Logo & Title -->
            <div class="login-header">
                <div class="logo-large">EB</div>
                <h1 class="login-title">Admin Login</h1>
                <p class="login-subtitle">ระบบจัดการสำหรับผู้ดูแลระบบ</p>
            </div>

            <!-- Success Message -->
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <!-- Error Messages -->
            @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Login Form -->
            <form class="login-form" method="POST" action="{{ route('admin.login.submit') }}">
                @csrf

                <div class="form-group">
                    <label for="email">อีเมล</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        placeholder="admin@engbuddy.com"
                        class="form-input"
                    >
                </div>

                <div class="form-group">
                    <label for="password">รหัสผ่าน</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        placeholder="••••••••"
                        class="form-input"
                    >
                </div>

                <div class="form-options">
                    <label class="checkbox-label">
                        <input type="checkbox" name="remember" value="1">
                        <span>จดจำการเข้าสู่ระบบ</span>
                    </label>
                </div>

                <button type="submit" class="btn-submit">
                    เข้าสู่ระบบ
                </button>
            </form>

            <!-- Footer Links -->
            <div class="login-footer">
                <p>สำหรับผู้ดูแลระบบเท่านั้น</p>
                <a href="/" class="link-back">← กลับหน้าแรก</a>
            </div>
        </div>

        <!-- Decorative Background -->
        <div class="bg-decoration">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
            <div class="circle circle-3"></div>
        </div>
    </div>
</body>
</html>
