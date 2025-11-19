<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'EngBuddy | หาติวเตอร์ภาษาอังกฤษตัวต่อตัวและออนไลน์ทั่วไทย')</title>
    <meta name="description" content="@yield('meta_description', 'แพลตฟอร์มหาติวเตอร์ภาษาอังกฤษตัวต่อตัวและออนไลน์ทั่วไทย คัดติวเตอร์คุณภาพ ครูผู้เชี่ยวชาญทุกระดับ สะดวก ปลอดภัย และเชื่อถือได้')">
    <meta name="keywords" content="@yield('meta_keywords', 'ติวเตอร์ภาษาอังกฤษ, สอนภาษาอังกฤษ, ครูสอนพิเศษ, เรียนพิเศษอังกฤษ, ติวอังกฤษ, TOEIC, IELTS, Grammar')">
    <meta name="author" content="@yield('meta_author', 'EngBuddy Team')">
    <meta name="robots" content="@yield('meta_robots', 'index, follow')">

    <link rel="canonical" href="@yield('canonical_url', url()->current())">

    @stack('seo_schema')

    <link rel="stylesheet" href="{{ asset('css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Tutor_layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Student_main.css') }}">

 
</head>

<body>

    <div class="topbar" role="navigation" aria-label="Primary navigation">
        <div class="container nav">

          
            <div class="brand">
                <div class="logo">EE</div>
                <div>
                    <div class="tagline">We are all experts</div>
                    <div class="brand-text">EngBuddy</div>
                </div>
            </div>

            <nav class="menu">

            
                <div class="tabs">
                <a class="tab" href="/student/home">หน้าแรก</a>
                    <a class="tab" href="/student/course">หลักสูตร</a>
                    <a class="tab" href="/student/apply">ขั้นตอนการสมัคร</a>
                    <a class="tab" href="/student/articles">บทความ</a>
                    <a class="tab" href="/student/promotion">โปรโมชั่น</a>
                </div>

        
                <a class="login" href="/Tutor/home">สำหรับติวเตอร์</a>


            </nav>
        </div>
    </div>

    @yield('content')


    <footer>
        <div class="container foot">
            <div>
                <div style="display:flex;align-items:center;gap:12px;">
                    <div class="footer-logo">EE</div>
                    <div>
                        <div class="brand-texttwo">EngBuddy</div>
                        <div style="color:#b6c6ea;font-size:14px;">We are all experts</div>
                    </div>
                </div>

                <p class="footer-desc">
                    แพลตฟอร์มรวมงานสอนพิเศษภาษาอังกฤษ ตัวต่อตัวและออนไลน์ คัดติวเตอร์คุณภาพทั่วไทย
                </p>
            </div>

            <div>
                <h4>ข้อมูลเว็บไซต์</h4>
                <ul>
                    <li><a href="/student/home">เกี่ยวกับเรา</a></li>
                    <li><a href="/Tutor/course">หลักสูตร</a></li>
                    <li><a href="/student/apply">ติดต่อเรา</a></li>
                </ul>
            </div>

            <div>
                <h4>ช่องทางการติดต่อ</h4>
                <ul>
                    <li>Number: 0618255910</li>
                    <li>LINE: <a href="#">@EngBuddy</a></li>
                    <li>Facebook: <a href="#">EngBuddy</a></li>
                </ul>
            </div>
        </div>

        <div class="copyright">
            © {{ date('Y') }} EngBuddy
        </div>
    </footer>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const dropdown = document.querySelector('.dropdown');
    const button = document.querySelector('.dropbtn');

    button.addEventListener('click', function (e) {
        e.stopPropagation();
        dropdown.classList.toggle('show');
    });

    // กดนอก dropdown → ปิดหมด
    document.addEventListener('click', function () {
        dropdown.classList.remove('show');
    });
});
</script>

</body>
</html>
