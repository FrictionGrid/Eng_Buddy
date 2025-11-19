@extends('tutor_layout')

@section('title', 'ขั้นตอนการรับงาน | EngBuddy')

@section('content')

<!-- Hero -->
<section class="cc-hero" id="howto">
    <div class="cc-hero__kicker">HOW-TO</div>
    <h1>ขั้นตอนการรับงาน</h1>
    <p>สรุปเส้นทางตั้งแต่สมัคร จนถึงเริ่มสอนและรับค่าสอน — ออกแบบให้เข้าใจง่ายใน 8 ขั้นตอน</p>
</section>

    <!-- Steps -->
    <section class="cc-wrap">
        <div class=" cc-steps" aria-label="ขั้นตอน">
            <div class="cc-step">
                <div class="cc-step__num">1</div>
                <div>
                    <h3>กรอกใบสมัครติวเตอร์</h3>
                    <p>ยืนยันข้อมูลโปรไฟล์ รายวิชาที่ถนัด ระดับชั้น พื้นที่ และช่วงเวลาว่าง</p>
                </div>
            </div>
            <div class="cc-step">
                <div class="cc-step__num">2</div>
                <div>
                    <h3>เลือกดูงานสอนที่สนใจ</h3>
                    <p>ค้นหาตามวิชา พื้นที่ หรือเวลา เพื่อหางานที่เหมาะกับตารางของคุณ</p>
                </div>
            </div>
            <div class="cc-step">
                <div class="cc-step__num">3</div>
                <div>
                    <h3>จองงานผ่าน LINE</h3>
                    <p>ทักหา <span class="cc-chip">LINE @EngBuddy</span> พร้อมแจ้ง <strong>Job ID</strong> เพื่อความรวดเร็ว</p>
                </div>
            </div>
            <div class="cc-step">
                <div class="cc-step__num">4</div>
                <div>
                    <h3>รอทีมงานตอบรับ</h3>
                    <p>เจ้าหน้าที่ตรวจสอบความเหมาะสม และคอนเฟิร์มรายละเอียดการสอน</p>
                </div>
            </div>
            <div class="cc-step">
                <div class="cc-step__num">5</div>
                <div>
                    <h3>ยืนยันงาน &amp; ชำระค่าแนะนำ</h3>
                    <p>โอนค่าแนะนำตามที่แจ้ง เก็บสลิปไว้ทุกครั้งเพื่ออ้างอิง</p>
                </div>
            </div>
            <div class="cc-step">
                <div class="cc-step__num">6</div>
                <div>
                    <h3>โทรแนะนำตัวทันที</h3>
                    <p>ติดต่อผู้ปกครอง/นักเรียนหลังได้รับเบอร์ เพื่อยืนยันวันเวลาและสถานที่</p>
                </div>
            </div>
            <div class="cc-step">
                <div class="cc-step__num">7</div>
                <div>
                    <h3>เตรียมเนื้อหาและเริ่มสอน</h3>
                    <p>วางแผนคอร์สให้สอดคล้องกับเป้าหมายการเรียนของนักเรียน</p>
                </div>
            </div>
            <div class="cc-step">
                <div class="cc-step__num">8</div>
                <div>
                    <h3>รับค่าสอนทุกครั้ง</h3>
                    <p>ชำระโดยผู้ปกครอง/นักเรียน ตามรอบที่ตกลงไว้</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Notes / Terms -->
    <section class="cc-wrap" style="margin-top:12px">
        <div class="cc-card cc-notes">
            <h2>หมายเหตุสำคัญ</h2>
            <ol>
                <li>หากชั่วโมงสอนไม่ครบตามที่ชำระค่าแนะนำ จะคืนเฉพาะส่วนต่างที่ยังไม่ได้สอน โดยยึดตามหลักฐานการโอน</li>
                <li>เก็บสลิปโอนเงินทุกครั้ง และจด <strong>รหัสงาน/Job ID</strong> ก่อน–หลังรับงานเพื่อใช้ตรวจสอบ</li>
                <li>ห้ามเรียกเก็บค่าสอนล่วงหน้าโดยยังไม่ได้สอน ไม่ว่ากรณีใด</li>
                <li>กรณีเปลี่ยนวันเวลา/สถานที่ กรุณาแจ้งเจ้าหน้าที่ก่อน เพื่อปรับรายละเอียดให้เหมาะสม</li>
                <li>ติดต่อผู้เรียนทันทีหลังได้รับเบอร์ หากติดต่อช้าและผู้เรียนได้ติวเตอร์อื่นแล้ว อาจถูกหักค่าแนะนำตามดุลพินิจ</li>
                <li>กรณีมอบหมายผู้อื่นสอนแทนโดยไม่แจ้ง อาจถูกระงับสิทธิ์การเป็นติวเตอร์</li>
            </ol>
        
        </div>
    </section>

    <!-- CTA -->
    <section class="cc-cta" aria-label="ติดต่อเรา">
        <div class="cc-cta__inner">
            <div>
                <h2>พร้อมเริ่มสอนหรือยัง?</h2>
                <p>กรอกใบสมัคร แล้วแจ้ง Job ID ผ่านช่องทางด้านล่าง ทีมงานตอบไวในเวลาทำการ</p>
                <div class="cc-cta__actions">
                    <a class="cc-btn" href="/Tutor/register">สมัครติวเตอร์</a>
                    <a class="cc-btn cc-btn--secondary" href="/Tutor/course">งานสอนทั้งหมด</a>
                </div>
            </div>
        
        </div>
    </section>

    <!-- FAQ -->
    <section class="cc-wrap" style="margin-top:16px">
        <div class="cc-card cc-faq">
            <h2>คำถามที่พบบ่อย</h2>
            <details>
                <summary>โอนค่าแนะนำเมื่อไหร่และอย่างไร?</summary>
                <p>โอนหลังได้รับการคอนเฟิร์มงานจากเจ้าหน้าที่ผ่าน LINE/โทรศัพท์ พร้อมระบุ Job ID และเก็บสลิปไว้ทุกครั้ง</p>
            </details>
            <details>
                <summary>ยกเลิกหรือขอคืนค่าแนะนำได้หรือไม่?</summary>
                <p>คืนได้เฉพาะส่วนที่ยังไม่ได้สอน โดยอิงจากชั่วโมงที่สอนจริงและหลักฐานการโอน ทั้งนี้ขึ้นกับการพิจารณาเป็นกรณีไป</p>
            </details>
            <details>
                <summary>หากผู้ปกครองยกเลิกเพราะความไม่พร้อมของติวเตอร์?</summary>
                <p>อาจถูกหักค่าแนะนำตามความเหมาะสม เช่น ไปสาย ติดต่อยาก ไม่เตรียมตัว ฯลฯ</p>
            </details>
            <details>
                <summary>โทรหาผู้เรียนช้าไปมีผลอย่างไร?</summary>
                <p>หลังได้เบอร์ควรโทรทันที หากติดต่อช้าแล้วผู้เรียนได้ติวเตอร์คนอื่น อาจถูกหักค่าแนะนำบางส่วน</p>
            </details>
        </div>
    </section>

@endsection
