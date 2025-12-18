@extends('admin.layouts.app')

@section('title', 'Dashboard - EngBuddy Admin')

@section('page-title', 'Dashboard')

@section('content')
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        display: flex;
        align-items: center;
        gap: 20px;
        transition: all 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .stat-icon.blue {
        background: rgba(52, 152, 219, 0.1);
        color: #3498db;
    }

    .stat-icon.green {
        background: rgba(46, 204, 113, 0.1);
        color: #2ecc71;
    }

    .stat-icon.orange {
        background: rgba(230, 126, 34, 0.1);
        color: #e67e22;
    }

    .stat-icon.purple {
        background: rgba(155, 89, 182, 0.1);
        color: #9b59b6;
    }

    .stat-icon.red {
        background: rgba(231, 76, 60, 0.1);
        color: #e74c3c;
    }

    .stat-info h3 {
        font-size: 32px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 5px;
    }

    .stat-info p {
        color: #7f8c8d;
        font-size: 14px;
    }

    .welcome-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        padding: 35px;
        border-radius: 12px;
        margin-bottom: 30px;
    }

    .welcome-section h2 {
        font-size: 28px;
        margin-bottom: 10px;
    }

    .welcome-section p {
        font-size: 16px;
        opacity: 0.9;
    }

    .quick-actions {
        display: flex;
        gap: 15px;
        margin-top: 25px;
        flex-wrap: wrap;
    }

    .quick-action-btn {
        padding: 12px 24px;
        background: rgba(255,255,255,0.2);
        color: #fff;
        border: 1px solid rgba(255,255,255,0.3);
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s;
    }

    .quick-action-btn:hover {
        background: rgba(255,255,255,0.3);
        transform: translateY(-2px);
    }
</style>

<div class="welcome-section">
    <h2>ยินดีต้อนรับ, {{ session('admin_username') }}!</h2>
    <p>นี่คือแดชบอร์ดหลักของระบบจัดการแพลตฟอร์ม EngBuddy</p>

    <div class="quick-actions">
        <a href="{{ route('admin.tutors.index') }}" class="quick-action-btn">จัดการติวเตอร์</a>
        <a href="{{ route('admin.courses.index') }}" class="quick-action-btn">จัดการคอร์ส</a>
        <a href="{{ route('admin.students.index') }}" class="quick-action-btn">ดูใบสมัครนักเรียน</a>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon blue">
            <svg fill="currentColor" viewBox="0 0 20 20" style="width: 28px; height: 28px;">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
            </svg>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['total_tutors'] ?? 0 }}</h3>
            <p>ติวเตอร์ทั้งหมด</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon orange">
            <svg fill="currentColor" viewBox="0 0 20 20" style="width: 28px; height: 28px;">
                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
            </svg>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['pending_tutors'] ?? 0 }}</h3>
            <p>รออนุมัติ</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon green">
            <svg fill="currentColor" viewBox="0 0 20 20" style="width: 28px; height: 28px;">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['approved_tutors'] ?? 0 }}</h3>
            <p>ติวเตอร์ที่อนุมัติแล้ว</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon purple">
            <svg fill="currentColor" viewBox="0 0 20 20" style="width: 28px; height: 28px;">
                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
            </svg>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['total_courses'] ?? 0 }}</h3>
            <p>คอร์สทั้งหมด</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon red">
            <svg fill="currentColor" viewBox="0 0 20 20" style="width: 28px; height: 28px;">
                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
            </svg>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['total_students'] ?? 0 }}</h3>
            <p>ใบสมัครนักเรียน</p>
        </div>
    </div>
</div>
@endsection
