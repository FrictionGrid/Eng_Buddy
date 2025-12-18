@extends('admin.layouts.app')

@section('title', 'จัดการนักเรียน - EngBuddy Admin')

@section('page-title', 'รายการใบสมัครนักเรียน')

@section('content')
<style>
    .info-box {
        background: #fff3cd;
        border: 1px solid #ffc107;
        padding: 15px;
        border-radius: 6px;
        margin-bottom: 25px;
        color: #856404;
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

    .filters-form input {
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
</style>

<div class="info-box">
    <strong>หมายเหตุ:</strong> หน้านี้เป็น Read-only ใช้สำหรับดูข้อมูลใบสมัครนักเรียนเท่านั้น ไม่สามารถแก้ไขหรือลบข้อมูลได้
</div>

<form action="{{ route('admin.students.index') }}" method="GET" class="filters-form">
    <input
        type="text"
        name="search"
        placeholder="ค้นหาชื่อ, LINE ID หรือเบอร์โทร..."
        value="{{ request('search') }}"
    >
    <select name="tutor_gender" style="padding: 10px 12px; border: 1px solid #ddd; border-radius: 6px; min-width: 150px;">
        <option value="">ทุกเพศติวเตอร์</option>
        <option value="ชาย" {{ request('tutor_gender') === 'ชาย' ? 'selected' : '' }}>ชาย</option>
        <option value="หญิง" {{ request('tutor_gender') === 'หญิง' ? 'selected' : '' }}>หญิง</option>
        <option value="ไม่จำกัด" {{ request('tutor_gender') === 'ไม่จำกัด' ? 'selected' : '' }}>ไม่จำกัด</option>
    </select>
    <button type="submit" class="btn-filter">ค้นหา</button>
</form>

<div class="table-container">
    @if($students->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>LINE ID</th>
                    <th>เบอร์โทร</th>
                    <th>เพศติวเตอร์ที่ต้องการ</th>
                    <th>วันที่สมัคร</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->full_name }}</td>
                    <td>{{ $student->line_id ?? '-' }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->tutor_gender }}</td>
                    <td>{{ $student->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div style="padding: 20px;">
            {{ $students->links() }}
        </div>
    @else
        <div style="text-align: center; padding: 60px; color: #7f8c8d;">
            <p>ไม่มีใบสมัครนักเรียนที่ตรงกับเงื่อนไขที่ค้นหา</p>
        </div>
    @endif
</div>
@endsection
