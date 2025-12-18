@extends('admin.layouts.app')

@section('title', 'แก้ไขรูปรีวิว - EngBuddy Admin')

@section('page-title', 'แก้ไขรูปรีวิว')

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

    .current-image-section {
        margin-bottom: 20px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 6px;
    }

    .current-image-label {
        font-size: 14px;
        color: #7f8c8d;
        margin-bottom: 10px;
        display: block;
    }

    .current-image {
        max-width: 100%;
        max-height: 300px;
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .file-input-wrapper {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .file-input {
        display: none;
    }

    .file-input-label {
        display: block;
        padding: 60px 20px;
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

    .upload-icon {
        width: 60px;
        height: 60px;
        margin-bottom: 15px;
        opacity: 0.5;
    }

    .file-name {
        display: block;
        margin-top: 15px;
        color: #2c3e50;
        font-weight: 500;
    }

    .image-preview {
        max-width: 100%;
        max-height: 400px;
        margin-top: 15px;
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .btn-submit {
        padding: 12px 24px;
        background: #3498db;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-submit:hover {
        background: #2980b9;
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

    .btn-cancel:hover {
        background: #7f8c8d;
    }

    .help-text {
        font-size: 13px;
        color: #7f8c8d;
        margin-top: 5px;
    }
</style>

<div class="form-container">
    <div class="current-image-section">
        <span class="current-image-label">รูปภาพปัจจุบัน:</span>
        <img src="{{ asset($review->image) }}" alt="Current Review" class="current-image">
    </div>

    <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST" enctype="multipart/form-data" id="reviewForm">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="image">เปลี่ยนรูปรีวิว (ไม่บังคับ)</label>
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
                    <svg class="upload-icon" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <strong>คลิกเพื่อเลือกรูปภาพใหม่</strong>
                        <p class="help-text">หรือลากไฟล์มาวางที่นี่</p>
                    </div>
                    <span class="file-name" id="fileName"></span>
                </label>
            </div>
            <div id="imagePreview" style="display: none;">
                <img id="previewImg" class="image-preview" alt="Preview">
            </div>
            <p class="help-text">รองรับไฟล์: JPG, PNG, GIF (ขนาดไม่เกิน 2MB) - หากไม่เลือกรูปใหม่ จะใช้รูปเดิม</p>
            @error('image')
                <p style="color: #e74c3c; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit" class="btn-submit">บันทึกการแก้ไข</button>
            <a href="{{ route('admin.reviews.index') }}" class="btn-cancel">ยกเลิก</a>
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
