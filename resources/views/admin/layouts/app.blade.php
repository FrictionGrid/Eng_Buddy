<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'EngBuddy Admin Dashboard')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f6fa;
            color: #2c3e50;
        }

        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 260px;
            background: #2c3e50;
            color: #ecf0f1;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 25px 20px;
            background: #1a252f;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header h2 {
            font-size: 22px;
            font-weight: 600;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 14px 20px;
            color: #bdc3c7;
            text-decoration: none;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        .sidebar-menu a:hover {
            background: rgba(255,255,255,0.05);
            color: #fff;
            border-left-color: #3498db;
        }

        .sidebar-menu a.active {
            background: rgba(52, 152, 219, 0.1);
            color: #fff;
            border-left-color: #3498db;
        }

        .sidebar-menu a svg {
            width: 20px;
            height: 20px;
            margin-right: 12px;
        }

        /* Main Content Area */
        .main-content {
            margin-left: 260px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Topbar Styles */
        .topbar {
            background: #fff;
            padding: 0 30px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar-left h1 {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            background: #3498db;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 600;
            font-size: 16px;
        }

        .admin-name {
            font-weight: 500;
            color: #2c3e50;
        }

        .logout-btn {
            background: #e74c3c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
        }

        .logout-btn:hover {
            background: #c0392b;
        }

        /* Content Area */
        .content {
            padding: 30px;
            flex: 1;
        }

        /* Alert Messages */
        .alert {
            padding: 15px 20px;
            border-radius: 6px;
            margin-bottom: 25px;
            font-weight: 500;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }

            .sidebar-header h2,
            .sidebar-menu a span {
                display: none;
            }

            .main-content {
                margin-left: 70px;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
    <div class="admin-wrapper">
        @include('admin.layouts.partials.sidebar')

        <div class="main-content">
            @include('admin.layouts.partials.topbar')

            <div class="content">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
