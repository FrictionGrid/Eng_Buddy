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
            <small>ต้องมีอย่างน้อย 8 ตัวอักษร (ประกอบด้วย ตัวพิมพ์ใหญ่ ตัวพิมพ์เล็ก ตัวเลข และสัญลักษณ์พิเศษ เช่น @#$_!)</small>
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
            <input type="file" name="id_card_image" id="id_card_image" accept="image/*" required onchange="previewImage(this)">
            <small>ไฟล์รูปไม่เกิน 2MB (รองรับ JPG, PNG)</small>
            <div id="image-preview" style="display: none; margin-top: 10px;">
              <img id="preview-img" src="" alt="Preview" style="max-width: 300px; max-height: 200px; border: 1px solid #ddd; border-radius: 4px; padding: 5px;">
              <p id="file-name" style="margin-top: 5px; font-size: 12px; color: #666;"></p>
            </div>
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
          @php
            $oldQualifications = old('qualifications', [[]]);
          @endphp

          @foreach($oldQualifications as $index => $qualification)
          <div class="dynamic-item qualification-item">
            @if($index > 0)
              <button type="button" class="remove-btn" onclick="this.parentElement.remove()">ลบ</button>
            @endif

            <div class="form-row">
              <div class="form-group">
                <label>ระดับการศึกษา <span class="req">*</span></label>
                <select name="qualifications[{{ $index }}][degree_level]" required>
                  <option value="">เลือก...</option>
                  <option value="bachelor" {{ old("qualifications.$index.degree_level") == 'bachelor' ? 'selected' : '' }}>ปริญญาตรี</option>
                  <option value="master" {{ old("qualifications.$index.degree_level") == 'master' ? 'selected' : '' }}>ปริญญาโท</option>
                  <option value="phd" {{ old("qualifications.$index.degree_level") == 'phd' ? 'selected' : '' }}>ปริญญาเอก</option>
                  <option value="certificate" {{ old("qualifications.$index.degree_level") == 'certificate' ? 'selected' : '' }}>ประกาศนียบัตร</option>
                  <option value="diploma" {{ old("qualifications.$index.degree_level") == 'diploma' ? 'selected' : '' }}>อนุปริญญา</option>
                  <option value="other" {{ old("qualifications.$index.degree_level") == 'other' ? 'selected' : '' }}>อื่นๆ</option>
                </select>
              </div>

              <div class="form-group">
                <label>สาขาวิชา <span class="req">*</span></label>
                <input type="text" name="qualifications[{{ $index }}][field_of_study]" value="{{ old("qualifications.$index.field_of_study") }}" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label>สถาบันการศึกษา <span class="req">*</span></label>
                <input type="text" name="qualifications[{{ $index }}][institution]" value="{{ old("qualifications.$index.institution") }}" required>
              </div>

              <div class="form-group">
                <label>GPA <span class="req">*</span></label>
                <input type="number" name="qualifications[{{ $index }}][gpa]" value="{{ old("qualifications.$index.gpa") }}" min="0" max="4" step="0.01"  required>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <button type="button" class="add-btn" onclick="addQualification()">+ เพิ่มวุฒิการศึกษา</button>
      </div>

      <div class="register-card">
        <h2>4. วิชาที่สอนได้</h2>

        <div id="subjects-container">
          @php
            $oldSubjects = old('subjects', [[]]);
          @endphp

          @foreach($oldSubjects as $index => $subject)
          <div class="dynamic-item subject-item">
            @if($index > 0)
              <button type="button" class="remove-btn" onclick="this.parentElement.remove()">ลบ</button>
            @endif

            <div class="form-row">
              <div class="form-group">
                <label>วิชา <span class="req">*</span></label>
                <input type="text" name="subjects[{{ $index }}][subject_name]" value="{{ old("subjects.$index.subject_name") }}" placeholder="เช่น ภาษาอังกฤษพื้นฐาน, IELTS, TOEIC" required>
              </div>

              <div class="form-group">
                <label>อัตราค่าสอน (บาท/ชั่วโมง) <span class="req">*</span></label>
                <input type="number" name="subjects[{{ $index }}][hourly_rate]" value="{{ old("subjects.$index.hourly_rate") }}" min="0" step="0.01" required>
              </div>
            </div>

            <div class="form-group full">
              <label>รายละเอียดเพิ่มเติม</label>
              <textarea name="subjects[{{ $index }}][description]">{{ old("subjects.$index.description") }}</textarea>
            </div>
          </div>
          @endforeach
        </div>

        <button type="button" class="add-btn" onclick="addSubject()">+ เพิ่มวิชาที่สอน</button>
      </div>

      <div class="register-card">
        <h2>5. ประวัติการสอนและการทำงาน</h2>

        <div class="form-group">
          <label>ประสบการณ์สอนจริง <span class="req">*</span></label>
          <div class="radio-group">
            <label><input type="radio" name="has_teaching_experience" value="1" {{ old('has_teaching_experience') == '1' ? 'checked' : '' }} required> มีประสบการณ์</label>
            <label><input type="radio" name="has_teaching_experience" value="0" {{ old('has_teaching_experience') == '0' ? 'checked' : '' }} required> ไม่มีประสบการณ์</label>
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
            <label><input type="checkbox" name="accept_terms" value="1" {{ old('accept_terms') ? 'checked' : '' }} required> ยอมรับ <a href="{{ route('terms') }}" target="_blank">ข้อกำหนดและเงื่อนไข</a></label>
            <label><input type="checkbox" name="accept_privacy" value="1" {{ old('accept_privacy') ? 'checked' : '' }} required> ยอมรับ <a href="{{ route('privacy') }}" target="_blank">นโยบายความเป็นส่วนตัว</a></label>
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
// Initialize counts from existing items (from old() data)
let qualificationCount = document.querySelectorAll('.qualification-item').length;
let subjectCount = document.querySelectorAll('.subject-item').length;

// Image Preview Function
function previewImage(input) {
  const preview = document.getElementById('image-preview');
  const previewImg = document.getElementById('preview-img');
  const fileName = document.getElementById('file-name');

  if (input.files && input.files[0]) {
    const file = input.files[0];

    // Check file size (2MB = 2 * 1024 * 1024 bytes)
    if (file.size > 2 * 1024 * 1024) {
      alert('ไฟล์รูปต้องมีขนาดไม่เกิน 2MB');
      input.value = '';
      preview.style.display = 'none';
      return;
    }

    const reader = new FileReader();
    reader.onload = function(e) {
      previewImg.src = e.target.result;
      fileName.textContent = '📎 ' + file.name + ' (' + (file.size / 1024).toFixed(2) + ' KB)';
      preview.style.display = 'block';

      // Save file name to localStorage for reference
      localStorage.setItem('tutor_register_id_card_name', file.name);
    };
    reader.readAsDataURL(file);
  }
}

// Add Qualification Function
function addQualification() {
  const container = document.getElementById('qualifications-container');
  const item = document.createElement('div');
  item.className = 'dynamic-item qualification-item';

  item.innerHTML = `
    <button type="button" class="remove-btn" onclick="this.parentElement.remove(); saveFormData();">ลบ</button>

    <div class="form-row">
      <div class="form-group">
        <label>ระดับการศึกษา <span class="req">*</span></label>
        <select name="qualifications[${qualificationCount}][degree_level]" required onchange="saveFormData()">
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
        <input type="text" name="qualifications[${qualificationCount}][field_of_study]" required oninput="saveFormData()">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group">
        <label>สถาบันการศึกษา <span class="req">*</span></label>
        <input type="text" name="qualifications[${qualificationCount}][institution]" required oninput="saveFormData()">
      </div>

      <div class="form-group">
        <label>GPA <span class="req">*</span></label>
        <input type="number" name="qualifications[${qualificationCount}][gpa]" min="0" max="4" step="0.01" placeholder="เช่น 3.5 หรือ 3.50" required oninput="saveFormData()">
      </div>
    </div>
  `;

  container.appendChild(item);
  qualificationCount++;
  saveFormData();
}

// Add Subject Function
function addSubject() {
  const container = document.getElementById('subjects-container');
  const item = document.createElement('div');
  item.className = 'dynamic-item subject-item';

  item.innerHTML = `
    <button type="button" class="remove-btn" onclick="this.parentElement.remove(); saveFormData();">ลบ</button>

    <div class="form-row">
      <div class="form-group">
        <label>วิชา <span class="req">*</span></label>
        <input type="text" name="subjects[${subjectCount}][subject_name]" placeholder="เช่น ภาษาอังกฤษพื้นฐาน, IELTS, TOEIC" required oninput="saveFormData()">
      </div>

      <div class="form-group">
        <label>อัตราค่าสอน (บาท/ชั่วโมง) <span class="req">*</span></label>
        <input type="number" name="subjects[${subjectCount}][hourly_rate]" min="0" step="0.01" required oninput="saveFormData()">
      </div>
    </div>

    <div class="form-group full">
      <label>รายละเอียดเพิ่มเติม</label>
      <textarea name="subjects[${subjectCount}][description]" oninput="saveFormData()"></textarea>
    </div>
  `;

  container.appendChild(item);
  subjectCount++;
  saveFormData();
}

// Auto-save to localStorage
function saveFormData() {
  const form = document.querySelector('form');
  const formData = new FormData(form);
  const data = {};

  for (let [key, value] of formData.entries()) {
    // Don't save passwords or file
    if (key === 'password' || key === 'password_confirmation' || key === 'id_card_image') {
      continue;
    }
    data[key] = value;
  }

  localStorage.setItem('tutor_register_draft', JSON.stringify(data));

  // Show save indicator
  const saveIndicator = document.getElementById('save-indicator');
  if (saveIndicator) {
    saveIndicator.textContent = '✓ บันทึกอัตโนมัติแล้ว';
    saveIndicator.style.color = '#4CAF50';
    setTimeout(() => {
      saveIndicator.textContent = '';
    }, 2000);
  }
}

// Restore from localStorage on page load
function restoreFormData() {
  // Only restore if there's no old() data (no validation errors)
  const hasOldData = {{ old('email') ? 'true' : 'false' }};
  if (hasOldData) {
    return; // Don't restore from localStorage if we have old() data
  }

  const savedData = localStorage.getItem('tutor_register_draft');
  if (!savedData) return;

  try {
    const data = JSON.parse(savedData);
    const form = document.querySelector('form');

    for (let [key, value] of Object.entries(data)) {
      const input = form.querySelector(`[name="${key}"]`);
      if (input) {
        if (input.type === 'checkbox' || input.type === 'radio') {
          if (input.value === value) {
            input.checked = true;
          }
        } else {
          input.value = value;
        }
      }
    }
  } catch (e) {
    console.error('Error restoring form data:', e);
  }
}

// Clear localStorage after successful submission
function clearFormData() {
  localStorage.removeItem('tutor_register_draft');
  localStorage.removeItem('tutor_register_id_card_name');
}

// Auto-save on input change
document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('form');

  // Restore data on load
  restoreFormData();

  // Check if there's a saved file name
  const savedFileName = localStorage.getItem('tutor_register_id_card_name');
  if (savedFileName) {
    const fileName = document.getElementById('file-name');
    if (fileName) {
      fileName.textContent = '⚠️ กรุณาเลือกไฟล์ใหม่: ' + savedFileName;
      document.getElementById('image-preview').style.display = 'block';
    }
  }

  // Add auto-save to all inputs
  const inputs = form.querySelectorAll('input:not([type="password"]):not([type="file"]), textarea, select');
  inputs.forEach(input => {
    input.addEventListener('input', saveFormData);
    input.addEventListener('change', saveFormData);
  });

  // Clear localStorage on successful submission
  form.addEventListener('submit', function(e) {
    // We'll clear it after successful submission
    // For now, just show loading state
    const submitBtn = form.querySelector('button[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.textContent = '⏳ กำลังส่งข้อมูล...';
  });
});
</script>

<!-- Add save indicator -->
<div id="save-indicator" style="position: fixed; bottom: 20px; right: 20px; background: white; padding: 10px 20px; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); font-size: 14px;"></div>

@endsection
