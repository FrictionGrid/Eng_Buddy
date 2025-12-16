<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'EngBuddy | หาติวเตอร์ภาษาอังกฤษตัวต่อตัวและออนไลน์ทั่วไทย')</title>
    <meta name="description" content="@yield('meta_description', 'แพลตฟอร์มหาติวเตอร์ภาษาอังกฤษตัวต่อตัวและออนไลน์ทั่วไทย คัดติวเตอร์คุณภาพ ครูผู้เชี่ยวชาญทุกระดับ สะดวก ปลอดภัย และเชื่อถือได้')">
    <meta name="author" content="EngBuddy - English Tutor Platform Thailand">
    <meta name="robots" content="index, follow">

    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="stylesheet" href="{{ asset('css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Tutor_layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Tutor_main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">


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
                    <a class="tab" href="/Tutor/home">หน้าแรก</a>
                    <a class="tab" href="/Tutor/course">งานสอนพิเศษทั้งหมด</a>
                    <a class="tab" href="/Tutor/apply">ขั้นตอนการรับงาน</a>
                    <a class="tab" href="/Tutor/register">สมัครติวเตอร์</a>

                    @guest
                        <a class="tab" href="/Tutor/login">เข้าสู่ระบบ</a>
                    @endguest
                </div>


                <a class="login" href="/student/home">สำหรับนักเรียน</a>

                @auth
                    <div class="dropdown">
                        <button class="dropbtn">บัญชีของฉัน ▾</button>

                        <div class="dropdown-content">
                            <a href="{{ route('tutor.dashboard') }}">โปรไฟล์</a>

                            <form action="{{ route('tutor.logout') }}" method="POST">
                                @csrf
                                <button class="logout-btn" type="submit">ออกจากระบบ</button>
                            </form>
                        </div>
                    </div>
                @endauth

                <!-- Hamburger Button (Mobile Only) -->
                <button class="hamburger" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

            </nav>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay">
        <div class="mobile-menu">
            <div class="mobile-menu-header">
                <div class="brand">
                    <div class="logo">EE</div>
                    <div class="brand-text">EngBuddy</div>
                </div>
                <button class="close-menu" aria-label="Close menu">&times;</button>
            </div>
            <nav class="mobile-menu-nav">
                <a href="/Tutor/home" class="mobile-menu-item">🏠 หน้าแรก</a>
                <a href="/Tutor/course" class="mobile-menu-item">💼 งานสอนพิเศษทั้งหมด</a>
                <a href="/Tutor/apply" class="mobile-menu-item">📝 ขั้นตอนการรับงาน</a>
                <a href="/Tutor/register" class="mobile-menu-item">✍️ สมัครติวเตอร์</a>
                @guest
                    <a href="/Tutor/login" class="mobile-menu-item">🔐 เข้าสู่ระบบ</a>
                @endguest
                @auth
                    <a href="{{ route('tutor.dashboard') }}" class="mobile-menu-item">👤 โปรไฟล์</a>
                    <form action="{{ route('tutor.logout') }}" method="POST" style="margin:0;">
                        @csrf
                        <button type="submit" class="mobile-menu-item mobile-menu-logout">🚪 ออกจากระบบ</button>
                    </form>
                @endauth
                <a href="/student/home" class="mobile-menu-item mobile-menu-cta">🎓 สำหรับนักเรียน</a>
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
                    <li><a href="/Tutor/home">เกี่ยวกับเรา</a></li>
                    <li><a href="/Tutor/course">ติดต่อเรา</a></li>
                    <li><a href="/Tutor/apply">ขั้นตอนการรับงาน</a></li>
                    <li><a href="/Tutor/register">สมัครติวเตอร์</a></li>
                </ul>
            </div>

            <div>
                <h4>ช่องทางการจองงานสอน</h4>
                <ul>
                    <li>LINE: <a href="#">@EngBuddy</a></li>
                    <li>TikTok: <a href="#">@EngBuddy</a></li>
                </ul>
            </div>
        </div>

        <div class="copyright">
            © {{ date('Y') }} EngBuddy
        </div>
    </footer>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // Dropdown Menu (existing code)
    const dropdown = document.querySelector('.dropdown');
    const button = document.querySelector('.dropbtn');

    if (dropdown && button) {
        button.addEventListener('click', function (e) {
            e.stopPropagation();
            dropdown.classList.toggle('show');
        });

        document.addEventListener('click', function () {
            dropdown.classList.remove('show');
        });
    }

    // Hamburger Menu (new code)
    const hamburger = document.querySelector('.hamburger');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
    const closeMenu = document.querySelector('.close-menu');
    const mobileMenuItems = document.querySelectorAll('.mobile-menu-item');

    // Open mobile menu
    if (hamburger) {
        hamburger.addEventListener('click', function() {
            mobileMenuOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    }

    // Close mobile menu
    if (closeMenu) {
        closeMenu.addEventListener('click', function() {
            mobileMenuOverlay.classList.remove('active');
            document.body.style.overflow = '';
        });
    }

    // Close when clicking overlay
    if (mobileMenuOverlay) {
        mobileMenuOverlay.addEventListener('click', function(e) {
            if (e.target === mobileMenuOverlay) {
                mobileMenuOverlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }

    // Close when clicking menu item
    mobileMenuItems.forEach(item => {
        item.addEventListener('click', function() {
            mobileMenuOverlay.classList.remove('active');
            document.body.style.overflow = '';
        });
    });
});
</script>

</body>
</html>
