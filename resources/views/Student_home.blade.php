@extends('student_layout')

@section('title', 'EngBuddy | หาติวเตอร์สอนพิเศษภาษาอังกฤษ หาครูสอนพิเศษ เรียนพิเศษตัวต่อตัว')

@section('content')

  <!-- Banner -->
    <header id="home" class="hero">
        <div class="container hero-inner">
            <div>
                 <h1>ทำไมต้องเรียนพิเศษกับ EngBuddy?</h1>
                    <p>เพราะเราคือแพลตฟอร์มสอนพิเศษที่รวมติวเตอร์คุณภาพจากมหาวิทยาลัยชั้นนำทั่วประเทศ 
       คัดเลือกอย่างละเอียดเพื่อให้ตรงกับความต้องการของผู้เรียนมากที่สุด </p>
            </div>
            <div class="illus" aria-hidden="true"> <img
                      src="{{ asset('images/tutor_teacher.png') }}"
                    alt="นักศึกษาสอนพิเศษภาษาอังกฤษ EngBuddy" class="person"> </div>
    </header>




<!-- ===================== FEATURES ===================== -->
<section class="features">
  <div class="container">
    <h2>เรียนพิเศษตัวต่อตัวกับ EngBuddy ดียังไง?</h2>
    <div class="grid">
      <div class="card"><img src="{{ asset('icons/personal.svg') }}"><h4>เรียนตัวต่อตัว</h4><p>เข้าใจง่าย ถามได้ตลอดเวลา</p></div>
      <div class="card"><img src="{{ asset('icons/schedule.svg') }}"><h4>เลือกเวลาเรียนได้</h4><p>ยืดหยุ่นตามตารางของคุณ</p></div>
      <div class="card"><img src="{{ asset('icons/tutor.svg') }}"><h4>ติวเตอร์มีคุณภาพ</h4><p>ผ่านการคัดเลือกอย่างเข้มงวด</p></div>
      <div class="card"><img src="{{ asset('icons/pay.svg') }}"><h4>จ่ายเป็นรายครั้ง</h4><p>โปร่งใส ไม่บังคับคอร์ส</p></div>
      <div class="card"><img src="{{ asset('icons/apply.svg') }}"><h4>สมัครเรียนง่าย</h4><p>เพียงแอดไลน์และกรอกรายละเอียด</p></div>
    </div>
  </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<section class="reviews">
  <div class="container">
    <h2>เสียงจากผู้เรียน EngBuddy</h2>
    <div class="review-scroll">
      <img src="{{ asset('images/review1.png') }}">
      <img src="{{ asset('images/review2.png') }}">
      <img src="{{ asset('images/review3.png') }}">
      <img src="{{ asset('images/review4.png') }}">
    </div>
  </div>
</section>



<!-- ===================== PRICE ===================== -->
<section class="pricing">
  <div class="container">
    <h2>อัตราค่าเรียนพิเศษตัวต่อตัว</h2>
    <table>
      <thead><tr><th>ระดับชั้น</th><th>เริ่มต้น (บาท/ชม.)</th></tr></thead>
      <tbody>
        <tr><td>อนุบาล</td><td>150</td></tr>
        <tr><td>ประถม</td><td>200</td></tr>
        <tr><td>มัธยมต้น</td><td>225</td></tr>
        <tr><td>มัธยมปลาย</td><td>250</td></tr>
        <tr><td>มหาวิทยาลัย</td><td>300</td></tr>
      </tbody>
    </table>
  </div>
</section>

<!-- ===================== CONTACT ===================== -->
<section class="contact" id="contact">
  <div class="container">
    <h2>วิธีการสมัครเรียนกับ EngBuddy</h2>
    <div class="contact-box">
      <img src="{{ asset('images/line_qr_sample.png') }}" alt="QR Line EngBuddy" style="width: 250px; height: 250px; border: 3px solid #06C755; border-radius: 15px; padding: 10px; background: white;">
      <div class="steps">
        <p><strong>①</strong> สมัครเรียนผ่าน LINE ID : <span>@EngBuddy</span></p>
        <p><strong>②</strong> แจ้งรายวิชาที่ต้องการเรียนและยืนยันข้อมูล</p>
        <p><strong>③</strong> เจ้าหน้าที่คัดเลือกและเสนอครูผู้สอนให้คุณ</p>
        <p><strong>④</strong> ครูติดต่อกลับเพื่อเริ่มเรียน</p>
        <a href="#" class="btn outline">เงื่อนไขการสมัครเรียน</a>
      </div>
    </div>
  </div>
</section>

@endsection
