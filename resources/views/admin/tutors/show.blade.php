@extends('admin.layouts.app')

@section('title', 'รายละเอียดติวเตอร์ - EngBuddy Admin')

@section('page-title', 'รายละเอียดติวเตอร์')

@section('content')
<style>
    .detail-container {
        max-width: 1200px;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #3498db;
        text-decoration: none;
        margin-bottom: 20px;
        font-weight: 500;
    }

    .back-link:hover {
        color: #2980b9;
    }

    .tutor-header {
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        margin-bottom: 25px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
    }

    .tutor-header-top {
        display: flex;
        justify-content: space-between;
        align-items: start;
        margin-bottom: 20px;
    }

    .tutor-name h2 {
        font-size: 28px;
        color: #2c3e50;
        margin-bottom: 8px;
    }

    .tutor-status {
        padding: 8px 16px;
        border-radius: 6px;
        font-weight: 600;
        display: inline-block;
    }

    .status-pending {
        background: #ffeaa7;
        color: #d63031;
    }

    .status-approved {
        background: #55efc4;
        color: #00b894;
    }

    .status-rejected {
        background: #fab1a0;
        color: #d63031;
    }

    .status-suspended {
        background: #dfe6e9;
        color: #2d3436;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .info-item {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .info-label {
        font-size: 13px;
        color: #7f8c8d;
        font-weight: 500;
    }

    .info-value {
        font-size: 15px;
        color: #2c3e50;
        font-weight: 500;
    }

    .section-card {
        background: #fff;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
    }

    .section-title {
        font-size: 20px;
        color: #2c3e50;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #ecf0f1;
    }

    .action-buttons {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 25px;
    }

    .btn {
        padding: 12px 24px;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .btn-approve {
        background: #2ecc71;
        color: #fff;
    }

    .btn-approve:hover {
        background: #27ae60;
    }

    .btn-reject {
        background: #e74c3c;
        color: #fff;
    }

    .btn-reject:hover {
        background: #c0392b;
    }

    .btn-suspend {
        background: #f39c12;
        color: #fff;
    }

    .btn-suspend:hover {
        background: #e67e22;
    }

    .btn-unsuspend {
        background: #3498db;
        color: #fff;
    }

    .btn-unsuspend:hover {
        background: #2980b9;
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 1000;
        align-items: center;
        justify-content: center;
    }

    .modal.active {
        display: flex;
    }

    .modal-content {
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        max-width: 500px;
        width: 90%;
    }

    .modal-header {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 20px;
        color: #2c3e50;
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

    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-family: inherit;
        font-size: 14px;
        resize: vertical;
        min-height: 100px;
    }

    .modal-actions {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
    }

    .btn-cancel {
        background: #95a5a6;
        color: #fff;
    }

    .btn-cancel:hover {
        background: #7f8c8d;
    }

    .subjects-list,
    .education-list,
    .experience-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .list-item {
        padding: 15px;
        background: #f8f9fa;
        border-radius: 6px;
        border-left: 3px solid #3498db;
    }

    .list-item h4 {
        color: #2c3e50;
        margin-bottom: 5px;
    }

    .list-item p {
        color: #7f8c8d;
        font-size: 14px;
        margin: 3px 0;
    }

    .rejection-reason {
        background: #fff3cd;
        border: 1px solid #ffc107;
        padding: 15px;
        border-radius: 6px;
        margin-top: 15px;
    }

    .rejection-reason strong {
        display: block;
        margin-bottom: 8px;
        color: #856404;
    }

    .rejection-reason p {
        color: #856404;
        margin: 0;
    }
</style>

<div class="detail-container">
    <a href="{{ route('admin.tutors.index') }}" class="back-link">
        <svg fill="currentColor" viewBox="0 0 20 20" style="width: 20px; height: 20px;">
            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
        </svg>
        กลับไปรายการติวเตอร์
    </a>

    <div class="tutor-header">
        <div class="tutor-header-top">
            <div class="tutor-name">
                <h2>{{ $tutor->first_name }} {{ $tutor->last_name }}</h2>
                @if($tutor->suspended_at)
                    <span class="tutor-status status-suspended">ระงับ ({{ $tutor->suspended_at->format('d/m/Y') }})</span>
                @elseif($tutor->status === 'pending')
                    <span class="tutor-status status-pending">รออนุมัติ</span>
                @elseif($tutor->status === 'approved')
                    <span class="tutor-status status-approved">อนุมัติแล้ว ({{ $tutor->approved_at?->format('d/m/Y') }})</span>
                @elseif($tutor->status === 'rejected')
                    <span class="tutor-status status-rejected">ปฏิเสธ</span>
                @endif
            </div>
        </div>

        <div class="info-grid">
            <div class="info-item">
                <span class="info-label">อีเมล</span>
                <span class="info-value">{{ $tutor->user->email ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">โทรศัพท์</span>
                <span class="info-value">{{ $tutor->phone }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">จังหวัด</span>
                <span class="info-value">{{ $tutor->province ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">ประสบการณ์สอน</span>
                <span class="info-value">{{ $tutor->teaching_experience_years }} ปี</span>
            </div>
            <div class="info-item">
                <span class="info-label">วันที่สมัคร</span>
                <span class="info-value">{{ $tutor->created_at->format('d/m/Y H:i') }}</span>
            </div>
        </div>

        @if($tutor->rejection_reason)
            <div class="rejection-reason">
                <strong>เหตุผลการปฏิเสธ/ระงับ:</strong>
                <p>{{ $tutor->rejection_reason }}</p>
            </div>
        @endif
    </div>

    @if($tutor->bio)
    <div class="section-card">
        <h3 class="section-title">ประวัติส่วนตัว</h3>
        <p>{{ $tutor->bio }}</p>
    </div>
    @endif

    @if($subjects->count() > 0)
    <div class="section-card">
        <h3 class="section-title">วิชาที่สอน</h3>
        <div class="subjects-list">
            @foreach($subjects as $subject)
            <div class="list-item">
                <h4>{{ $subject->subject_name }}</h4>
                <p>ระดับ: {{ $subject->level ?? 'N/A' }}</p>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    @if($educations->count() > 0)
    <div class="section-card">
        <h3 class="section-title">ประวัติการศึกษา</h3>
        <div class="education-list">
            @foreach($educations as $education)
            <div class="list-item">
                <h4>{{ $education->degree ?? 'N/A' }}</h4>
                <p>{{ $education->institution ?? 'N/A' }}</p>
                <p>{{ $education->field_of_study ?? 'N/A' }}</p>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    @if($experiences->count() > 0)
    <div class="section-card">
        <h3 class="section-title">ประสบการณ์การสอน</h3>
        <div class="experience-list">
            @foreach($experiences as $experience)
            <div class="list-item">
                <h4>{{ $experience->position ?? 'N/A' }}</h4>
                <p>{{ $experience->institution ?? 'N/A' }}</p>
                <p>{{ $experience->description ?? 'N/A' }}</p>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <div class="section-card">
        <h3 class="section-title">การจัดการ</h3>

        <div class="action-buttons">
            @if($tutor->status === 'pending')
                <form action="{{ route('admin.tutors.approve', $tutor->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-approve" onclick="return confirm('ยืนยันการอนุมัติติวเตอร์?')">
                        อนุมัติ
                    </button>
                </form>

                <button type="button" class="btn btn-reject" onclick="openModal('rejectModal')">
                    ปฏิเสธ
                </button>
            @endif

            @if($tutor->status === 'approved')
                @if(!$tutor->suspended_at)
                    <button type="button" class="btn btn-suspend" onclick="openModal('suspendModal')">
                        ระงับติวเตอร์
                    </button>
                @else
                    <form action="{{ route('admin.tutors.unsuspend', $tutor->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-unsuspend" onclick="return confirm('ยืนยันการเปิดใช้งานติวเตอร์?')">
                            เปิดใช้งานอีกครั้ง
                        </button>
                    </form>
                @endif
            @endif
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div id="rejectModal" class="modal">
    <div class="modal-content">
        <h3 class="modal-header">ปฏิเสธติวเตอร์</h3>
        <form action="{{ route('admin.tutors.reject', $tutor->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="reject_reason">เหตุผลการปฏิเสธ *</label>
                <textarea
                    id="reject_reason"
                    name="reason"
                    placeholder="กรุณาระบุเหตุผลการปฏิเสธ..."
                    required
                ></textarea>
            </div>

            <div class="modal-actions">
                <button type="button" class="btn btn-cancel" onclick="closeModal('rejectModal')">
                    ยกเลิก
                </button>
                <button type="submit" class="btn btn-reject">
                    ยืนยันการปฏิเสธ
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Suspend Modal -->
<div id="suspendModal" class="modal">
    <div class="modal-content">
        <h3 class="modal-header">ระงับติวเตอร์</h3>
        <form action="{{ route('admin.tutors.suspend', $tutor->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="suspend_reason">เหตุผลการระงับ *</label>
                <textarea
                    id="suspend_reason"
                    name="reason"
                    placeholder="กรุณาระบุเหตุผลการระงับ..."
                    required
                ></textarea>
            </div>

            <div class="modal-actions">
                <button type="button" class="btn btn-cancel" onclick="closeModal('suspendModal')">
                    ยกเลิก
                </button>
                <button type="submit" class="btn btn-suspend">
                    ยืนยันการระงับ
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.add('active');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('active');
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.classList.remove('active');
        }
    }
</script>
@endpush
@endsection
