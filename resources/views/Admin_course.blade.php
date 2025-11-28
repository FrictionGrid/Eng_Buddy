@extends('Admin_layer')

@section('title', 'จัดการคอร์ส')

@section('content')
<div class="page-header">
    <div class="header-top">
        <h1 class="page-title">จัดการคอร์ส</h1>
        <a href="{{ route('admin.courses.create') }}" class="btn-add">
            ➕ เพิ่มคอร์สใหม่
        </a>
    </div>

    <div class="filter-bar">
        <form method="GET" action="{{ route('admin.courses.index') }}" class="search-form">
            <div class="search-box">
                <input
                    type="text"
                    name="search"
                    placeholder="ค้นหาวิชา, รหัสงาน, สถานที่..."
                    value="{{ request('search') }}"
                    class="search-input"
                >
            </div>

            <select name="status" class="status-select">
                <option value="">ทั้งหมด</option>
                <option value="ใหม่" {{ request('status') == 'ใหม่' ? 'selected' : '' }}>
                    ใหม่
                </option>
                <option value="ปิดงาน" {{ request('status') == 'ปิดงาน' ? 'selected' : '' }}>
                    ปิดงาน
                </option>
            </select>

            <button type="submit" class="btn-search">ค้นหา</button>
            <a href="{{ route('admin.courses.index') }}" class="btn-reset">รีเซ็ต</a>
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
            <span class="stat-value">{{ $courses->total() }} คอร์ส</span>
        </div>
    </div>

    <div class="table-responsive">
        <table class="courses-table">
            <thead>
                <tr>
                    <th>รหัสงาน</th>
                    <th>วิชา</th>
                    <th>สถานที่</th>
                    <th>วัน / เวลา</th>
                    <th>ค่าสอน</th>
                    <th>สถานะ</th>
                    <th>การกระทำ</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                <tr>
                    <td>
                        <span class="job-code">{{ $course->job_code }}</span>
                    </td>
                    <td>
                        <div class="subject-cell">
                            <div class="subject-name">{{ $course->subject }}</div>
                            @if($course->description)
                            <div class="subject-desc">{{ Str::limit($course->description, 50) }}</div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <span class="location">📍 {{ $course->location }}</span>
                    </td>
                    <td>
                        <div class="datetime-cell">
                            <div class="day">{{ $course->day }}</div>
                            <div class="time">🕐 {{ $course->time }}</div>
                        </div>
                    </td>
                    <td>
                        @if($course->rate)
                            <span class="rate">{{ number_format($course->rate) }} ฿/ชม.</span>
                        @else
                            <span class="rate-empty">-</span>
                        @endif
                    </td>
                    <td>
                        @if($course->status == 'ใหม่')
                            <span class="badge badge-success">ใหม่</span>
                        @else
                            <span class="badge badge-secondary">ปิดงาน</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn-edit" title="แก้ไข">
                                ✏️
                            </a>
                            <form method="POST" action="{{ route('admin.courses.destroy', $course->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" title="ลบ" onclick="return confirm('คุณต้องการลบคอร์สนี้ใช่หรือไม่?')">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="empty-state">
                        <div class="empty-icon">📚</div>
                        <p>ไม่พบข้อมูลคอร์ส</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($courses->hasPages())
    <div class="pagination-wrapper">
        {{ $courses->links() }}
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

.btn-add {
    display: inline-block;
    padding: 10px 20px;
    background: #10b981;
    color: white;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.2s;
}

.btn-add:hover {
    background: #059669;
    transform: translateY(-1px);
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

.courses-table {
    width: 100%;
    border-collapse: collapse;
}

.courses-table thead th {
    background: var(--bg);
    padding: 14px 16px;
    text-align: left;
    font-weight: 600;
    font-size: 14px;
    color: var(--muted);
    border-bottom: 2px solid var(--line);
}

.courses-table tbody td {
    padding: 16px;
    border-bottom: 1px solid var(--line);
    font-size: 14px;
    vertical-align: middle;
}

.courses-table tbody tr {
    transition: background 0.2s;
}

.courses-table tbody tr:hover {
    background: var(--bg);
}

.job-code {
    font-family: monospace;
    font-weight: 700;
    color: var(--brand);
    background: rgba(59, 130, 246, 0.1);
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 13px;
}

.subject-cell {
    max-width: 300px;
}

.subject-name {
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 4px;
}

.subject-desc {
    font-size: 13px;
    color: var(--muted);
}

.location {
    color: var(--muted);
}

.datetime-cell {
    min-width: 120px;
}

.day {
    font-weight: 600;
    color: var(--ink);
}

.time {
    font-size: 13px;
    color: var(--muted);
    margin-top: 4px;
}

.rate {
    font-weight: 700;
    color: #10b981;
}

.rate-empty {
    color: var(--muted);
}

.badge {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
}

.badge-success {
    background: #d1fae5;
    color: #065f46;
}

.badge-secondary {
    background: #e5e7eb;
    color: #374151;
}

.action-buttons {
    display: flex;
    gap: 8px;
}

.btn-edit,
.btn-delete {
    padding: 6px 10px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    transition: all 0.2s;
    font-size: 16px;
    text-decoration: none;
    display: inline-block;
}

.btn-edit {
    background: #dbeafe;
}

.btn-edit:hover {
    background: #bfdbfe;
    transform: scale(1.1);
}

.btn-delete {
    background: #fee2e2;
}

.btn-delete:hover {
    background: #fecaca;
    transform: scale(1.1);
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

    .courses-table {
        font-size: 13px;
    }

    .courses-table thead th,
    .courses-table tbody td {
        padding: 10px;
    }
}
</style>
@endsection
