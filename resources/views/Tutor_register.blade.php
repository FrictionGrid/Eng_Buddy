@extends('Tutor_layout')

@section('title', 'สมัครติวเตอร์ EngBuddy | สมัครครูสอนพิเศษภาษาอังกฤษ')
@section('meta_description', 'สมัครเป็นติวเตอร์ภาษาอังกฤษกับ EngBuddy แพลตฟอร์มสอนพิเศษภาษาอังกฤษอันดับหนึ่งของไทย รับงานได้ทุกระดับ รายได้ดี สมัครง่าย อนุมัติไว')

@section('content')

<div class="register-page">
  <div class="register-container">

    <header class="register-title">
      <h1>สมัครติวเตอร์ภาษาอังกฤษกับ EngBuddy</h1>
      <p>กรอกข้อมูลให้ครบถ้วนเพื่อเริ่มต้นรับงานสอน</p>
    </header>

    @if($errors->any())
      <div class="error-alert">
        <strong>พบข้อผิดพลาด:</strong>
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('register.submit') }}" enctype="multipart/form-data">
      @csrf

      {{-- 1. ข้อมูลบัญชี --}}
      <div class="register-card">
        <h2>1. ข้อมูลบัญชี</h2>

        <div class="form-row">
          <div class="form-group">
            <label>อีเมล <span class="req">*</span></label>
            <input type="email" name="email" value="{{ old('email') }}" required>
          </div>

          <div class="form-group">
            <label>รหัสผ่าน <span class="req">*</span></label>
            <input type="password" name="password" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>ยืนยันรหัสผ่าน <span class="req">*</span></label>
            <input type="password" name="password_confirmation" required>
          </div>
        </div>
      </div>

      {{-- 2. ข้อมูลส่วนตัว --}}
      <div class="register-card">
        <h2>2. ข้อมูลส่วนตัว</h2>

        <div class="form-row">
          <div class="form-group">
            <label>ชื่อ <span class="req">*</span></label>
            <input type="text" name="first_name" value="{{ old('first_name') }}" required>
          </div>

          <div class="form-group">
            <label>นามสกุล <span class="req">*</span></label>
            <input type="text" name="last_name" value="{{ old('last_name') }}" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>เบอร์โทรศัพท์ <span class="req">*</span></label>
            <input type="tel" name="phone" value="{{ old('phone') }}" required>
          </div>

          <div class="form-group">
            <label>จังหวัด</label>
            <input type="text" name="province" value="{{ old('province') }}">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>เขต/อำเภอ</label>
            <input type="text" name="district" value="{{ old('district') }}">
          </div>

          <div class="form-group">
            <label>รหัสไปรษณีย์</label>
            <input type="text" name="postal_code" value="{{ old('postal_code') }}">
          </div>
        </div>

        <div class="form-group full">
          <label>ที่อยู่</label>
          <textarea name="address">{{ old('address') }}</textarea>
        </div>

        <div class="form-group full">
          <label>รูปบัตรประชาชน <span class="req">*</span></label>
          <input type="file" name="id_card_image" accept="image/*" required>
        </div>

        <div class="form-group full">
          <label>แนะนำตัว</label>
          <textarea name="bio">{{ old('bio') }}</textarea>
        </div>
      </div>

      {{-- 3. วุฒิการศึกษา --}}
      <div class="register-card">
        <h2>3. วุฒิการศึกษา</h2>

        <div class="form-row">
          <div class="form-group">
            <label>ระดับการศึกษา <span class="req">*</span></label>
            <select name="qualifications[0][degree_level]" required>
              <option value="">เลือก...</option>
              <option value="bachelor">ปริญญาตรี</option>
              <option value="master">ปริญญาโท</option>
              <option value="phd">ปริญญาเอก</option>
              <option value="certificate">ประกาศนียบัตร</option>
              <option value="diploma">อนุปริญญา</option>
              <option value="other">อื่นๆ</option>
            </select>
          </div>

          <div class="form-group">
            <label>สาขาวิชา <span class="req">*</span></label>
            <input type="text" name="qualifications[0][field_of_study]" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>สถาบันการศึกษา <span class="req">*</span></label>
            <input type="text" name="qualifications[0][institution]" required>
          </div>

          <div class="form-group">
            <label>GPA <span class="req">*</span></label>
            <input type="number" name="qualifications[0][gpa]" required min="0" max="4" step="0.01">
          </div>
        </div>

      </div>

      {{-- 4. วิชาที่สอนได้ --}}
      <div class="register-card">
        <h2>4. วิชาที่สอนได้</h2>

        <div class="form-row">
          <div class="form-group">
            <label>วิชา <span class="req">*</span></label>
            <input type="text" name="subjects[0][subject_name]" required>
          </div>

          <div class="form-group">
            <label>อัตราค่าสอน (บาท/ชั่วโมง) <span class="req">*</span></label>
            <input type="number" name="subjects[0][hourly_rate]" required min="0" step="0.01">
          </div>
        </div>

        <div class="form-group full">
          <label>รายละเอียดเพิ่มเติม</label>
          <textarea name="subjects[0][description]"></textarea>
        </div>
      </div>

      {{-- 5. ประสบการณ์สอน --}}
      <div class="register-card">
        <h2>5. ประวัติการสอนและการทำงาน</h2>

        <div class="form-group">
          <label>ประสบการณ์สอนจริง <span class="req">*</span></label>
          <div class="radio-group">
            <label><input type="radio" name="has_teaching_experience" value="1" required> มีประสบการณ์</label>
            <label><input type="radio" name="has_teaching_experience" value="0" required> ไม่มีประสบการณ์</label>
          </div>
        </div>

        <div class="form-group">
          <label>จำนวนปีที่มีประสบการณ์สอน</label>
          <input type="number" name="teaching_experience_years" min="0" step="0.5">
        </div>

        <div class="form-group full">
          <label>ประสบการณ์ทำงาน</label>
          <textarea name="work_experience"></textarea>
        </div>

        <div class="form-group full">
          <label>ข้อมูลเพิ่มเติม</label>
          <textarea name="additional_info"></textarea>
        </div>

        <div class="form-group full">
          <label>ข้อตกลง <span class="req">*</span></label>
          <div class="terms-box">
            <label><input type="checkbox" name="accept_terms" value="1" required> ยอมรับข้อกำหนดและเงื่อนไข</label>
            <label><input type="checkbox" name="accept_privacy" value="1" required> ยอมรับนโยบายความเป็นส่วนตัว</label>
          </div>
        </div>
      </div>

      <div class="submit-section">
        <button type="submit" class="submit-btn">ส่งใบสมัคร</button>
      </div>

    </form>

  </div>
</div>

<script>
// Auto-refresh CSRF token every 5 minutes to prevent expiration
setInterval(function() {
    fetch('{{ route("register") }}')
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newToken = doc.querySelector('input[name="_token"]').value;
            document.querySelector('input[name="_token"]').value = newToken;
            console.log('CSRF token refreshed');
        })
        .catch(error => console.error('Failed to refresh CSRF token:', error));
}, 5 * 60 * 1000); // 5 minutes

// Show loading state on submit
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    form.addEventListener('submit', function() {
        const submitBtn = form.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.textContent = 'กำลังส่งข้อมูล...';
    });
});
</script>

@endsection
