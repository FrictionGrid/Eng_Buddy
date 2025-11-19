@extends('Tutor_layout')

@section('title', 'สมัครติวเตอร์ EngBuddy | สมัครครูสอนพิเศษภาษาอังกฤษ')

@section('meta_description', 'สมัครเป็นติวเตอร์ภาษาอังกฤษกับ EngBuddy แพลตฟอร์มสอนพิเศษภาษาอังกฤษอันดับหนึ่งของไทย รับงานได้ทุกระดับ รายได้ดี สมัครง่าย อนุมัติไว')

@section('content')

<div class="register-page">
  <div class="register-container">

    <!-- TITLE -->
    <header class="register-title">
      <h1>สมัครติวเตอร์ภาษาอังกฤษกับ EngBuddy</h1>
      <p>กรอกข้อมูลให้ครบถ้วนเพื่อเริ่มต้นรับงานสอน</p>
    </header>

    <!-- ERROR -->
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
            <small>ต้องมีอย่างน้อย 8 ตัวอักษร</small>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>ยืนยันรหัสผ่าน <span class="req">*</span></label>
            <input type="password" name="password_confirmation" required>
          </div>
        </div>
      </div>


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

        <div class="form-row">
          <div class="form-group">
            <label>รูปบัตรประชาชน <span class="req">*</span></label>
            <input type="file" name="id_card_image" accept="image/*" required>
            <small>ไฟล์รูปไม่เกิน 2MB (รองรับ JPG, PNG)</small>
          </div>
        </div>

        <div class="form-group full">
          <label>แนะนำตัว</label>
          <textarea name="bio" >{{ old('bio') }}</textarea>
        </div>
      </div>


      <div class="register-card">
        <h2>3. วุฒิการศึกษา</h2>

        <div id="qualifications-container">
          <div class="dynamic-item qualification-item">
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
                <input type="text" name="qualifications[0][gpa]" pattern="[0-4]\.\d{2}" placeholder="0.00" inputmode="decimal" required>
              </div>
            </div>
          </div>
        </div>

        <button type="button" class="add-btn" onclick="addQualification()">+ เพิ่มวุฒิการศึกษา</button>
      </div>

      <div class="register-card">
        <h2>4. วิชาที่สอนได้</h2>

        <div id="subjects-container">
          <div class="dynamic-item subject-item">
            <div class="form-row">
              <div class="form-group">
                <label>วิชา <span class="req">*</span></label>
                <input type="text" name="subjects[0][subject_name]"  required>
              </div>

              <div class="form-group">
                <label>อัตราค่าสอน (บาท/ชั่วโมง) <span class="req">*</span></label>
                <input type="number" name="subjects[0][hourly_rate]" min="0" step="0.01" required>
              </div>
            </div>

            <div class="form-group full">
              <label>รายละเอียดเพิ่มเติม</label>
              <textarea name="subjects[0][description]"></textarea>
            </div>
          </div>
        </div>

        <button type="button" class="add-btn" onclick="addSubject()">+ เพิ่มวิชาที่สอน</button>
      </div>

      <div class="register-card">
        <h2>5. ประวัติการสอนและการทำงาน</h2>

        <div class="form-group">
          <label>ประสบการณ์สอนจริง <span class="req">*</span></label>
          <div class="radio-group">
            <label><input type="radio" name="has_teaching_experience" value="1" required> มีประสบการณ์</label>
            <label><input type="radio" name="has_teaching_experience" value="0" required> ไม่มีประสบการณ์</label>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>จำนวนปีที่มีประสบการณ์สอน</label>
            <input type="number" name="teaching_experience_years" value="{{ old('teaching_experience_years', 0) }}" min="0" step="0.5" placeholder="เช่น 2.5">
            <small>ถ้าไม่มีประสบการณ์ให้ใส่ 0</small>
          </div>
        </div>

        <div class="form-group full">
          <label>ประสบการณ์ทำงาน</label>
          <textarea name="work_experience" rows="4" >{{ old('work_experience') }}</textarea>
        </div>

        <div class="form-group full">
          <label>ข้อมูลเพิ่มเติม</label>
          <textarea name="additional_info" rows="3" >{{ old('additional_info') }}</textarea>
        </div>

        <div class="form-group full">
          <label>ข้อตกลง <span class="req">*</span></label>
          <div class="terms-box">
            <label><input type="checkbox" name="accept_terms" value="1" required> ยอมรับ <a href="{{ route('terms') }}" target="_blank">ข้อกำหนดและเงื่อนไข</a></label>
            <label><input type="checkbox" name="accept_privacy" value="1" required> ยอมรับ <a href="{{ route('privacy') }}" target="_blank">นโยบายความเป็นส่วนตัว</a></label>
          </div>
        </div>
      </div>

      <div class="submit-section">
        <button type="submit" class="submit-btn">ส่งใบสมัคร</button>
        <p class="login-redirect">มีบัญชีอยู่แล้ว? <a href="{{ route('login') }}">เข้าสู่ระบบ</a></p>
      </div>
    </form>
  </div>
</div>

<script>
let qualificationCount = 1;
let subjectCount = 1;

function addQualification() {
  const container = document.getElementById('qualifications-container');
  const item = document.createElement('div');
  item.className = 'dynamic-item qualification-item';

  item.innerHTML = `
    <button type="button" class="remove-btn" onclick="this.parentElement.remove()">ลบ</button>

    <div class="form-row">
      <div class="form-group">
        <label>ระดับการศึกษา <span class="req">*</span></label>
        <select name="qualifications[${qualificationCount}][degree_level]" required>
          <option value="">เลือก...</option>
          <option value="bachelor">ปริญญาตรี</option>
          <option value="master">ปริญญาโท</option>
          <option value="phd">ปริญญาเอก</option>
          <option value="certificate">ประกาศนียบัตร</option>
          <option value="diploma">อนุปริญญา</option>
        </select>
      </div>

      <div class="form-group">
        <label>สาขาวิชา <span class="req">*</span></label>
        <input type="text" name="qualifications[${qualificationCount}][field_of_study]" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group">
        <label>สถาบันการศึกษา <span class="req">*</span></label>
        <input type="text" name="qualifications[${qualificationCount}][institution]" required>
      </div>

      <div class="form-group">
        <label>GPA <span class="req">*</span></label>
        <input type="text" name="qualifications[${qualificationCount}][gpa]" pattern="[0-4]\\.\\d{2}" placeholder="0.00" inputmode="decimal" required>
        <small>รูปแบบ: x.xx (เช่น 3.50)</small>
      </div>
    </div>
  `;

  container.appendChild(item);
  qualificationCount++;
}

function addSubject() {
  const container = document.getElementById('subjects-container');
  const item = document.createElement('div');
  item.className = 'dynamic-item subject-item';

  item.innerHTML = `
    <button type="button" class="remove-btn" onclick="this.parentElement.remove()">ลบ</button>

    <div class="form-row">
      <div class="form-group">
        <label>วิชา <span class="req">*</span></label>
        <input type="text" name="subjects[${subjectCount}][subject_name]" placeholder="เช่น ภาษาอังกฤษพื้นฐาน, IELTS, TOEIC" required>
      </div>

      <div class="form-group">
        <label>อัตราค่าสอน (บาท/ชั่วโมง) <span class="req">*</span></label>
        <input type="number" name="subjects[${subjectCount}][hourly_rate]" min="0" step="0.01" required>
      </div>
    </div>

    <div class="form-group full">
      <label>รายละเอียดเพิ่มเติม</label>
      <textarea name="subjects[${subjectCount}][description]"></textarea>
    </div>
  `;

  container.appendChild(item);
  subjectCount++;
}
</script>

@endsection
