@extends('Admin_layer')

@section('title', 'รายละเอียด Tutor')

@section('content')
<div class="detail-header">
    <a href="{{ route('admin.tutors.index') }}" class="btn-back">
        ← กลับไปหน้ารายการ
    </a>
</div>

<!-- Success/Error Messages -->
@if(session('success'))
<div class="alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert-error">
    {{ session('error') }}
</div>
@endif

<!-- Status Badge & Actions -->
<div class="status-actions-bar">
    <div class="status-section">
        <h2 class="page-title">รายละเอียด Tutor</h2>
        <div class="status-badge-large">
            @if($tutor->status == 'pending')
                <span class="badge badge-warning">รออนุมัติ</span>
            @elseif($tutor->status == 'approved')
                <span class="badge badge-success">อนุมัติแล้ว</span>
            @elseif($tutor->status == 'rejected')
                <span class="badge badge-danger">ปฏิเสธ</span>
            @elseif($tutor->status == 'suspended')
                <span class="badge badge-secondary">ระงับ</span>
            @endif
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="actions">
        @if($tutor->status == 'pending')
            <!-- Approve Button -->
            <form method="POST" action="{{ route('admin.tutors.approve', $tutor->id) }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-success" onclick="return confirm('คุณต้องการอนุมัติ Tutor นี้ใช่หรือไม่?')">
                    ✓ อนุมัติ
                </button>
            </form>

            <!-- Reject Button -->
            <button type="button" class="btn btn-danger" onclick="showRejectModal()">
                ✗ ปฏิเสธ
            </button>
        @elseif($tutor->status == 'approved')
            <!-- Suspend Button -->
            <form method="POST" action="{{ route('admin.tutors.suspend', $tutor->id) }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-warning" onclick="return confirm('คุณต้องการระงับ Tutor นี้ใช่หรือไม่?')">
                    ⏸ ระงับ
                </button>
            </form>
        @elseif($tutor->status == 'suspended')
            <!-- Activate Button -->
            <form method="POST" action="{{ route('admin.tutors.activate', $tutor->id) }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-success" onclick="return confirm('คุณต้องการเปิดใช้งาน Tutor นี้อีกครั้งใช่หรือไม่?')">
                    ▶ เปิดใช้งาน
                </button>
            </form>
        @endif
    </div>
</div>

<!-- Main Content Grid -->
<div class="detail-grid">
    <!-- Left Column -->
    <div class="left-column">
        <!-- Personal Information Card -->
        <div class="card">
            <h3 class="card-title">ข้อมูลส่วนตัว</h3>

            <div class="avatar-large">
                {{ substr($tutor->first_name, 0, 1) }}{{ substr($tutor->last_name, 0, 1) }}
            </div>

            <div class="info-group">
                <label>ชื่อ-นามสกุล</label>
                <p>{{ $tutor->full_name }}</p>
            </div>

            <div class="info-group">
                <label>อีเมล</label>
                <p>{{ $tutor->user->email }}</p>
            </div>

            <div class="info-group">
                <label>เบอร์โทรศัพท์</label>
                <p>{{ $tutor->phone }}</p>
            </div>

            <div class="info-group">
                <label>ที่อยู่</label>
                <p>
                    {{ $tutor->address }}<br>
                    {{ $tutor->district }} {{ $tutor->province }} {{ $tutor->postal_code }}
                </p>
            </div>

            <div class="info-group">
                <label>Bio / แนะนำตัว</label>
                <p>{{ $tutor->bio ?? '-' }}</p>
            </div>

            @if($tutor->id_card_image)
            <div class="info-group">
                <label>รูปบัตรประชาชน</label>
                <div class="id-card-preview">
                    <img src="{{ asset('storage/' . $tutor->id_card_image) }}" alt="ID Card">
                </div>
            </div>
            @endif
        </div>

        <!-- Experience Card -->
        <div class="card">
            <h3 class="card-title">ประสบการณ์การสอน</h3>

            <div class="info-group">
                <label>มีประสบการณ์การสอนหรือไม่?</label>
                <p>{{ $tutor->has_teaching_experience ? 'มี' : 'ไม่มี' }}</p>
            </div>

            @if($tutor->has_teaching_experience)
            <div class="info-group">
                <label>จำนวนปีประสบการณ์</label>
                <p>{{ $tutor->teaching_experience_years }} ปี</p>
            </div>
            @endif

            <div class="info-group">
                <label>ประสบการณ์การทำงาน</label>
                <p>{{ $tutor->work_experience ?? '-' }}</p>
            </div>

            <div class="info-group">
                <label>ข้อมูลเพิ่มเติม</label>
                <p>{{ $tutor->additional_info ?? '-' }}</p>
            </div>
        </div>
    </div>

    <!-- Right Column -->
    <div class="right-column">
        <!-- Education Card -->
        <div class="card">
            <h3 class="card-title">การศึกษา</h3>

            @forelse($tutor->educations as $education)
            <div class="education-item">
                <div class="education-icon">🎓</div>
                <div class="education-details">
                    <h4>{{ $education->degree_level }}</h4>
                    <p class="institution">{{ $education->institution }}</p>
                    <p class="field">สาขา: {{ $education->field_of_study }}</p>
                    @if($education->gpa)
                    <p class="gpa">GPA: {{ $education->gpa }}</p>
                    @endif
                </div>
            </div>
            @empty
            <p class="empty-text">ไม่มีข้อมูลการศึกษา</p>
            @endforelse
        </div>

        <!-- Subjects Card -->
        <div class="card">
            <h3 class="card-title">วิชาที่สอน</h3>

            @forelse($tutor->subjects as $subject)
            <div class="subject-item">
                <div class="subject-info">
                    <span class="subject-name">วิชา ID: {{ $subject->subject_id }}</span>
                    <span class="hourly-rate">{{ number_format($subject->hourly_rate) }} บาท/ชม.</span>
                </div>
                @if($subject->description)
                <p class="subject-desc">{{ $subject->description }}</p>
                @endif
            </div>
            @empty
            <p class="empty-text">ไม่มีข้อมูลวิชาที่สอน</p>
            @endforelse
        </div>

        <!-- System Info Card -->
        <div class="card">
            <h3 class="card-title">ข้อมูลระบบ</h3>

            <div class="info-group">
                <label>วันที่สมัคร</label>
                <p>{{ $tutor->created_at->format('d/m/Y H:i') }}</p>
            </div>

            @if($tutor->approved_at)
            <div class="info-group">
                <label>วันที่อนุมัติ</label>
                <p>{{ $tutor->approved_at->format('d/m/Y H:i') }}</p>
            </div>
            @endif

            @if($tutor->approver)
            <div class="info-group">
                <label>อนุมัติโดย</label>
                <p>{{ $tutor->approver->name }}</p>
            </div>
            @endif

            @if($tutor->rejection_reason)
            <div class="info-group">
                <label>เหตุผลที่ปฏิเสธ</label>
                <p class="rejection-reason">{{ $tutor->rejection_reason }}</p>
            </div>
            @endif

            @if($tutor->suspended_at)
            <div class="info-group">
                <label>วันที่ระงับ</label>
                <p>{{ $tutor->suspended_at->format('d/m/Y H:i') }}</p>
            </div>
            @endif

            <div class="info-group">
                <label>ยอมรับเงื่อนไข</label>
                <p>{{ $tutor->accepted_terms_at ? $tutor->accepted_terms_at->format('d/m/Y H:i') : '-' }}</p>
            </div>

            <div class="info-group">
                <label>ยอมรับนโยบายความเป็นส่วนตัว</label>
                <p>{{ $tutor->accepted_privacy_at ? $tutor->accepted_privacy_at->format('d/m/Y H:i') : '-' }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div id="rejectModal" class="modal" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <h3>ปฏิเสธ Tutor</h3>
            <button type="button" class="modal-close" onclick="closeRejectModal()">✕</button>
        </div>
        <form method="POST" action="{{ route('admin.tutors.reject', $tutor->id) }}">
            @csrf
            <div class="modal-body">
                <label>เหตุผลที่ปฏิเสธ *</label>
                <textarea
                    name="rejection_reason"
                    rows="4"
                    placeholder="กรุณาระบุเหตุผลที่ปฏิเสธ..."
                    required
                    class="form-textarea"
                ></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeRejectModal()">ยกเลิก</button>
                <button type="submit" class="btn btn-danger">ยืนยันปฏิเสธ</button>
            </div>
        </form>
    </div>
</div>

<style>
/* Header */
.detail-header {
    margin-bottom: 20px;
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

/* Alerts */
.alert-success, .alert-error {
    padding: 14px 18px;
    border-radius: 10px;
    margin-bottom: 20px;
    font-weight: 500;
}

.alert-success {
    background: #d1fae5;
    color: #065f46;
}

.alert-error {
    background: #fee2e2;
    color: #991b1b;
}

/* Status & Actions Bar */
.status-actions-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 28px;
    padding: 20px;
    background: var(--card);
    border-radius: 14px;
    box-shadow: var(--shadow);
}

.status-section {
    display: flex;
    align-items: center;
    gap: 16px;
}

.status-badge-large .badge {
    font-size: 15px;
    padding: 8px 18px;
}

.actions {
    display: flex;
    gap: 12px;
}

/* Buttons */
.btn {
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: 0.2s;
    font-family: "Prompt", sans-serif;
}

.btn-success {
    background: #10b981;
    color: white;
}

.btn-success:hover {
    background: #059669;
}

.btn-danger {
    background: #ef4444;
    color: white;
}

.btn-danger:hover {
    background: #dc2626;
}

.btn-warning {
    background: #f59e0b;
    color: white;
}

.btn-warning:hover {
    background: #d97706;
}

.btn-secondary {
    background: var(--bg);
    color: var(--ink);
    border: 1px solid var(--line);
}

.btn-secondary:hover {
    background: var(--line);
}

/* Detail Grid */
.detail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
}

@media (max-width: 968px) {
    .detail-grid {
        grid-template-columns: 1fr;
    }
}

.left-column, .right-column {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

/* Card Styles */
.card-title {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 2px solid var(--line);
    color: var(--brand);
}

.avatar-large {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--brand), var(--accent));
    display: grid;
    place-content: center;
    font-weight: 700;
    color: white;
    font-size: 32px;
    margin: 0 auto 24px;
}

.info-group {
    margin-bottom: 18px;
}

.info-group label {
    display: block;
    font-weight: 600;
    color: var(--muted);
    font-size: 13px;
    margin-bottom: 6px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.info-group p {
    color: var(--ink);
    font-size: 15px;
    line-height: 1.6;
}

/* ID Card Preview */
.id-card-preview {
    margin-top: 10px;
    border: 2px solid var(--line);
    border-radius: 10px;
    overflow: hidden;
    max-width: 400px;
}

.id-card-preview img {
    width: 100%;
    height: auto;
    display: block;
}

/* Education Item */
.education-item {
    display: flex;
    gap: 16px;
    padding: 16px;
    background: var(--bg);
    border-radius: 10px;
    margin-bottom: 12px;
}

.education-icon {
    font-size: 32px;
    flex-shrink: 0;
}

.education-details h4 {
    font-size: 16px;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 6px;
}

.education-details p {
    font-size: 14px;
    color: var(--muted);
    margin: 4px 0;
}

.institution {
    font-weight: 600;
    color: var(--brand) !important;
}

/* Subject Item */
.subject-item {
    padding: 14px 16px;
    background: var(--bg);
    border-radius: 10px;
    margin-bottom: 12px;
}

.subject-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 6px;
}

.subject-name {
    font-weight: 600;
    color: var(--ink);
}

.hourly-rate {
    font-weight: 700;
    color: var(--brand);
    font-size: 15px;
}

.subject-desc {
    font-size: 14px;
    color: var(--muted);
    margin-top: 8px;
}

/* Empty State */
.empty-text {
    color: var(--muted);
    font-style: italic;
    text-align: center;
    padding: 20px;
}

/* Rejection Reason */
.rejection-reason {
    background: #fee2e2;
    color: #991b1b;
    padding: 12px;
    border-radius: 8px;
    border-left: 4px solid #ef4444;
}

/* Modal */
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.modal-content {
    background: var(--card);
    border-radius: 14px;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 24px;
    border-bottom: 1px solid var(--line);
}

.modal-header h3 {
    font-size: 18px;
    font-weight: 700;
    color: var(--ink);
}

.modal-close {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
    color: var(--muted);
}

.modal-close:hover {
    color: var(--ink);
}

.modal-body {
    padding: 24px;
}

.modal-body label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: var(--ink);
}

.form-textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid var(--line);
    border-radius: 8px;
    font-family: "Prompt", sans-serif;
    font-size: 14px;
    resize: vertical;
}

.form-textarea:focus {
    outline: none;
    border-color: var(--brand);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.modal-footer {
    padding: 16px 24px;
    border-top: 1px solid var(--line);
    display: flex;
    justify-content: flex-end;
    gap: 12px;
}
</style>

<script>
function showRejectModal() {
    document.getElementById('rejectModal').style.display = 'flex';
}

function closeRejectModal() {
    document.getElementById('rejectModal').style.display = 'none';
}

// Close modal when clicking outside
document.getElementById('rejectModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeRejectModal();
    }
});
</script>
@endsection
