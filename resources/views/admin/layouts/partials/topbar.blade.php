<div class="topbar">
    <div class="topbar-left">
        <h1>@yield('page-title', 'Dashboard')</h1>
    </div>

    <div class="topbar-right">
        <div class="admin-info">
            <div class="admin-avatar">
                {{ strtoupper(substr(session('admin_username', 'A'), 0, 1)) }}
            </div>
            <div class="admin-name">
                {{ session('admin_username', 'Admin') }}
            </div>
        </div>

        <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="logout-btn">ออกจากระบบ</button>
        </form>
    </div>
</div>
