@extends('student_layout')

@section('title', 'EngBuddy | หลักสูตรภาษาอังกฤษ')

@section('content')
<section>
    <h2 class="banner">หลักสูตรภาษาอังกฤษของเรา</h2>
    <div class="container">
        <p style="text-align: center; color: #6b7280; margin-bottom: 50px; font-size: 18px; max-width: 800px; margin-left: auto; margin-right: auto;">
            เลือกหลักสูตรที่เหมาะกับความต้องการของคุณ สอนโดยติวเตอร์ผู้เชี่ยวชาญ
        </p>

        <div class="courses-modern-grid">


               <!-- Grammar & Structure -->
            <div class="course-modern-card" data-color="green">
                <div class="course-icon">📚</div>
                <h3 class="course-title">Grammar</h3>
                <p class="course-description">ไวยากรณ์ภาษาอังกฤษ เน้นความเข้าใจและการใช้งานจริง</p>
                <div class="course-tag">เหมาะสำหรับ: ผู้ต้องการพื้นฐานไวยากรณ์แข็งแรง</div>
            </div>

            <!-- Conversation -->
            <div class="course-modern-card" data-color="orange">
                <div class="course-icon">🗣️</div>
                <h3 class="course-title">Conversation</h3>
                <p class="course-description">ฝึกพูดภาษาอังกฤษเพื่อการสื่อสารในชีวิตจริง</p>
                <div class="course-tag">เหมาะสำหรับ: ผู้ต้องการพัฒนาทักษะการพูด</div>
            </div>

              <!-- English for Kids -->
            <div class="course-modern-card" data-color="pink">
                <div class="course-icon">👶</div>
                <h3 class="course-title">English for Kids</h3>
                <p class="course-description">ภาษาอังกฤษสำหรับเด็ก สนุก เข้าใจง่าย พื้นฐานแข็งแรง</p>
                <div class="course-tag">เหมาะสำหรับ: เด็กอายุ 4-12 ปี</div>
            </div>


            <!-- TOEIC -->
            <div class="course-modern-card" data-color="blue">
                <div class="course-icon">💼</div>
                <h3 class="course-title">TOEIC</h3>
                <p class="course-description">เตรียมสอบ TOEIC เพื่อการทำงาน เน้นทักษะ Listening & Reading</p>
                <div class="course-tag">เหมาะสำหรับ: ผู้ที่ต้องการใช้ในการทำงาน</div>
            </div>

            <!-- IELTS -->
            <div class="course-modern-card" data-color="purple">
                <div class="course-icon">🎓</div>
                <h3 class="course-title">IELTS</h3>
                <p class="course-description">เตรียมสอบ IELTS เพื่อเรียนต่อหรือย้ายถิ่นฐาน ครบ 4 ทักษะ</p>
                <div class="course-tag">เหมาะสำหรับ: ผู้ที่ต้องการเรียนต่อต่างประเทศ</div>
            </div>

         
           

            <!-- TOEFL -->
            <div class="course-modern-card" data-color="red">
                <div class="course-icon">🇺🇸</div>
                <h3 class="course-title">TOEFL</h3>
                <p class="course-description">เตรียมสอบ TOEFL iBT สำหรับเรียนต่อในอเมริกา</p>
                <div class="course-tag">เหมาะสำหรับ: ผู้ต้องการเรียนต่อในสหรัฐฯ</div>
            </div>

         

               <!-- General English -->
            <div class="course-modern-card" data-color="yellow">
                <div class="course-icon">🌟</div>
                <h3 class="course-title">General English</h3>
                <p class="course-description">ภาษาอังกฤษทั่วไป เหมาะสำหรับผู้เริ่มต้นถึงระดับกลาง</p>
                <div class="course-tag">เหมาะสำหรับ: ผู้พัฒนาภาษาอังกฤษทั่วไป</div>
            </div>

            <!-- Reading & Writing -->
            <div class="course-modern-card" data-color="teal">
                <div class="course-icon">📖</div>
                <h3 class="course-title">Reading & Writing</h3>
                <p class="course-description">พัฒนาทักษะการอ่านและการเขียนภาษาอังกฤษ</p>
                <div class="course-tag">เหมาะสำหรับ: ผู้ต้องการพัฒนาการอ่านเขียน</div>
            </div>

                <!-- Business English -->
            <div class="course-modern-card" data-color="indigo">
                <div class="course-icon">💻</div>
                <h3 class="course-title">Business English</h3>
                <p class="course-description">ภาษาอังกฤษธุรกิจสำหรับการทำงานและการประชุม</p>
                <div class="course-tag">เหมาะสำหรับ: ผู้ใช้ภาษาอังกฤษในการทำงาน</div>
            </div>

         

        </div>

        <!-- CTA Section -->
        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-align: center; padding: 60px 20px; border-radius: 12px; margin-top: 60px;">
            <h2 style="font-size: 32px; margin-bottom: 16px;">พร้อมเริ่มเรียนภาษาอังกฤษแล้วหรือยัง?</h2>
            <p style="font-size: 18px; margin-bottom: 32px; opacity: 0.9;">ปรึกษาฟรี! เลือกหลักสูตรที่เหมาะกับคุณ</p>
            <a href="/student/apply" style="display: inline-block; background: white; color: #667eea; padding: 16px 32px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 16px;">สอบถามข้อมูล</a>
        </div>
    </div>
</section>
@endsection
