@extends('Admin_layer')

@section('title', $isEdit ? 'แก้ไขคอร์ส' : 'เพิ่มคอร์สใหม่')

@section('content')
<div class="form-header">
    <a href="{{ route('admin.courses.index') }}" class="btn-back">
        ← กลับไปหน้ารายการ
    </a>
</div>

<div class="form-container">
    <div class="form-card">
        <h2 class="form-title">{{ $isEdit ? 'แก้ไขคอร์ส' : 'เพิ่มคอร์สใหม่' }}</h2>

        @if($errors->any())
        <div class="alert-error">
            <strong>เกิดข้อผิดพลาด:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form
            method="POST"
            action="{{ $isEdit ? route('admin.courses.update', $course->id) : route('admin.courses.store') }}"
            class="course-form"
        >
            @csrf
            @if($isEdit)
                @method('PUT')
            @endif

            <div class="form-row">
                <div class="form-group">
                    <label for="subject">ชื่อวิชา <span class="required">*</span></label>
                    <input
                        type="text"
                        id="subject"
                        name="subject"
                        value="{{ old('subject', $course->subject ?? '') }}"
                        required
                        placeholder="เช่น คณิตศาสตร์ ม.3"
                        class="form-input"
                    >
                </div>

                <div class="form-group">
                    <label for="status">สถานะ <span class="required">*</span></label>
                    <select
                        id="status"
                        name="status"
                        required
                        class="form-select"
                    >
                        <option value="ใหม่" {{ old('status', $course->status ?? 'ใหม่') == 'ใหม่' ? 'selected' : '' }}>
                            ใหม่
                        </option>
                        <option value="ปิดงาน" {{ old('status', $course->status ?? '') == 'ปิดงาน' ? 'selected' : '' }}>
                            ปิดงาน
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="description">คำอธิบายคอร์ส</label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    placeholder="รายละเอียดเพิ่มเติมเกี่ยวกับคอร์ส..."
                    class="form-textarea"
                >{{ old('description', $course->description ?? '') }}</textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="location">สถานที่สอน <span class="required">*</span></label>
                    <input
                        type="text"
                        id="location"
                        name="location"
                        value="{{ old('location', $course->location ?? '') }}"
                        required
                        placeholder="เช่น กรุงเทพ, ออนไลน์"
                        class="form-input"
                    >
                </div>

                <div class="form-group">
                    <label for="rate">ค่าสอน (บาท/ชม.)</label>
                    <input
                        type="number"
                        id="rate"
                        name="rate"
                        value="{{ old('rate', $course->rate ?? '') }}"
                        min="0"
                        placeholder="เช่น 500"
                        class="form-input"
                    >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="day">วันที่สอน <span class="required">*</span></label>
                    <input
                        type="text"
                        id="day"
                        name="day"
                        value="{{ old('day', $course->day ?? '') }}"
                        required
                        placeholder="เช่น จันทร์-ศุกร์"
                        class="form-input"
                    >
                </div>

                <div class="form-group">
                    <label for="time">เวลาสอน <span class="required">*</span></label>
                    <input
                        type="text"
                        id="time"
                        name="time"
                        value="{{ old('time', $course->time ?? '') }}"
                        required
                        placeholder="เช่น 09:00-11:00"
                        class="form-input"
                    >
                </div>
            </div>

            @if($isEdit)
            <div class="form-group">
                <label>รหัสงาน</label>
                <div class="job-code-display">{{ $course->job_code }}</div>
                <small class="form-help">รหัสงานไม่สามารถแก้ไขได้</small>
            </div>
            @else
            <div class="form-info">
                <strong>ℹ️ หมายเหตุ:</strong> รหัสงานจะถูกสร้างอัตโนมัติหลังจากบันทึกข้อมูล
            </div>
            @endif

            <div class="form-actions">
                <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">
                    ยกเลิก
                </a>
                <button type="submit" class="btn btn-primary">
                    {{ $isEdit ? '💾 บันทึกการแก้ไข' : '➕ เพิ่มคอร์ส' }}
                </button>
            </div>
        </form>
    </div>
</div>

<style>
.form-header {
    margin-bottom: 24px;
}

.btn-back {
    display: inline-block;
    padding: 10px 18px;
    background: var(--bg);
    color: var(--ink);
    border: 1px solid var(--line);
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: 0.2s;
}

.btn-back:hover {
    background: var(--line);
}

.form-container {
    display: flex;
    justify-content: center;
}

.form-card {
    background: var(--card);
    padding: 32px;
    border-radius: 14px;
    box-shadow: var(--shadow);
    width: 100%;
    max-width: 800px;
}

.form-title {
    font-size: 24px;
    font-weight: 700;
    color: var(--brand);
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 2px solid var(--line);
}

.alert-error {
    background: #fee2e2;
    color: #991b1b;
    padding: 14px 18px;
    border-radius: 10px;
    margin-bottom: 24px;
    border: 1px solid #fecaca;
}

.alert-error ul {
    margin: 8px 0 0 20px;
}

.alert-error li {
    margin: 4px 0;
}

.course-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.form-group label {
    font-weight: 600;
    color: var(--ink);
    font-size: 14px;
}

.required {
    color: #ef4444;
}

.form-input,
.form-select,
.form-textarea {
    padding: 12px 16px;
    border: 2px solid var(--line);
    border-radius: 8px;
    font-size: 15px;
    font-family: "Prompt", sans-serif;
    transition: all 0.2s;
    background: var(--bg);
    color: var(--ink);
}

.form-input:focus,
.form-select:focus,
.form-textarea:focus {
    outline: none;
    border-color: var(--brand);
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
}

.form-textarea {
    resize: vertical;
}

.form-select {
    cursor: pointer;
}

.job-code-display {
    padding: 12px 16px;
    background: var(--bg);
    border: 2px solid var(--line);
    border-radius: 8px;
    font-family: monospace;
    font-weight: 700;
    color: var(--brand);
    font-size: 16px;
}

.form-help {
    color: var(--muted);
    font-size: 13px;
}

.form-info {
    padding: 14px 16px;
    background: #dbeafe;
    border: 1px solid #93c5fd;
    border-radius: 8px;
    color: #1e40af;
    font-size: 14px;
}

.form-actions {
    display: flex;
    gap: 12px;
    justify-content: flex-end;
    margin-top: 8px;
    padding-top: 24px;
    border-top: 1px solid var(--line);
}

.btn {
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.2s;
    border: none;
    font-family: "Prompt", sans-serif;
    text-decoration: none;
    display: inline-block;
}

.btn-primary {
    background: var(--brand);
    color: white;
}

.btn-primary:hover {
    background: #2563eb;
    transform: translateY(-1px);
}

.btn-secondary {
    background: var(--bg);
    color: var(--ink);
    border: 1px solid var(--line);
}

.btn-secondary:hover {
    background: var(--line);
}

@media (max-width: 768px) {
    .form-card {
        padding: 24px;
    }

    .form-row {
        grid-template-columns: 1fr;
    }

    .form-actions {
        flex-direction: column-reverse;
    }

    .btn {
        width: 100%;
    }
}
</style>
@endsection
