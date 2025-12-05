@extends('Tutor_layout')

@section('title', 'EngBuddy | หาติวเตอร์สอนพิเศษภาษาอังกฤษ หาครูสอนพิเศษ เรียนพิเศษตัวต่อตัว')

@section('content')

  <!-- Banner -->
    <header id="home" class="hero">
        <div class="container hero-inner">
            <div>
                <h1>หาติวเตอร์สอนพิเศษภาษาอังกฤษ</h1>
                <p>งานสอนพิเศษวิชาภาษาอังกฤษ ทั้งกรุงเทพฯ และต่างจังหวัด<br>ร่วมเป็นติวเตอร์คุณภาพ
                    สร้างรายได้เสริมระหว่างเรียนและทำงาน</p>
                <a class="btn" href="/Tutor/register"><span>สมัครคลิกที่นี่</span></a>
            </div>
            <div class="illus" aria-hidden="true"> <img
                      src="{{ asset('images/tutor_teacher.png') }}"
                    alt="นักศึกษาสอนพิเศษภาษาอังกฤษ EngBuddy" class="person"> </div>
    </header>

    <!-- FEATURES -->
    <section class="container">
        <div class="features">
            <article class="feature">
                <div class="ico"><svg width="28" height="28" viewBox="0 0 24 24" fill="none"
                        stroke="#0a7a2a" stroke-width="1.8">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        <path d="M9 12l2 2 4-4" />
                    </svg></div>
                <div>
                    <h3>ปลอดภัย มั่นใจ รายได้ดี</h3>
                    <p>งานคัดสรรพร้อมรายละเอียดชัดเจน ตรวจสอบข้อมูลได้</p>
                </div>
            </article>
            <article class="feature">
                <div class="ico"><svg width="28" height="28" viewBox="0 0 24 24" fill="none"
                        stroke="#0a7a2a" stroke-width="1.8">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 6v6l4 2" />
                    </svg></div>
                <div>
                    <h3>ติวเตอร์มีทีมฯ ช่วยเหลือทันที</h3>
                    <p>ซัพพอร์ต 24 ชม. ผ่าน LINE / โทร</p>
                </div>
            </article>
            <article class="feature">
                <div class="ico"><svg width="28" height="28" viewBox="0 0 24 24" fill="none"
                        stroke="#0a7a2a" stroke-width="1.8">
                        <path d="M21 15a4 4 0 0 1-4 4H7a4 4 0 0 1 0-8h10a4 4 0 0 1 4 4z" />
                        <path d="M7 15v-8a4 4 0 0 1 8 0v8" />
                    </svg></div>
                <div>
                    <h3>คืนเงินภายใน 24 ชม. เมื่อจองถูกยกเลิก</h3>
                    <p>ความเชื่อมั่นและโปร่งใสคือหัวใจของเรา</p>
                </div>
            </article>
        </div>
    </section>

    <!-- JOBS TABLE -->
    <section id="jobs" class="container">
        <div class="card">
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th>วิชา</th>
                        <th>สถานที่สอน</th>
                        <th>วันเรียน</th>
                        <th>รหัสงาน</th>
                    </tr>
                </thead>
                <tbody id="homepage-courses">
                    @forelse($courses as $course)
                    <tr>
                        <td>
                            <strong>{{ $course->subject }}</strong>
                            @if($course->description)
                                {{ $course->description }}
                            @endif
                            @if($course->rate)
                                <div style="color:#0a7a2a;font-weight:bold;margin-top:4px;">฿{{ number_format($course->rate) }} / ชม.</div>
                            @endif
                        </td>
                        <td>{{ $course->location }}</td>
                        <td>{{ $course->day }} {{ $course->time }}</td>
                        <td class="code">
                            {{ $course->job_code }}
                            <span class="pill">{{ $course->status }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align:center;padding:40px;color:#999;">
                            ยังไม่มีงานสอนในขณะนี้
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="seeall"><a class="btn" href="/Tutor/course">ดูงานสอนทั้งหมด</a></div>
    </section>

    <section class="container social-section">
        <p class="social-text">
            เพียงกรอก <a href="/Tutor/register">สมัครติวเตอร์</a> แล้วเลือกงานสอนติดต่อเราที่
        </p>
        <div class="social-buttons">
            <a href="#" class="btn-line">
                <div class="icon">LINE</div>
                <span>@EngBuddy</span>
            </a>
            <a href="#" class="btn-tiktok">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#fff"
                        viewBox="0 0 24 24">
                        <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/>
                    </svg>
                    <span>@EngBuddy</span>
                </div>
            </a>
        </div>
    </section>

@endsection
