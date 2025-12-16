<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'EngBuddy | หาติวเตอร์ภาษาอังกฤษตัวต่อตัวและออนไลน์ทั่วไทย')</title>
    <meta name="description" content="@yield('meta_description', 'แพลตฟอร์มหาติวเตอร์ภาษาอังกฤษตัวต่อตัวและออนไลน์ทั่วไทย คัดติวเตอร์คุณภาพ ครูผู้เชี่ยวชาญทุกระดับ สะดวก ปลอดภัย และเชื่อถือได้')">
    <meta name="keywords" content="@yield('meta_keywords', 'ติวเตอร์ภาษาอังกฤษ, สอนภาษาอังกฤษ, ครูสอนพิเศษ, เรียนพิเศษอังกฤษ, ติวอังกฤษ, TOEIC, IELTS, Grammar')">
    <meta name="author" content="@yield('meta_author', 'EngBuddy Team')">
    <meta name="robots" content="@yield('meta_robots', 'index, follow')">

    <link rel="canonical" href="@yield('canonical_url', url()->current())">

    <!-- Preconnect for Performance (Core Web Vitals) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <link rel="dns-prefetch" href="https://www.googletagmanager.com">





    <link rel="stylesheet" href="{{ asset('css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Tutor_layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Student_main.css') }}">
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

                <!-- Hamburger Menu Button (Mobile) -->
                <button class="hamburger" aria-label="เปิดเมนู">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

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

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay">
        <div class="mobile-menu">
            <div class="mobile-menu-header">
                <div class="brand">
                    <div class="logo">EE</div>
                    <div>
                        <div class="brand-text">EngBuddy</div>
                        <div class="tagline">We are all experts</div>
                    </div>
                </div>
                <button class="close-menu" aria-label="ปิดเมนู">&times;</button>
            </div>

            <nav class="mobile-menu-nav">
                <a class="mobile-menu-item" href="/student/home">หน้าแรก</a>
                <a class="mobile-menu-item" href="/student/course">หลักสูตร</a>
                <a class="mobile-menu-item" href="/student/apply">ขั้นตอนการสมัคร</a>
                <a class="mobile-menu-item" href="/student/articles">บทความ</a>
                <a class="mobile-menu-item" href="/student/promotion">โปรโมชั่น</a>

                <a class="mobile-menu-item mobile-menu-cta" href="/Tutor/home">สำหรับติวเตอร์</a>
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

    if (dropdown && button) {
        button.addEventListener('click', function (e) {
            e.stopPropagation();
            dropdown.classList.toggle('show');
        });

        document.addEventListener('click', function () {
            dropdown.classList.remove('show');
        });
    }


    const hamburger = document.querySelector('.hamburger');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
    const closeMenu = document.querySelector('.close-menu');
    const mobileMenuItems = document.querySelectorAll('.mobile-menu-item');

    if (hamburger) {
        hamburger.addEventListener('click', function() {
            mobileMenuOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    }


    if (closeMenu) {
        closeMenu.addEventListener('click', function() {
            mobileMenuOverlay.classList.remove('active');
            document.body.style.overflow = '';
        });
    }

  
    if (mobileMenuOverlay) {
        mobileMenuOverlay.addEventListener('click', function(e) {
            if (e.target === mobileMenuOverlay) {
                mobileMenuOverlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }


    mobileMenuItems.forEach(item => {
        item.addEventListener('click', function() {
            mobileMenuOverlay.classList.remove('active');
            document.body.style.overflow = '';
        });
    });

    const carouselTrack = document.querySelector('.carousel-track');
    const prevBtn = document.querySelector('.carousel-btn-prev');
    const nextBtn = document.querySelector('.carousel-btn-next');

    if (carouselTrack && prevBtn && nextBtn) {
        const slides = Array.from(carouselTrack.children);
        const slideWidth = slides[0].getBoundingClientRect().width + 20; 
        let currentIndex = 0;


        const firstClones = slides.slice(0, 3).map(slide => slide.cloneNode(true));
        const lastClones = slides.slice(-3).map(slide => slide.cloneNode(true));

        firstClones.forEach(clone => carouselTrack.appendChild(clone));
        lastClones.reverse().forEach(clone => carouselTrack.prepend(clone));

 
        const allSlides = Array.from(carouselTrack.children);
        const totalSlides = allSlides.length;
        currentIndex = 3; 


        carouselTrack.style.transform = `translateX(-${currentIndex * slideWidth}px)`;


        function moveCarousel(direction) {
            carouselTrack.style.transition = 'transform 0.5s ease-in-out';

            if (direction === 'next') {
                currentIndex++;
            } else {
                currentIndex--;
            }

            carouselTrack.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
        }


        carouselTrack.addEventListener('transitionend', () => {
            if (currentIndex >= totalSlides - 3) {
                carouselTrack.style.transition = 'none';
                currentIndex = 3;
                carouselTrack.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
            }

            if (currentIndex <= 2) {
                carouselTrack.style.transition = 'none';
                currentIndex = totalSlides - 4;
                carouselTrack.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
            }
        });


        nextBtn.addEventListener('click', () => moveCarousel('next'));
        prevBtn.addEventListener('click', () => moveCarousel('prev'));


        let autoPlayInterval = setInterval(() => moveCarousel('next'), 4000);


        carouselTrack.addEventListener('mouseenter', () => clearInterval(autoPlayInterval));
        carouselTrack.addEventListener('mouseleave', () => {
            autoPlayInterval = setInterval(() => moveCarousel('next'), 4000);
        });


        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                const newSlideWidth = allSlides[0].getBoundingClientRect().width + 20;
                carouselTrack.style.transition = 'none';
                carouselTrack.style.transform = `translateX(-${currentIndex * newSlideWidth}px)`;
            }, 250);
        });
    }
});
</script>

</body>
</html>
