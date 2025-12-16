@extends('Student_layout')

@section('title', 'EngBuddy | หาติวเตอร์สอนพิเศษภาษาอังกฤษ หาครูสอนพิเศษ เรียนพิเศษตัวต่อตัว')

@section('content')
 <h2 class="banner">ขั้นตอนการหาติวเตอร์</h2>
  <section class="student-section student-contact">
   
    <p><strong>1. ติดต่อทีมงาน EngBuddy โดยตรง</strong></p>
    <p>
          เบอร์โทร  :
      0618255910 <br>
      Facebook :
      <a href="https://facebook.com/" target="_blank">facebook.com/</a><br>
      Line ID :
      <a href="#">@EngBuddy</a>
    </p>
    <img src="{{ asset('images/line_qr_sample.png') }}" alt="QR Code EngBuddy" class="student-qr" style="width: 250px; height: 250px; border: 3px solid #06C755; border-radius: 15px; padding: 10px; background: white; display: block; margin: 20px auto;">
  </section>

  <section class="student-section student-form-wrap">
    <p><strong>2. กรอกรายละเอียดด้านล่าง ทางสถาบันจะติดต่อกลับภายใน 12 ชั่วโมง</strong></p>

    @if(session('success'))
      <div class="alert alert-success">
        <div>
          <strong style="font-size: 18px; display: block; margin-bottom: 4px;">ส่งข้อมูลสำเร็จ!</strong>
          {{ session('success') }}
        </div>
      </div>
    @endif

    @if($errors->any())
      <div class="alert alert-error">
        <div>
          <strong style="font-size: 18px; display: block; margin-bottom: 4px;">พบข้อผิดพลาด</strong>
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    @endif

    <form class="student-form" method="POST" action="{{ route('student.apply.store') }}">
      @csrf

      <div class="student-form-row">
        <label>ชื่อ-นามสกุล<span class="req">*</span></label>
        <input type="text" name="full_name" placeholder="กรอกชื่อ-นามสกุล" value="{{ old('full_name') }}" required>
      </div>

      <div class="student-form-row">
        <label>LINE ID<span class="req"></span></label>
        <input type="text" name="line_id" placeholder="กรอก LINE ID (ถ้ามี)" value="{{ old('line_id') }}">
      </div>

      <div class="student-form-row">
        <label>โทรศัพท์<span class="req">*</span></label>
        <input type="tel" name="phone" placeholder="กรอกเบอร์โทรศัพท์" value="{{ old('phone') }}" required>
      </div>

      <div class="student-form-row">
        <label>เพศติวเตอร์<span class="req">*</span></label>
        <select name="tutor_gender" required>
          <option value="">-- เลือกเพศติวเตอร์ --</option>
          <option value="ชาย" {{ old('tutor_gender') == 'ชาย' ? 'selected' : '' }}>ชาย</option>
          <option value="หญิง" {{ old('tutor_gender') == 'หญิง' ? 'selected' : '' }}>หญิง</option>
          <option value="ไม่จำกัด" {{ old('tutor_gender') == 'ไม่จำกัด' ? 'selected' : '' }}>ไม่จำกัด</option>
        </select>
      </div>

      <button type="submit" class="student-btn">ส่งข้อความ</button>
    </form>
  </section>
@endsection








