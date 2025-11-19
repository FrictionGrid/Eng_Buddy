@extends('student_layout')

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

    <form class="student-form">
      <div class="student-form-row">
        <label>ชื่อ-นามสกุล<span class="req">*</span></label>
        <input type="text" placeholder="กรอกชื่อ-นามสกุล">
      </div>

      <div class="student-form-row">
        <label>อีเมล<span class="req">*</span></label>
        <input type="email" placeholder="กรอกอีเมล">
      </div>

      <div class="student-form-row">
        <label>โทรศัพท์<span class="req">*</span></label>
        <input type="tel" placeholder="กรอกเบอร์โทรศัพท์">
      </div>

      <div class="student-form-row">
        <label>วิชาที่ต้องการหาติวเตอร์<span class="req">*</span></label>
        <input type="text" placeholder="เช่น grammar Toeic">
      </div>

      <div class="student-form-row">
        <label>เพศติวเตอร์<span class="req">*</span></label>
        <select>
          <option>-- เลือกเพศติวเตอร์ --</option>
          <option>ชาย</option>
          <option>หญิง</option>
          <option>ไม่จำกัด</option>
        </select>
      </div>

      <button type="submit" class="student-btn">ส่งข้อความ</button>
    </form>
  </section>
@endsection








