@extends('Tutor_layout')

@section('title', 'ข้อมูลงานสอน | EngBuddy')

@section('content')

<style>
* {
  box-sizing: border-box;
}

.page-wrap {
  max-width: 1000px;
  margin: 40px auto;
  padding: 0 20px;
}

.status-bar {
  background: linear-gradient(135deg, #667eea, #764ba2);
  color: #fff;
  border-radius: 12px;
  padding: 16px 24px;
  text-align: center;
  font-weight: 600;
  margin-bottom: 24px;
  box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
  font-size: 15px;
}

.card {
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  border: 1px solid #e5e7eb;
  overflow: hidden;
}

/* Desktop: 2 columns layout */
.info-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 0;
}

.info-item {
  display: flex;
  gap: 16px;
  padding: 20px 24px;
  border-bottom: 1px solid #f3f4f6;
  border-right: 1px solid #f3f4f6;
  align-items: flex-start;
  min-height: 90px;
}

.info-item:nth-child(2n) {
  border-right: none;
}

.info-item:nth-last-child(-n+2) {
  border-bottom: none;
}

.icon {
  width: 52px;
  height: 52px;
  min-width: 52px;
  border-radius: 12px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 22px;
  box-shadow: 0 2px 8px rgba(102, 126, 234, 0.2);
}

.info-content {
  flex: 1;
  min-width: 0;
}

.label {
  font-size: 13px;
  color: #6b7280;
  margin-bottom: 6px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.value {
  font-size: 16px;
  font-weight: 600;
  color: #111827;
  word-wrap: break-word;
  line-height: 1.5;
}

.value.muted {
  color: #4b5563;
  font-weight: 500;
}

.value.price {
  color: #10b981;
  font-size: 18px;
  font-weight: 700;
}

.back-wrap {
  text-align: center;
  margin-top: 32px;
}

.back-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 14px 32px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: #fff;
  border-radius: 999px;
  text-decoration: none;
  font-weight: 600;
  transition: all 0.3s ease;
  box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

.back-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
}

/* Tablet */
@media (max-width: 768px) {
  .page-wrap {
    margin: 20px auto;
    padding: 0 16px;
  }

  .status-bar {
    padding: 14px 20px;
    font-size: 14px;
    border-radius: 10px;
  }

  .info-grid {
    grid-template-columns: 1fr;
  }

  .info-item {
    border-right: none !important;
    padding: 18px 20px;
    min-height: 80px;
  }

  .info-item:last-child {
    border-bottom: none;
  }

  .icon {
    width: 48px;
    height: 48px;
    min-width: 48px;
    font-size: 20px;
  }

  .label {
    font-size: 12px;
  }

  .value {
    font-size: 15px;
  }

  .value.price {
    font-size: 17px;
  }

  .back-btn {
    width: 100%;
    justify-content: center;
    padding: 14px 24px;
  }
}

/* Mobile */
@media (max-width: 480px) {
  .page-wrap {
    padding: 0 12px;
  }

  .status-bar {
    padding: 12px 16px;
    font-size: 13px;
  }

  .info-item {
    padding: 16px;
    gap: 12px;
  }

  .icon {
    width: 44px;
    height: 44px;
    min-width: 44px;
    font-size: 18px;
    border-radius: 10px;
  }

  .label {
    font-size: 11px;
    margin-bottom: 4px;
  }

  .value {
    font-size: 14px;
  }

  .value.price {
    font-size: 16px;
  }

  .back-wrap {
    margin-top: 24px;
  }
}
</style>

<div class="page-wrap">

  <div class="status-bar">
    สถานะ :
    <span>{{ $course->status }}</span>
    &nbsp;|&nbsp;
    รหัสงาน :
    <span>{{ $course->job_code }}</span>
  </div>

  <div class="card">
    <div class="info-grid">

      {{-- เพศ / ระดับ --}}
      <div class="info-item">
        <div class="icon">👤</div>
        <div class="info-content">
          <div class="label">เพศ / ระดับ</div>
          <div class="value">{{ $course->gender ?? '-' }} / {{ $course->level ?? '-' }}</div>
        </div>
      </div>

      {{-- วิชา --}}
      <div class="info-item">
        <div class="icon">📘</div>
        <div class="info-content">
          <div class="label">วิชา</div>
          <div class="value">{{ $course->subject }}</div>
        </div>
      </div>

      {{-- สถานศึกษา --}}
      <div class="info-item">
        <div class="icon">🏫</div>
        <div class="info-content">
          <div class="label">สถานศึกษา</div>
          <div class="value">{{ $course->school ?? '-' }}</div>
        </div>
      </div>

      {{-- วันเรียน --}}
      <div class="info-item">
        <div class="icon">📅</div>
        <div class="info-content">
          <div class="label">วันเรียน</div>
          <div class="value muted">{{ $course->day }} {{ $course->time }}</div>
        </div>
      </div>

      {{-- สถานที่สอน --}}
      <div class="info-item">
        <div class="icon">📍</div>
        <div class="info-content">
          <div class="label">สถานที่สอน</div>
          <div class="value">{{ $course->location }}</div>
        </div>
      </div>

      {{-- การเดินทาง --}}
      <div class="info-item">
        <div class="icon">✋</div>
        <div class="info-content">
          <div class="label">การเดินทาง</div>
          <div class="value muted">{{ $course->transportation ?? '-' }}</div>
        </div>
      </div>

      {{-- อัตราค่าสอน --}}
      <div class="info-item">
        <div class="icon">⏱</div>
        <div class="info-content">
          <div class="label">อัตราค่าสอน</div>
          <div class="value price">{{ $course->rate ? '฿' . number_format($course->rate) . ' / ชม.' : '-' }}</div>
        </div>
      </div>

      {{-- ค่าแนะนำ --}}
      <div class="info-item">
        <div class="icon">👨‍👩‍👧</div>
        <div class="info-content">
          <div class="label">ค่าแนะนำ</div>
          <div class="value price">{{ $course->referral_fee ? '฿' . number_format($course->referral_fee) : '-' }}</div>
        </div>
      </div>

    </div>
  </div>

  <div class="back-wrap">
    <a href="{{ route('tutor.course') }}" class="back-btn">
      ← กลับดูงานสอนทั้งหมด
    </a>
  </div>

</div>

@endsection
