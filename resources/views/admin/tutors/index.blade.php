@extends('admin.layouts.app')

@section('title', 'จัดการติวเตอร์ - EngBuddy Admin')

@section('page-title', 'จัดการติวเตอร์')

@section('content')
<style>
    .filters-section {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 25px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
    }

    .filters-form {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        align-items: end;
    }

    .filter-group {
        flex: 1;
        min-width: 200px;
    }

    .filter-group label {
        display: block;
        margin-bottom: 5px;
        font-size: 14px;
        font-weight: 500;
        color: #2c3e50;
    }

    .filter-group input,
    .filter-group select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
    }

    .btn-filter {
        padding: 10px 24px;
        background: #3498db;
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s;
    }

    .btn-filter:hover {
        background: #2980b9;
    }

    .btn-reset {
        padding: 10px 24px;
        background: #95a5a6;
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 500;
        text-decoration: none;
        display: inline-block;
    }

    .btn-reset:hover {
        background: #7f8c8d;
    }

    .table-container {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead {
        background: #34495e;
        color: #fff;
    }

    .table thead th {
        padding: 15px;
        text-align: left;
        font-weight: 600;
        font-size: 14px;
    }

    .table tbody td {
        padding: 15px;
        border-bottom: 1px solid #ecf0f1;
        font-size: 14px;
    }

    .table tbody tr:hover {
        background: #f8f9fa;
    }

    .badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .badge-pending {
        background: #ffeaa7;
        color: #d63031;
    }

    .badge-approved {
        background: #55efc4;
        color: #00b894;
    }

    .badge-rejected {
        background: #fab1a0;
        color: #d63031;
    }

    .badge-suspended {
        background: #dfe6e9;
        color: #2d3436;
    }

    .btn-view {
        padding: 8px 16px;
        background: #3498db;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.3s;
        display: inline-block;
    }

    .btn-view:hover {
        background: #2980b9;
    }

    .pagination {
        padding: 20px;
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .pagination a,
    .pagination span {
        padding: 8px 14px;
        border: 1px solid #ddd;
        border-radius: 6px;
        text-decoration: none;
        color: #2c3e50;
        font-size: 14px;
    }

    .pagination .active {
        background: #3498db;
        color: #fff;
        border-color: #3498db;
    }

    .no-results {
        text-align: center;
        padding: 60px 20px;
        color: #7f8c8d;
    }

    .no-results svg {
        width: 80px;
        height: 80px;
        margin-bottom: 20px;
        opacity: 0.3;
    }
</style>

<div class="filters-section">
    <form action="{{ route('admin.tutors.index') }}" method="GET" class="filters-form">
        <div class="filter-group">
            <label for="search">ค้นหา</label>
            <input
                type="text"
                id="search"
                name="search"
                placeholder="ชื่อหรืออีเมล..."
                value="{{ request('search') }}"
            >
        </div>

        <div class="filter-group">
            <label for="status">สถานะ</label>
            <select id="status" name="status">
                <option value="">ทั้งหมด</option>
                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>รออนุมัติ</option>
                <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>อนุมัติแล้ว</option>
                <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>ปฏิเสธ</option>
            </select>
        </div>

        <div class="filter-group">
            <label for="suspended">สถานะการระงับ</label>
            <select id="suspended" name="suspended">
                <option value="">ทั้งหมด</option>
                <option value="yes" {{ request('suspended') === 'yes' ? 'selected' : '' }}>ระงับ</option>
                <option value="no" {{ request('suspended') === 'no' ? 'selected' : '' }}>ไม่ระงับ</option>
            </select>
        </div>

        <div>
            <button type="submit" class="btn-filter">ค้นหา</button>
        </div>

        <div>
            <a href="{{ route('admin.tutors.index') }}" class="btn-reset">รีเซ็ต</a>
        </div>
    </form>
</div>

<div class="table-container">
    @if($tutors->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>อีเมล</th>
                    <th>โทรศัพท์</th>
                    <th>สถานะ</th>
                    <th>วันที่สมัคร</th>
                    <th>การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tutors as $tutor)
                <tr>
                    <td>{{ $tutor->id }}</td>
                    <td>{{ $tutor->first_name }} {{ $tutor->last_name }}</td>
                    <td>{{ $tutor->user->email ?? 'N/A' }}</td>
                    <td>{{ $tutor->phone }}</td>
                    <td>
                        @if($tutor->suspended_at)
                            <span class="badge badge-suspended">ระงับ</span>
                        @elseif($tutor->status === 'pending')
                            <span class="badge badge-pending">รออนุมัติ</span>
                        @elseif($tutor->status === 'approved')
                            <span class="badge badge-approved">อนุมัติแล้ว</span>
                        @elseif($tutor->status === 'rejected')
                            <span class="badge badge-rejected">ปฏิเสธ</span>
                        @endif
                    </td>
                    <td>{{ $tutor->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('admin.tutors.show', $tutor->id) }}" class="btn-view">
                            ดูรายละเอียด
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            {{ $tutors->links() }}
        </div>
    @else
        <div class="no-results">
            <svg fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            <h3>ไม่พบข้อมูล</h3>
            <p>ไม่มีติวเตอร์ที่ตรงกับเงื่อนไขที่ค้นหา</p>
        </div>
    @endif
</div>
@endsection
