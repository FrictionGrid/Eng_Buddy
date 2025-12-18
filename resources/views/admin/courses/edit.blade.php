@extends('admin.layouts.app')

@section('title', 'แก้ไขคอร์ส - EngBuddy Admin')

@section('page-title', 'แก้ไขคอร์ส')

@section('content')
<style>
    .form-container {
        max-width: 800px;
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #2c3e50;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
    }

    .form-control:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
    }

    .btn-submit {
        padding: 12px 24px;
        background: #3498db;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-cancel {
        padding: 12px 24px;
        background: #95a5a6;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        margin-left: 10px;
    }
</style>

<div class="form-container">
    <form action="{{ route('admin.courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="subject">ชื่อวิชา *</label>
            <input type="text" id="subject" name="subject" class="form-control" value="{{ $course->subject }}" required>
        </div>

        <div class="form-group">
            <label for="description">รายละเอียด</label>
            <textarea id="description" name="description" class="form-control" rows="4">{{ $course->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="location">สถานที่เรียน *</label>
            <input type="text" id="location" name="location" class="form-control" value="{{ $course->location }}" required>
        </div>

        <div class="form-group">
            <label for="day">วันเรียน *</label>
            <input type="text" id="day" name="day" class="form-control" value="{{ $course->day }}" placeholder="เช่น จันทร์-ศุกร์" required>
        </div>

        <div class="form-group">
            <label for="time">เวลาเรียน *</label>
            <input type="text" id="time" name="time" class="form-control" value="{{ $course->time }}" placeholder="เช่น 09:00-12:00" required>
        </div>

        <div class="form-group">
            <label for="rate">ค่าสอน (บาท) *</label>
            <input type="number" id="rate" name="rate" class="form-control" value="{{ $course->rate }}" required>
        </div>

        <div class="form-group">
            <label for="status">สถานะ *</label>
            <select id="status" name="status" class="form-control" required>
                <option value="ใหม่" {{ $course->status === 'ใหม่' ? 'selected' : '' }}>ใหม่</option>
                <option value="ปิดงาน" {{ $course->status === 'ปิดงาน' ? 'selected' : '' }}>ปิดงาน</option>
            </select>
        </div>

        <div>
            <button type="submit" class="btn-submit">บันทึกการแก้ไข</button>
            <a href="{{ route('admin.courses.index') }}" class="btn-cancel">ยกเลิก</a>
        </div>
    </form>
</div>
@endsection
