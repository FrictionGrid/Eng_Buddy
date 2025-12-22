@extends('admin.layouts.app')

@section('title', 'เพิ่มคอร์สใหม่ - EngBuddy Admin')

@section('page-title', 'เพิ่มคอร์สใหม่')

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
        background: #2ecc71;
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
    <form action="{{ route('admin.courses.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="subject">ชื่อวิชา *</label>
            <input type="text" id="subject" name="subject" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">รายละเอียด</label>
            <textarea id="description" name="description" class="form-control" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="location">สถานที่เรียน *</label>
            <input type="text" id="location" name="location" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="day">วันเรียน *</label>
            <input type="text" id="day" name="day" class="form-control" placeholder="เช่น จันทร์-ศุกร์" required>
        </div>

        <div class="form-group">
            <label for="time">เวลาเรียน *</label>
            <input type="text" id="time" name="time" class="form-control" placeholder="เช่น 09:00-12:00" required>
        </div>

        <div class="form-group">
            <label for="rate">ค่าสอน (บาท)</label>
            <input type="number" id="rate" name="rate" class="form-control">
        </div>

        <div class="form-group">
            <label for="gender">เพศ</label>
            <input type="text" id="gender" name="gender" class="form-control" placeholder="เช่น ชาย, หญิง, ไม่ระบุ">
        </div>

        <div class="form-group">
            <label for="level">ระดับ</label>
            <input type="text" id="level" name="level" class="form-control" placeholder="เช่น ม.1, ม.4, ปวช.">
        </div>

        <div class="form-group">
            <label for="school">สถานศึกษา</label>
            <input type="text" id="school" name="school" class="form-control" placeholder="เช่น โรงเรียนสตรีวัดระฆัง">
        </div>

        <div class="form-group">
            <label for="transportation">การเดินทาง</label>
            <input type="text" id="transportation" name="transportation" class="form-control" placeholder="เช่น รถไฟฟ้า MRT, รถประจำทาง">
        </div>

        <div class="form-group">
            <label for="referral_fee">ค่าแนะนำ (บาท)</label>
            <input type="number" id="referral_fee" name="referral_fee" class="form-control">
        </div>

        <div class="form-group">
            <label for="status">สถานะ *</label>
            <select id="status" name="status" class="form-control" required>
                <option value="ใหม่">ใหม่</option>
                <option value="ปิดงาน">ปิดงาน</option>
            </select>
        </div>

        <div>
            <button type="submit" class="btn-submit">บันทึก</button>
            <a href="{{ route('admin.courses.index') }}" class="btn-cancel">ยกเลิก</a>
        </div>
    </form>
</div>
@endsection
