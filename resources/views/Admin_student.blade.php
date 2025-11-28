@extends('Admin_layer')

@section('title', 'จัดการนักเรียน')

@section('content')
<div class="page-header">
    <div class="header-top">
        <h1 class="page-title">จัดการนักเรียน</h1>
    </div>

    <div class="filter-bar">
        <form method="GET" action="{{ route('admin.students.index') }}" class="search-form">
            <div class="search-box">
                <input
                    type="text"
                    name="search"
                    placeholder="ค้นหาชื่อ, LINE ID, เบอร์โทร, วิชา..."
                    value="{{ request('search') }}"
                    class="search-input"
                >
            </div>

            <select name="status" class="status-select">
                <option value="">ทุกสถานะ</option>
                <option value="รอดำเนินการ" {{ request('status') == 'รอดำเนินการ' ? 'selected' : '' }}>
                    รอดำเนินการ
                </option>
                <option value="กำลังดำเนินการ" {{ request('status') == 'กำลังดำเนินการ' ? 'selected' : '' }}>
                    กำลังดำเนินการ
                </option>
                <option value="เสร็จสิ้น" {{ request('status') == 'เสร็จสิ้น' ? 'selected' : '' }}>
                    เสร็จสิ้น
                </option>
            </select>

            <select name="tutor_gender" class="status-select">
                <option value="">ทุกเพศติวเตอร์</option>
                <option value="ชาย" {{ request('tutor_gender') == 'ชาย' ? 'selected' : '' }}>
                    ชาย
                </option>
                <option value="หญิง" {{ request('tutor_gender') == 'หญิง' ? 'selected' : '' }}>
                    หญิง
                </option>
                <option value="ไม่ระบุ" {{ request('tutor_gender') == 'ไม่ระบุ' ? 'selected' : '' }}>
                    ไม่ระบุ
                </option>
            </select>

            <button type="submit" class="btn-search">ค้นหา</button>
            <a href="{{ route('admin.students.index') }}" class="btn-reset">รีเซ็ต</a>
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
            <span class="stat-value">{{ $applications->total() }} ใบสมัคร</span>
        </div>
    </div>

    <div class="table-responsive">
        <table class="students-table">
            <thead>
                <tr>
                    <th>ชื่อ-นามสกุล</th>
                    <th>LINE ID</th>
                    <th>เบอร์โทร</th>
                    <th>วิชาที่ต้องการ</th>
                    <th>เพศติวเตอร์</th>
                    <th>สถานะ</th>
                    <th>วันที่สมัคร</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $app)
                <tr>
                    <td>
                        <div class="name-cell">
                            <div class="name">{{ $app->full_name }}</div>
                        </div>
                    </td>
                    <td>
                        <span class="line-id">{{ $app->line_id }}</span>
                    </td>
                    <td>
                        <span class="phone">{{ $app->phone }}</span>
                    </td>
                    <td>
                        <span class="subject">{{ $app->subject }}</span>
                    </td>
                    <td>
                        <span class="gender">{{ $app->tutor_gender }}</span>
                    </td>
                    <td>
                        @if($app->status == 'รอดำเนินการ')
                            <span class="badge badge-warning">รอดำเนินการ</span>
                        @elseif($app->status == 'กำลังดำเนินการ')
                            <span class="badge badge-info">กำลังดำเนินการ</span>
                        @else
                            <span class="badge badge-success">เสร็จสิ้น</span>
                        @endif
                    </td>
                    <td>
                        <div class="date-cell">
                            <div class="date">{{ $app->created_at->format('d/m/Y') }}</div>
                            <div class="time">{{ $app->created_at->format('H:i น.') }}</div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="empty-state">
                        <div class="empty-icon">📝</div>
                        <p>ไม่พบข้อมูลใบสมัคร</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($applications->hasPages())
    <div class="pagination-wrapper">
        {{ $applications->links() }}
    </div>
    @endif
</div>

<style>
.page-header {
    margin-bottom: 24px;
}

.header-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
}

.page-title {
    font-size: 28px;
    font-weight: 700;
    color: var(--ink);
    margin: 0;
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

.card {
    background: var(--card);
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    overflow: hidden;
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

.students-table {
    width: 100%;
    border-collapse: collapse;
}

.students-table thead th {
    background: var(--bg);
    padding: 14px 16px;
    text-align: left;
    font-weight: 600;
    font-size: 14px;
    color: var(--muted);
    border-bottom: 2px solid var(--line);
}

.students-table tbody td {
    padding: 16px;
    border-bottom: 1px solid var(--line);
    font-size: 14px;
    vertical-align: middle;
}

.students-table tbody tr {
    transition: background 0.2s;
}

.students-table tbody tr:hover {
    background: var(--bg);
}

.name-cell {
    max-width: 200px;
}

.name {
    font-weight: 600;
    color: var(--ink);
}

.line-id {
    font-family: monospace;
    color: #059669;
    background: #d1fae5;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 13px;
}

.phone {
    color: var(--muted);
}

.subject {
    font-weight: 500;
    color: var(--ink);
}

.gender {
    color: var(--muted);
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

.badge-info {
    background: #dbeafe;
    color: #1e40af;
}

.badge-success {
    background: #d1fae5;
    color: #065f46;
}

.date-cell {
    min-width: 100px;
}

.date {
    font-weight: 600;
    color: var(--ink);
}

.time {
    font-size: 13px;
    color: var(--muted);
    margin-top: 4px;
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
    .header-top {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }

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

    .students-table {
        font-size: 13px;
    }

    .students-table thead th,
    .students-table tbody td {
        padding: 10px;
    }
}
</style>
@endsection
