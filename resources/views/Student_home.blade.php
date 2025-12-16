@extends('Student_layout')

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
 
  <div class="container">
    <h2>เสียงจากผู้เรียน EngBuddy</h2>
    <div class="carousel-wrapper">
      <button class="carousel-btn carousel-btn-prev" aria-label="Previous">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
      </button>
      <div class="carousel-container">
        <div class="carousel-track">
          <div class="carousel-slide"><img src="{{ asset('/images/line.jpg') }}" alt="Review 1"></div>
          <div class="carousel-slide"><img src="{{ asset('/images/line.jpg') }}" alt="Review 2"></div>
          <div class="carousel-slide"><img src="{{ asset('/images/line.jpg') }}" alt="Review 3"></div>
          <div class="carousel-slide"><img src="{{ asset('/images/line.jpg') }}" alt="Review 4"></div>
        </div>
      </div>
      <button class="carousel-btn carousel-btn-next" aria-label="Next">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="9 18 15 12 9 6"></polyline>
        </svg>
      </button>
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
        <tr><td>อนุบาล</td><td>180</td></tr>
        <tr><td>ประถม</td><td>220</td></tr>
        <tr><td>มัธยมต้น</td><td>250</td></tr>
        <tr><td>มัธยมปลาย</td><td>300</td></tr>
        <tr><td>มหาวิทยาลัย</td><td>350</td></tr>
      </tbody>
    </table>
  </div>
</section>

<!-- ===================== CONTACT ===================== -->
<section class="contact" id="contact">
  <div class="container">
    <h2>วิธีการสมัครเรียนกับ EngBuddy</h2>
    <p class="contact-subtitle">เริ่มต้นเรียนพิเศษภาษาอังกฤษกับเราได้ง่ายๆ ใน 4 ขั้นตอน</p>

    <div class="contact-layout">
      <!-- QR Code Section -->
      <div class="qr-section">
        <div class="qr-card">
          <div class="qr-header">
        
          </div>
          <img src="{{ asset('images/line_qr_sample.png') }}" alt="QR Line EngBuddy" class="qr-image">
  
        </div>
      </div>

      <!-- Steps Section -->
      <div class="steps-section">
        <div class="step-card">
          <div class="step-number">1</div>
          <div class="step-content">
            <h4>เพิ่มเพื่อนผ่าน LINE</h4>
            <p>สแกน QR Code หรือค้นหา LINE ID: <strong>@EngBuddy</strong></p>
             <p>หรือติดต่อเบอร์ 0618255910 </p>
            
            
          </div>
        </div>

        <div class="step-card">
          <div class="step-number">2</div>
          <div class="step-content">
            <h4>แจ้งความต้องการ</h4>
            <p>บอกรายวิชาที่ต้องการเรียน ระดับชั้น และเวลาที่สะดวก</p>
          </div>
        </div>

        <div class="step-card">
          <div class="step-number">3</div>
          <div class="step-content">
            <h4>รอการจับคู่ครู</h4>
            <p>เจ้าหน้าที่คัดเลือกและเสนอครูผู้สอนที่เหมาะสมให้คุณ</p>
          </div>
        </div>

        <div class="step-card">
          <div class="step-number">4</div>
          <div class="step-content">
            <h4>เริ่มเรียนได้เลย</h4>
            <p>ครูติดต่อกลับและนัดหมายเวลาเพื่อเริ่มการเรียน</p>
          </div>
        </div>
      </div>
    </div>


  </div>
</section>

@endsection
