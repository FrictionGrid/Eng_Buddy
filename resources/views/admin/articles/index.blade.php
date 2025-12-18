@extends('admin.layouts.app')

@section('title', 'จัดการบทความ - EngBuddy Admin')

@section('page-title', 'จัดการบทความ')

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
        flex-wrap: wrap;
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

    .article-image {
        width: 80px;
        height: 60px;
        object-fit: cover;
        border-radius: 4px;
    }

    .badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    .badge-active {
        background: #55efc4;
        color: #00b894;
    }

    .badge-inactive {
        background: #dfe6e9;
        color: #2d3436;
    }

    .badge-featured {
        background: #fdcb6e;
        color: #e17055;
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
        white-space: nowrap;
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
        white-space: nowrap;
    }

    .article-title {
        font-weight: 500;
        color: #2c3e50;
        display: block;
        margin-bottom: 5px;
    }

    .article-meta {
        font-size: 12px;
        color: #7f8c8d;
    }
</style>

<div class="top-actions">
    <h2>บทความทั้งหมด ({{ $articles->total() }})</h2>
    <a href="{{ route('admin.articles.create') }}" class="btn-create">+ เพิ่มบทความใหม่</a>
</div>

<form action="{{ route('admin.articles.index') }}" method="GET" class="filters-form">
    <input
        type="text"
        name="search"
        placeholder="ค้นหาบทความ..."
        value="{{ request('search') }}"
    >
    <select name="category">
        <option value="">ทุกหมวดหมู่</option>
        @foreach($categories as $cat)
            <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>
                {{ $cat }}
            </option>
        @endforeach
    </select>
    <select name="status">
        <option value="">ทุกสถานะ</option>
        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>เผยแพร่</option>
        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>ไม่เผยแพร่</option>
    </select>
    <button type="submit" class="btn-filter">ค้นหา</button>
</form>

<div class="table-container">
    @if($articles->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>รูป</th>
                    <th>บทความ</th>
                    <th>หมวดหมู่</th>
                    <th>ผู้เขียน</th>
                    <th>ยอดดู</th>
                    <th>สถานะ</th>
                    <th>การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td>
                        @if($article->image)
                            <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="article-image">
                        @else
                            <div class="article-image" style="background: #ecf0f1; display: flex; align-items: center; justify-content: center; color: #95a5a6; font-size: 11px;">
                                ไม่มีรูป
                            </div>
                        @endif
                    </td>
                    <td>
                        <span class="article-title">{{ Str::limit($article->title, 50) }}</span>
                        <span class="article-meta">
                            เผยแพร่: {{ $article->published_at ? $article->published_at->format('d/m/Y') : '-' }}
                        </span>
                    </td>
                    <td>{{ $article->category ?? '-' }}</td>
                    <td>{{ $article->author ?? '-' }}</td>
                    <td>{{ number_format($article->views) }}</td>
                    <td>
                        @if($article->is_featured)
                            <span class="badge badge-featured">Featured</span>
                        @endif
                        @if($article->is_active)
                            <span class="badge badge-active">เผยแพร่</span>
                        @else
                            <span class="badge badge-inactive">ไม่เผยแพร่</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn-edit">แก้ไข</a>
                            <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('ยืนยันการลบบทความนี้?')">ลบ</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div style="padding: 20px;">
            {{ $articles->links() }}
        </div>
    @else
        <div style="text-align: center; padding: 60px; color: #7f8c8d;">
            <p>ไม่มีบทความที่ตรงกับเงื่อนไขที่ค้นหา</p>
        </div>
    @endif
</div>
@endsection
