<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin')</title>

    <link rel="stylesheet" href="{{ asset('css/color.css') }}">
    <link rel="stylesheet" href="/css/Admin_layer.css">
</head>

<body>

    <div class="admin-nav">
        <div class="logo">EB</div>
        <div class="title">Admin</div>

        <div class="nav-menu">
            <a href="/admin" class="item">📊 Dashboard</a>
            <a href="{{ route('admin.tutors.index') }}" class="item {{ request()->routeIs('admin.tutors.*') ? 'is-active' : '' }}">👩‍🏫 Tutors</a>
            <a href="{{ route('admin.students.index') }}" class="item {{ request()->routeIs('admin.students.*') ? 'is-active' : '' }}">👨‍👩‍👧 Students</a>
            <a href="{{ route('admin.courses.index') }}" class="item {{ request()->routeIs('admin.courses.*') ? 'is-active' : '' }}">📄 Courses</a>
            <a href="/admin/payments" class="item">💰 Payments</a>
        </div>

        <div class="profile">
            <div class="profile-name">Admin</div>
            <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <main class="admin-content">
        @yield('content')
    </main>

</body>
</html>
