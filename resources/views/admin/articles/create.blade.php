@extends('admin.layouts.app')

@section('title', 'เพิ่มบทความใหม่ - EngBuddy Admin')

@section('page-title', 'เพิ่มบทความใหม่')

@section('content')
<style>
    .form-container {
        max-width: 1000px;
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 20px;
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

    textarea.form-control {
        min-height: 150px;
        resize: vertical;
    }

    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .checkbox-group input[type="checkbox"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    .checkbox-group label {
        margin: 0;
        cursor: pointer;
    }

    .file-input-wrapper {
        position: relative;
    }

    .file-input {
        display: none;
    }

    .file-input-label {
        display: block;
        padding: 40px 20px;
        border: 2px dashed #ddd;
        border-radius: 6px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        background: #f8f9fa;
    }

    .file-input-label:hover {
        border-color: #3498db;
        background: #e8f4fd;
    }

    .file-input-label.has-file {
        border-color: #2ecc71;
        background: #e8f8f0;
    }

    .image-preview {
        max-width: 100%;
        max-height: 300px;
        margin-top: 15px;
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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

    .help-text {
        font-size: 13px;
        color: #7f8c8d;
        margin-top: 5px;
    }
</style>

<div class="form-container">
    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">ชื่อบทความ *</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
                <p style="color: #e74c3c; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="slug">Slug (URL)</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="จะสร้างอัตโนมัติถ้าไม่กรอก">
                <p class="help-text">ใช้สำหรับ URL เช่น: my-article-title</p>
                @error('slug')
                    <p style="color: #e74c3c; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="category">หมวดหมู่</label>
                <input type="text" id="category" name="category" class="form-control" value="{{ old('category') }}" placeholder="เช่น: เรียนภาษาอังกฤษ">
                @error('category')
                    <p style="color: #e74c3c; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="short_description">คำอธิบายสั้น</label>
            <textarea id="short_description" name="short_description" class="form-control" rows="3" placeholder="สรุปบทความสั้นๆ (สูงสุด 500 ตัวอักษร)">{{ old('short_description') }}</textarea>
            @error('short_description')
                <p style="color: #e74c3c; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">เนื้อหาบทความ *</label>
            <textarea id="content" name="content" class="form-control" rows="15" required>{{ old('content') }}</textarea>
            @error('content')
                <p style="color: #e74c3c; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">รูปภาพประกอบ</label>
            <div class="file-input-wrapper">
                <input
                    type="file"
                    id="image"
                    name="image"
                    class="file-input"
                    accept="image/*"
                    onchange="previewImage(event)"
                >
                <label for="image" class="file-input-label" id="fileLabel">
                    <div>
                        <strong>คลิกเพื่อเลือกรูปภาพ</strong>
                        <p class="help-text">หรือลากไฟล์มาวางที่นี่</p>
                    </div>
                    <span class="file-name" id="fileName"></span>
                </label>
            </div>
            <div id="imagePreview" style="display: none;">
                <img id="previewImg" class="image-preview" alt="Preview">
            </div>
            <p class="help-text">รองรับไฟล์: JPG, PNG, GIF (ขนาดไม่เกิน 2MB)</p>
            @error('image')
                <p style="color: #e74c3c; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="author">ผู้เขียน</label>
                <input type="text" id="author" name="author" class="form-control" value="{{ old('author') }}" placeholder="ชื่อผู้เขียน">
                @error('author')
                    <p style="color: #e74c3c; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="published_at">วันที่เผยแพร่</label>
                <input type="datetime-local" id="published_at" name="published_at" class="form-control" value="{{ old('published_at') }}">
                <p class="help-text">ถ้าไม่กรอกจะใช้เวลาปัจจุบัน</p>
                @error('published_at')
                    <p style="color: #e74c3c; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <div class="checkbox-group">
                    <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                    <label for="is_featured">Featured (แนะนำ)</label>
                </div>
            </div>

            <div class="form-group">
                <div class="checkbox-group">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                    <label for="is_active">เผยแพร่ทันที</label>
                </div>
            </div>
        </div>

        <div>
            <button type="submit" class="btn-submit">บันทึก</button>
            <a href="{{ route('admin.articles.index') }}" class="btn-cancel">ยกเลิก</a>
        </div>
    </form>
</div>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    const fileLabel = document.getElementById('fileLabel');
    const fileName = document.getElementById('fileName');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');

    if (file) {
        fileLabel.classList.add('has-file');
        fileName.textContent = file.name;

        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            imagePreview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
}
</script>
@endsection
