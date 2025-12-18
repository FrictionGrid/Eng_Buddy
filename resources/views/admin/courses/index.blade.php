@extends('admin.layouts.app')

@section('title', 'จัดการคอร์ส - EngBuddy Admin')

@section('page-title', 'จัดการคอร์ส')

@section('content')
<style>
    .top-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .btn-create {
        padding: 12px 24px;
        background: #2ecc71;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-create:hover {
        background: #27ae60;
    }

    .filters-form {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 25px;
        display: flex;
        gap: 15px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
    }

    .filters-form input,
    .filters-form select {
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        flex: 1;
        min-width: 200px;
    }

    .btn-filter {
        padding: 10px 24px;
        background: #3498db;
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 500;
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

    .badge-open {
        background: #55efc4;
        color: #00b894;
    }

    .badge-closed {
        background: #dfe6e9;
        color: #2d3436;
    }

    .action-btns {
        display: flex;
        gap: 8px;
    }

    .btn-edit {
        padding: 6px 14px;
        background: #3498db;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        font-size: 13px;
        font-weight: 500;
    }

    .btn-delete {
        padding: 6px 14px;
        background: #e74c3c;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
    }
</style>

<div class="top-actions">
    <h2>รายการคอร์สทั้งหมด</h2>
    <a href="{{ route('admin.courses.create') }}" class="btn-create">+ เพิ่มคอร์สใหม่</a>
</div>

<form action="{{ route('admin.courses.index') }}" method="GET" class="filters-form">
    <input
        type="text"
        name="search"
        placeholder="ค้นหาชื่อวิชา..."
        value="{{ request('search') }}"
    >
    <select name="status">
        <option value="">ทุกสถานะ</option>
        <option value="ใหม่" {{ request('status') === 'ใหม่' ? 'selected' : '' }}>ใหม่</option>
        <option value="ปิดงาน" {{ request('status') === 'ปิดงาน' ? 'selected' : '' }}>ปิดงาน</option>
    </select>
    <button type="submit" class="btn-filter">ค้นหา</button>
</form>

<div class="table-container">
    @if($courses->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ชื่อวิชา</th>
                    <th>สถานที่เรียน</th>
                    <th>วัน</th>
                    <th>เวลา</th>
                    <th>ค่าสอน</th>
                    <th>สถานะ</th>
                    <th>การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->subject }}</td>
                    <td>{{ $course->location }}</td>
                    <td>{{ $course->day }}</td>
                    <td>{{ $course->time }}</td>
                    <td>{{ number_format($course->rate) }} บาท</td>
                    <td>
                        @if($course->status === 'ใหม่')
                            <span class="badge badge-open">ใหม่</span>
                        @else
                            <span class="badge badge-closed">ปิดงาน</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn-edit">แก้ไข</a>
                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('ยืนยันการลบ?')">ลบ</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div style="padding: 20px;">
            {{ $courses->links() }}
        </div>
    @else
        <div style="text-align: center; padding: 60px; color: #7f8c8d;">
            <p>ไม่มีคอร์สที่ตรงกับเงื่อนไขที่ค้นหา</p>
        </div>
    @endif
</div>
@endsection
