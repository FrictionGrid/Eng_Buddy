@extends('Admin_layer')

@section('title', 'จัดการ Tutors')

@section('content')
<div class="page-header">
    <h1 class="page-title">จัดการ Tutors</h1>

    <div class="filter-bar">
        <form method="GET" action="{{ route('admin.tutors.index') }}" class="search-form">
            <div class="search-box">
                <input
                    type="text"
                    name="search"
                    placeholder="ค้นหาชื่อ หรืออีเมล..."
                    value="{{ request('search') }}"
                    class="search-input"
                >
            </div>

      

            <button type="submit" class="btn-search">ค้นหา</button>
            <a href="{{ route('admin.tutors.index') }}" class="btn-reset">รีเซ็ต</a>
        </form>
    </div>
</div>

@if(session('success'))
<div class="alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">
    <div class="stats-bar">
        <div class="stat-item">
            <span class="stat-label">จำนวนทั้งหมด:</span>
            <span class="stat-value">{{ $tutors->total() }} คน</span>
        </div>
    </div>

    <div class="table-responsive">
        <table class="tutors-table">
            <thead>
                <tr>
                    <th>ชื่อ-นามสกุล</th>
                    <th>อีเมล</th>
                    <th>สถานะ</th>
                    <th>วันที่สมัคร</th>
                    <th>การกระทำ</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tutors as $tutor)
                <tr>
                    <td>
                        <div class="tutor-name">
                            <div class="avatar">
                                {{ substr($tutor->first_name, 0, 1) }}{{ substr($tutor->last_name, 0, 1) }}
                            </div>
                            <div>
                                <div class="name">{{ $tutor->full_name }}</div>
                                <div class="phone">{{ $tutor->phone }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="email">{{ $tutor->user->email }}</span>
                    </td>
                    <td>
                        @if($tutor->status == 'pending')
                            <span class="badge badge-warning">รออนุมัติ</span>
                        @elseif($tutor->status == 'approved')
                            <span class="badge badge-success">อนุมัติแล้ว</span>
                        @elseif($tutor->status == 'rejected')
                            <span class="badge badge-danger">ปฏิเสธ</span>
                        @elseif($tutor->status == 'suspended')
                            <span class="badge badge-secondary">ระงับ</span>
                        @endif
                    </td>
                    <td>
                        <span class="date">{{ $tutor->created_at->format('d/m/Y') }}</span>
                        <span class="time">{{ $tutor->created_at->format('H:i') }}</span>
                    </td>
                    <td>
                        <a href="{{ route('admin.tutors.show', $tutor->id) }}" class="btn-view">
                            ดูรายละเอียด
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty-state">
                        <div class="empty-icon">📋</div>
                        <p>ไม่พบข้อมูล Tutor</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($tutors->hasPages())
    <div class="pagination-wrapper">
        {{ $tutors->links() }}
    </div>
    @endif
</div>

<style>
.page-header {
    margin-bottom: 24px;
}

.filter-bar {
    margin-top: 18px;
}

.search-form {
    display: flex;
    gap: 12px;
    align-items: center;
    flex-wrap: wrap;
}

.search-box {
    flex: 1;
    min-width: 250px;
    max-width: 400px;
}

.search-input {
    width: 100%;
    padding: 10px 16px;
    border: 1px solid var(--line);
    border-radius: 8px;
    font-size: 14px;
    font-family: "Prompt", sans-serif;
    transition: 0.2s;
    background: var(--card);
    color: var(--ink);
}

.search-input:focus {
    outline: none;
    border-color: var(--brand);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.status-select {
    padding: 10px 16px;
    border: 1px solid var(--line);
    border-radius: 8px;
    font-size: 14px;
    font-family: "Prompt", sans-serif;
    background: var(--card);
    color: var(--ink);
    cursor: pointer;
    transition: 0.2s;
}

.status-select:focus {
    outline: none;
    border-color: var(--brand);
}

.btn-search,
.btn-reset {
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: 0.2s;
    text-decoration: none;
    border: none;
    font-family: "Prompt", sans-serif;
    display: inline-block;
}

.btn-search {
    background: var(--brand);
    color: white;
}

.btn-search:hover {
    background: #2563eb;
}

.btn-reset {
    background: var(--bg);
    color: var(--ink);
    border: 1px solid var(--line);
}

.btn-reset:hover {
    background: var(--line);
}

.alert-success {
    background: #d1fae5;
    color: #065f46;
    padding: 14px 18px;
    border-radius: 10px;
    margin-bottom: 20px;
    font-weight: 500;
    border: 1px solid #a7f3d0;
}

.stats-bar {
    padding: 16px 20px;
    border-bottom: 1px solid var(--line);
    display: flex;
    gap: 24px;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 8px;
}

.stat-label {
    color: var(--muted);
    font-size: 14px;
}

.stat-value {
    font-weight: 700;
    color: var(--brand);
    font-size: 16px;
}

.table-responsive {
    overflow-x: auto;
}

.tutors-table {
    width: 100%;
    border-collapse: collapse;
}

.tutors-table thead th {
    background: var(--bg);
    padding: 14px 16px;
    text-align: left;
    font-weight: 600;
    font-size: 14px;
    color: var(--muted);
    border-bottom: 2px solid var(--line);
}

.tutors-table tbody td {
    padding: 16px;
    border-bottom: 1px solid var(--line);
    font-size: 14px;
    vertical-align: middle;
}

.tutors-table tbody tr {
    transition: background 0.2s;
}

.tutors-table tbody tr:hover {
    background: var(--bg);
}

.tutor-name {
    display: flex;
    align-items: center;
    gap: 12px;
}

.avatar {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--brand), var(--accent));
    display: grid;
    place-content: center;
    font-weight: 700;
    color: white;
    font-size: 14px;
    flex-shrink: 0;
}

.name {
    font-weight: 600;
    color: var(--ink);
}

.phone {
    font-size: 13px;
    color: var(--muted);
    margin-top: 2px;
}

.email {
    color: var(--muted);
}

.date {
    display: block;
    color: var(--ink);
    font-weight: 500;
}

.time {
    display: block;
    font-size: 13px;
    color: var(--muted);
    margin-top: 2px;
}

.badge {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
}

.badge-warning {
    background: #fef3c7;
    color: #92400e;
}

.badge-success {
    background: #d1fae5;
    color: #065f46;
}

.badge-danger {
    background: #fee2e2;
    color: #991b1b;
}

.badge-secondary {
    background: #e5e7eb;
    color: #374151;
}

.btn-view {
    display: inline-block;
    padding: 8px 16px;
    background: var(--brand);
    color: white;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 13px;
    transition: all 0.2s;
}

.btn-view:hover {
    background: #2563eb;
    transform: translateY(-1px);
}

.empty-state {
    text-align: center;
    padding: 60px 20px !important;
}

.empty-icon {
    font-size: 48px;
    margin-bottom: 12px;
}

.empty-state p {
    color: var(--muted);
    font-size: 16px;
    margin: 0;
}

.pagination-wrapper {
    padding: 20px;
    display: flex;
    justify-content: center;
}

@media (max-width: 768px) {
    .search-form {
        flex-direction: column;
        align-items: stretch;
    }

    .search-box {
        max-width: 100%;
    }

    .status-select {
        width: 100%;
    }

    .tutors-table {
        font-size: 13px;
    }

    .tutors-table thead th,
    .tutors-table tbody td {
        padding: 10px;
    }

    .avatar {
        width: 36px;
        height: 36px;
        font-size: 12px;
    }
}
</style>
@endsection
