@extends('admin.layouts.app')

@section('title', 'จัดการรูปรีวิว - EngBuddy Admin')

@section('page-title', 'จัดการรูปรีวิวหน้า Student Home')

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

    .reviews-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
        margin-bottom: 25px;
    }

    .review-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        transition: all 0.3s;
    }

    .review-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    }

    .review-image {
        width: 100%;
        height: 300px;
        object-fit: cover;
        background: #f8f9fa;
    }

    .review-actions {
        padding: 15px;
        display: flex;
        gap: 10px;
        justify-content: space-between;
        align-items: center;
    }

    .review-id {
        font-size: 13px;
        color: #7f8c8d;
        font-weight: 500;
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

    .empty-state {
        text-align: center;
        padding: 80px 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
    }

    .empty-state svg {
        width: 80px;
        height: 80px;
        margin-bottom: 20px;
        opacity: 0.3;
    }

    .empty-state h3 {
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .empty-state p {
        color: #7f8c8d;
        margin-bottom: 20px;
    }
</style>

<div class="top-actions">
    <h2>รูปรีวิวทั้งหมด ({{ $reviews->total() }} รูป)</h2>
    <a href="{{ route('admin.reviews.create') }}" class="btn-create">+ เพิ่มรูปรีวิวใหม่</a>
</div>

@if($reviews->count() > 0)
    <div class="reviews-grid">
        @foreach($reviews as $review)
        <div class="review-card">
            <img src="{{ asset($review->image) }}" alt="Review #{{ $review->id }}" class="review-image">
            <div class="review-actions">
                <span class="review-id">ID: {{ $review->id }}</span>
                <div class="action-btns">
                    <a href="{{ route('admin.reviews.edit', $review->id) }}" class="btn-edit">แก้ไข</a>
                    <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('ยืนยันการลบรูปนี้?')">ลบ</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.08);">
        {{ $reviews->links() }}
    </div>
@else
    <div class="empty-state">
        <svg fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
        </svg>
        <h3>ยังไม่มีรูปรีวิว</h3>
        <p>เริ่มต้นเพิ่มรูปรีวิวเพื่อแสดงในหน้า Student Home</p>
        <a href="{{ route('admin.reviews.create') }}" class="btn-create">เพิ่มรูปรีวิวแรก</a>
    </div>
@endif
@endsection
