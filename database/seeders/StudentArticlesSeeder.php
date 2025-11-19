<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student_article;
use Illuminate\Support\Str;

class StudentArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'ติวอังกฤษ ม.1 – ม.6 เลือกยังไง?',
                'slug' => 'how-to-choose-english-tutor-m1-m6',
                'short_description' => 'คู่มือเลือกคอร์สติวอังกฤษให้เหมาะกับระดับชั้น ตั้งแต่ ม.1 ถึง ม.6 พร้อมเทคนิคการเลือกครูที่ใช่',
                'content' => '<h2>การเลือกคอร์สติวอังกฤษที่เหมาะสมตามระดับชั้น</h2>

<h3>ม.1-ม.3 (มัธยมต้น)</h3>
<p>สำหรับนักเรียนระดับมัธยมต้น ควรเน้นพื้นฐาน Grammar และการสร้างประโยคเบื้องต้น ตัวเลือกที่ดี ได้แก่:</p>
<ul>
    <li><strong>คอร์สพื้นฐาน Grammar</strong> - เน้นโครงสร้างประโยค Tenses พื้นฐาน</li>
    <li><strong>คอร์สฝึก Reading</strong> - อ่านเรื่องสั้นง่ายๆ สร้างพื้นฐานคำศัพท์</li>
    <li><strong>คอร์สสนทนาเบื้องต้น</strong> - ฝึกพูดในชีวิตประจำวัน สร้างความมั่นใจ</li>
</ul>

<h3>ม.4-ม.6 (มัธยมปลาย)</h3>
<p>นักเรียนมัธยมปลายต้องเตรียมสอบเข้ามหาวิทยาลัย ควรเลือกคอร์สที่:</p>
<ul>
    <li><strong>เน้นเตรียมสอบ GAT/PAT</strong> - ฝึกทำข้อสอบ วิเคราะห์แนวข้อสอบ</li>
    <li><strong>Advanced Grammar</strong> - ไวยากรณ์ขั้นสูง โครงสร้างประโยคซับซ้อน</li>
    <li><strong>Academic Writing</strong> - เขียนเรียงความ วิเคราะห์บทความ</li>
</ul>

<h3>เทคนิคการเลือกครูสอนพิเศษ</h3>
<ol>
    <li>ตรวจสอบประสบการณ์และผลงานของครู</li>
    <li>ทดลองเรียน 1-2 ครั้งก่อนตัดสินใจ</li>
    <li>ดูรีวิวจากนักเรียนคนอื่นๆ</li>
    <li>เลือกครูที่สอนตรงกับเป้าหมายของคุณ</li>
    <li>พิจารณาราคาที่เหมาะสมกับงบประมาณ</li>
</ol>

<h3>ข้อควรระวัง</h3>
<p>อย่าเลือกคอร์สที่ยากเกินไปหรือง่ายเกินไป ควรเลือกให้เหมาะกับระดับความสามารถปัจจุบัน และมีการทดสอบระดับก่อนเริ่มเรียนจะดีที่สุด</p>',
                'category' => 'คอร์สเรียน',
                'author' => 'EngBuddy Team',
                'views' => 1250,
                'is_featured' => true,
                'is_active' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'เทคนิค Grammar ที่นักเรียนไทยผิดบ่อย',
                'slug' => 'common-grammar-mistakes-thai-students',
                'short_description' => 'รวมข้อผิดพลาด Grammar ที่คนไทยมักทำผิด พร้อมวิธีแก้ไขและหลักจำง่ายๆ',
                'content' => '<h2>ข้อผิดพลาด Grammar ที่พบบ่อยที่สุด</h2>

<h3>1. Present Perfect vs. Past Simple</h3>
<p><strong>ผิด:</strong> I already ate lunch.<br>
<strong>ถูก:</strong> I have already eaten lunch.</p>
<p><strong>เคล็ดลับ:</strong> ใช้ Present Perfect กับ already, yet, just, ever, never</p>

<h3>2. การใช้ Articles (a, an, the)</h3>
<p><strong>ผิด:</strong> I want to be doctor.<br>
<strong>ถูก:</strong> I want to be a doctor.</p>
<p><strong>เคล็ดลับ:</strong> ใช้ a/an กับคำนามนับได้เอกพจน์ที่พูดถึงครั้งแรก</p>

<h3>3. Subject-Verb Agreement</h3>
<p><strong>ผิด:</strong> She go to school every day.<br>
<strong>ถูก:</strong> She goes to school every day.</p>
<p><strong>เคล็ดลับ:</strong> ประธานเอกพจน์ + กริยาเติม s/es</p>

<h3>4. การใช้ Do vs. Make</h3>
<p><strong>Do:</strong> homework, exercise, business, favor<br>
<strong>Make:</strong> decision, mistake, progress, money</p>
<p><strong>เคล็ดลับ:</strong> Do = กระทำกิจกรรม, Make = สร้าง/ผลิต</p>

<h3>5. Prepositions (in, on, at)</h3>
<p><strong>Time:</strong></p>
<ul>
    <li>At: ระบุเวลาชัดเจน (at 3 PM, at night)</li>
    <li>On: วัน/วันที่ (on Monday, on January 1st)</li>
    <li>In: เดือน/ปี/ช่วงเวลา (in January, in 2025, in the morning)</li>
</ul>

<h3>6. Since vs. For</h3>
<p><strong>Since:</strong> จุดเริ่มต้นเวลา (since 2020, since Monday)<br>
<strong>For:</strong> ช่วงเวลา (for 3 years, for a week)</p>

<h3>วิธีฝึกให้จำได้</h3>
<ol>
    <li>ทำแบบฝึกหัดทุกวัน</li>
    <li>อ่านตัวอย่างประโยคจริงจากหนังสือ/บทความ</li>
    <li>เขียนประโยคเองแล้วให้ครูตรวจ</li>
    <li>ฟังเพลง/ดูหนังภาษาอังกฤษ สังเกตการใช้ Grammar</li>
</ol>',
                'category' => 'เทคนิค',
                'author' => 'Teacher Amy',
                'views' => 2340,
                'is_featured' => true,
                'is_active' => true,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'สรุป TOEIC Part 1–7 แบบอ่านง่าย',
                'slug' => 'toeic-part-1-7-summary-guide',
                'short_description' => 'เข้าใจโครงสร้างข้อสอบ TOEIC ทั้ง 7 Part พร้อมเทคนิคทำข้อสอบแต่ละส่วนให้ได้คะแนนสูง',
                'content' => '<h2>โครงสร้างข้อสอบ TOEIC</h2>

<h3>Listening Section (ฟัง 45 นาที, 100 ข้อ)</h3>

<h4>Part 1: Photographs (รูปภาพ) - 6 ข้อ</h4>
<p><strong>รูปแบบ:</strong> ดูรูปภาพ เลือกคำบรรยายที่ตรงที่สุด</p>
<p><strong>เทคนิค:</strong></p>
<ul>
    <li>สังเกตคน สิ่งของ และกิริยาในรูป</li>
    <li>ระวังคำที่เสียงคล้ายกัน</li>
    <li>ฟังหา Active voice vs. Passive voice</li>
</ul>

<h4>Part 2: Question-Response (ตอบคำถาม) - 25 ข้อ</h4>
<p><strong>รูปแบบ:</strong> ฟังคำถาม เลือกคำตอบที่เหมาะสม</p>
<p><strong>เทคนิค:</strong></p>
<ul>
    <li>จับ Wh-questions (Who, What, Where, When, Why, How)</li>
    <li>ระวัง Yes/No questions</li>
    <li>ระวังคำตอบที่มีคำเหมือนกับคำถาม (มักเป็นคำตอบผิด)</li>
</ul>

<h4>Part 3: Conversations (บทสนทนา) - 39 ข้อ</h4>
<p><strong>รูปแบบ:</strong> ฟังบทสนทนา 2-3 คน ตอบคำถาม 3 ข้อต่อบทสนทนา</p>
<p><strong>เทคนิค:</strong></p>
<ul>
    <li>อ่านคำถามก่อนฟัง</li>
    <li>จับประเด็นหลัก: Who, Where, What, Why</li>
    <li>จดบันทึกสั้นๆ</li>
</ul>

<h4>Part 4: Talks (การพูด) - 30 ข้อ</h4>
<p><strong>รูปแบบ:</strong> ฟังการพูดคนเดียว (ประกาศ โฆษณา ข่าว)</p>
<p><strong>เทคนิค:</strong></p>
<ul>
    <li>จับประเภทการพูด (announcement, advertisement, news)</li>
    <li>ฟังใจความสำคัญ</li>
    <li>อ่านคำถามก่อน</li>
</ul>

<h3>Reading Section (อ่าน 75 นาที, 100 ข้อ)</h3>

<h4>Part 5: Incomplete Sentences (เติมคำ) - 30 ข้อ</h4>
<p><strong>รูปแบบ:</strong> เลือกคำที่เหมาะสมเติมในประโยค</p>
<p><strong>เทคนิค:</strong></p>
<ul>
    <li>เช็ค Grammar (Tense, Word form, Preposition)</li>
    <li>ดูบริบทของประโยค</li>
    <li>ใช้เวลาไม่เกิน 30 วินาที/ข้อ</li>
</ul>

<h4>Part 6: Text Completion (เติมข้อความ) - 16 ข้อ</h4>
<p><strong>รูปแบบ:</strong> อ่านข้อความสั้นๆ เติมคำหรือประโยคที่หายไป</p>
<p><strong>เทคนิค:</strong></p>
<ul>
    <li>อ่านทั้งข้อความก่อนตอบ</li>
    <li>เช็คความสัมพันธ์ระหว่างประโยค</li>
    <li>ระวัง Transition words</li>
</ul>

<h4>Part 7: Reading Comprehension (อ่านบทความ) - 54 ข้อ</h4>
<p><strong>รูปแบบ:</strong> อ่านบทความ (เดี่ยว/คู่/สาม) ตอบคำถาม</p>
<p><strong>เทคนิค:</strong></p>
<ul>
    <li>อ่านคำถามก่อน แล้วหาคำตอบในบทความ</li>
    <li>Skim เพื่อหาใจความสำคัญ</li>
    <li>Scan หารายละเอียด</li>
    <li>จัดการเวลา: Single passage 2-3 นาที, Double/Triple 4-5 นาที</li>
</ul>

<h3>เป้าหมายคะแนนแนะนำ</h3>
<ul>
    <li><strong>600+</strong> : พื้นฐานสำหรับงานทั่วไป</li>
    <li><strong>750+</strong> : ระดับดีสำหรับตำแหน่งที่ต้องใช้ภาษาอังกฤษ</li>
    <li><strong>850+</strong> : ระดับสูง สำหรับงานที่ต้องใช้ภาษาอังกฤษเป็นหลัก</li>
</ul>',
                'category' => 'สอบวัดระดับ',
                'author' => 'Teacher John',
                'views' => 3120,
                'is_featured' => true,
                'is_active' => true,
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'เรียนพิเศษอังกฤษออนไลน์ดีไหม?',
                'slug' => 'online-english-tutoring-pros-cons',
                'short_description' => 'เปรียบเทียบข้อดี-ข้อเสีย การเรียนอังกฤษออนไลน์ vs. เรียนตัวต่อตัว พร้อมแนะนำแพลตฟอร์มที่ดีที่สุด',
                'content' => '<h2>ข้อดีของการเรียนอังกฤษออนไลน์</h2>

<h3>1. ความสะดวกสบาย</h3>
<ul>
    <li>เรียนที่ไหนก็ได้ ไม่ต้องเดินทาง</li>
    <li>ประหยัดเวลาและค่าใช้จ่าย</li>
    <li>ยืดหยุ่นเวลาเรียน</li>
</ul>

<h3>2. ราคาถูกกว่า</h3>
<ul>
    <li>ค่าเรียนถูกกว่าเรียนตัวต่อตัว 20-40%</li>
    <li>ไม่มีค่าเดินทาง</li>
    <li>เลือกครูจากทั่วโลกได้</li>
</ul>

<h3>3. ทรัพยากรการเรียนรู้มากมาย</h3>
<ul>
    <li>บันทึกการสอนย้อนหลังได้</li>
    <li>แชร์หน้าจอ ใช้ Whiteboard online</li>
    <li>ส่งการบ้านและรับ Feedback ทางออนไลน์</li>
</ul>

<h2>ข้อเสียของการเรียนออนไลน์</h2>

<h3>1. ปัญหาทางเทคนิค</h3>
<ul>
    <li>ต้องมีอินเทอร์เน็ตที่เสถียร</li>
    <li>อาจมีปัญหาเสียง/ภาพสะดุด</li>
    <li>ต้องมีอุปกรณ์ที่เหมาะสม</li>
</ul>

<h3>2. การโต้ตอบจำกัด</h3>
<ul>
    <li>ไม่มี Body language เต็มที่</li>
    <li>ขาด Face-to-face interaction</li>
    <li>อาจรู้สึกไม่ Personal</li>
</ul>

<h3>3. ต้องใช้วินัยในการเรียน</h3>
<ul>
    <li>ง่ายที่จะเลิกเรียนกลางคัน</li>
    <li>ต้องมีแรงจูงใจในตัวเอง</li>
    <li>ต้องจัดการเวลาให้ดี</li>
</ul>

<h2>เปรียบเทียบ: ออนไลน์ vs. ตัวต่อตัว</h2>

<table border="1" style="width:100%; border-collapse: collapse;">
<tr>
    <th>เกณฑ์</th>
    <th>ออนไลน์</th>
    <th>ตัวต่อตัว</th>
</tr>
<tr>
    <td>ราคา</td>
    <td>300-600 บาท/ชม.</td>
    <td>500-1,000 บาท/ชม.</td>
</tr>
<tr>
    <td>ความสะดวก</td>
    <td>⭐⭐⭐⭐⭐</td>
    <td>⭐⭐⭐</td>
</tr>
<tr>
    <td>การโต้ตอบ</td>
    <td>⭐⭐⭐</td>
    <td>⭐⭐⭐⭐⭐</td>
</tr>
<tr>
    <td>ความยืดหยุ่น</td>
    <td>⭐⭐⭐⭐⭐</td>
    <td>⭐⭐⭐</td>
</tr>
</table>

<h2>เหมาะกับใครบ้าง?</h2>

<h3>เรียนออนไลน์เหมาะกับ:</h3>
<ul>
    <li>คนที่มีเวลาไม่แน่นอน</li>
    <li>ผู้ใหญ่ทำงานที่อยากเรียนหลังเลิกงาน</li>
    <li>คนที่อยู่ต่างจังหวัดหาครูที่ดียาก</li>
    <li>คนที่มีงบประมาณจำกัด</li>
</ul>

<h3>เรียนตัวต่อตัวเหมาะกับ:</h3>
<ul>
    <li>เด็กเล็กที่ต้องการการดูแลใกล้ชิด</li>
    <li>คนที่ชอบ Face-to-face interaction</li>
    <li>คนที่ต้องการฝึก Speaking อย่างเข้มข้น</li>
    <li>คนที่อินเทอร์เน็ตบ้านไม่เสถียร</li>
</ul>

<h2>แพลตฟอร์มออนไลน์แนะนำ</h2>
<ol>
    <li><strong>EngBuddy</strong> - ครูไทยและเจ้าของภาษา ราคาเริ่มต้น 300 บาท/ชม.</li>
    <li><strong>Zoom/Google Meet</strong> - เรียนกับครูส่วนตัว</li>
    <li><strong>Preply, iTalki</strong> - หาครูเจ้าของภาษาจากต่างประเทศ</li>
</ol>

<h2>สรุป</h2>
<p>เรียนออนไลน์ดีหรือไม่ <strong>ขึ้นอยู่กับเป้าหมาย งบประมาณ และไลฟ์สไตล์ของคุณ</strong> ถ้าต้องการความสะดวก ราคาถูก และมีวินัย <strong>เรียนออนไลน์คุ้มมาก</strong> แต่ถ้าชอบ Personal touch และ Face-to-face interaction เรียนตัวต่อตัวอาจดีกว่า</p>',
                'category' => 'เรียนออนไลน์',
                'author' => 'EngBuddy Team',
                'views' => 1850,
                'is_featured' => false,
                'is_active' => true,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'สอนลูกให้พูดอังกฤษใน 7 วัน',
                'slug' => 'teach-kids-english-in-7-days',
                'short_description' => 'เทคนิคสอนลูกพูดภาษาอังกฤษอย่างสนุกสนาน ใช้ได้ผลจริงแค่ 7 วัน พร้อมกิจกรรมแนะนำ',
                'content' => '<h2>แผน 7 วันสอนลูกพูดอังกฤษ</h2>

<h3>วันที่ 1: ทักทายและแนะนำตัว</h3>
<p><strong>คำศัพท์:</strong> Hello, Hi, Good morning, My name is..., I am...</p>
<p><strong>กิจกรรม:</strong></p>
<ul>
    <li>เล่นเกมทักทายตุ๊กตา/สัตว์เลี้ยง</li>
    <li>ฝึกแนะนำตัวหน้ากระจก</li>
    <li>ร้องเพลง "Hello Song"</li>
</ul>

<h3>วันที่ 2: สี (Colors)</h3>
<p><strong>คำศัพท์:</strong> Red, Blue, Yellow, Green, Pink, Orange, Purple, Black, White</p>
<p><strong>กิจกรรม:</strong></p>
<ul>
    <li>ระบายสีพร้อมพูดชื่อสีภาษาอังกฤษ</li>
    <li>เล่นเกม "I Spy" หาของสีต่างๆ</li>
    <li>ดูวิดีโอสอนสีภาษาอังกฤษ</li>
</ul>

<h3>วันที่ 3: ตัวเลข (Numbers 1-10)</h3>
<p><strong>คำศัพท์:</strong> One, Two, Three, Four, Five, Six, Seven, Eight, Nine, Ten</p>
<p><strong>กิจกรรม:</strong></p>
<ul>
    <li>นับนิ้วมือ นับของเล่น</li>
    <li>ร้องเพลง "Ten Little Indians"</li>
    <li>เล่นเกมโยนลูกบอลนับเลข</li>
</ul>

<h3>วันที่ 4: สัตว์ (Animals)</h3>
<p><strong>คำศัพท์:</strong> Dog, Cat, Bird, Fish, Rabbit, Elephant, Lion, Monkey</p>
<p><strong>กิจกรรม:</strong></p>
<ul>
    <li>เล่นเกมเลียนแบบเสียงสัตว์</li>
    <li>ดูหนังสือภาพสัตว์</li>
    <li>ร้องเพลง "Old MacDonald Had a Farm"</li>
</ul>

<h3>วันที่ 5: ผลไม้ (Fruits)</h3>
<p><strong>คำศัพท์:</strong> Apple, Banana, Orange, Mango, Watermelon, Grapes, Strawberry</p>
<p><strong>กิจกรรม:</strong></p>
<ul>
    <li>ซื้อผลไม้ที่ตลาด พูดชื่อภาษาอังกฤษ</li>
    <li>เล่นเกม Fruit Salad</li>
    <li>ทำ Fruit smoothie พร้อมพูดชื่อผลไม้</li>
</ul>

<h3>วันที่ 6: ครอบครัว (Family)</h3>
<p><strong>คำศัพท์:</strong> Mom, Dad, Sister, Brother, Grandma, Grandpa</p>
<p><strong>กิจกรรม:</strong></p>
<ul>
    <li>ดูอัลบั้มรูปครอบครัว แนะนำสมาชิก</li>
    <li>วาดรูปครอบครัวพร้อมพูดภาษาอังกฤษ</li>
    <li>ร้องเพลง "Finger Family"</li>
</ul>

<h3>วันที่ 7: ประโยคง่ายๆ ในชีวิตประจำวัน</h3>
<p><strong>ประโยค:</strong></p>
<ul>
    <li>I like...</li>
    <li>I want...</li>
    <li>This is...</li>
    <li>Thank you</li>
    <li>Please</li>
</ul>
<p><strong>กิจกรรม:</strong></p>
<ul>
    <li>เล่นบทบาทสมมติ (สั่งอาหาร ซื้อของ)</li>
    <li>ทบทวนคำศัพท์ทั้งหมด</li>
    <li>ให้ลูกแสดงสิ่งที่เรียนมาให้คนในครอบครัวดู</li>
</ul>

<h2>เทคนิคสำคัญ</h2>

<h3>1. ทำให้สนุก อย่าบังคับ</h3>
<p>ใช้เพลง เกม การ์ตูน เพื่อให้ลูกสนุกกับการเรียนรู้</p>

<h3>2. ฝึกซ้ำๆ ทุกวัน</h3>
<p>ใช้เวลาแค่ 15-20 นาที/วัน แต่ต้องทำทุกวัน</p>

<h3>3. ชมเชยและให้กำลังใจ</h3>
<p>พูดว่า "Good job!" "Very good!" เมื่อลูกพูดได้</p>

<h3>4. ใช้ภาษาอังกฤษในชีวิตประจำวัน</h3>
<p>ตอนกินข้าว อาบน้ำ เล่นของเล่น แทรกคำภาษาอังกฤษเข้าไป</p>

<h3>5. พ่อแม่เป็นแบบอย่าง</h3>
<p>พูดภาษาอังกฤษให้ลูกฟังบ้าง ลูกจะเลียนแบบ</p>

<h2>แอปและเว็บไซต์แนะนำ</h2>
<ul>
    <li><strong>YouTube Kids</strong> - เพลงและการ์ตูนภาษาอังกฤษ</li>
    <li><strong>Khan Academy Kids</strong> - เกมและกิจกรรมสนุกๆ</li>
    <li><strong>Duolingo ABC</strong> - เรียนรู้ตัวอักษรและคำศัพท์</li>
</ul>

<h2>สรุป</h2>
<p>การสอนลูกพูดภาษาอังกฤษไม่ใช่เรื่องยาก <strong>กุญแจคือความสนุกสนาน ความสม่ำเสมอ และการให้กำลังใจ</strong> แค่ 7 วัน ลูกจะเริ่มมีความมั่นใจในการพูดภาษาอังกฤษ!</p>',
                'category' => 'เด็ก',
                'author' => 'Teacher Lily',
                'views' => 2680,
                'is_featured' => true,
                'is_active' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'รวมแนวข้อสอบอังกฤษ ม.ต้น',
                'slug' => 'english-exam-questions-junior-high',
                'short_description' => 'แนวข้อสอบภาษาอังกฤษระดับมัธยมต้น พร้อมเฉลยและคำอธิบาย ครอบคลุมทุก Grammar สำคัญ',
                'content' => '<h2>แนวข้อสอบอังกฤษ ม.ต้น</h2>

<h3>Part 1: Tenses (20 คะแนน)</h3>

<h4>1. Simple Present Tense</h4>
<p><strong>ข้อสอบ:</strong> She _____ to school every day.</p>
<p>a) go &nbsp;&nbsp; b) goes &nbsp;&nbsp; c) went &nbsp;&nbsp; d) going</p>
<p><strong>เฉลย:</strong> b) goes<br>
<strong>อธิบาย:</strong> ประธาน She เอกพจน์ + กริยาเติม s/es</p>

<h4>2. Present Continuous</h4>
<p><strong>ข้อสอบ:</strong> I _____ TV right now.</p>
<p>a) watch &nbsp;&nbsp; b) watches &nbsp;&nbsp; c) am watching &nbsp;&nbsp; d) watched</p>
<p><strong>เฉลย:</strong> c) am watching<br>
<strong>อธิบาย:</strong> right now = ขณะนี้ ใช้ Present Continuous (am/is/are + Ving)</p>

<h4>3. Simple Past</h4>
<p><strong>ข้อสอบ:</strong> They _____ to the beach last weekend.</p>
<p>a) go &nbsp;&nbsp; b) goes &nbsp;&nbsp; c) went &nbsp;&nbsp; d) going</p>
<p><strong>เฉลย:</strong> c) went<br>
<strong>อธิบาย:</strong> last weekend = อดีต ใช้ Past Simple (V2)</p>

<h3>Part 2: Articles (a, an, the) - 10 คะแนน</h3>

<p><strong>ข้อสอบ:</strong> I have _____ apple and _____ orange.</p>
<p>a) a, a &nbsp;&nbsp; b) an, an &nbsp;&nbsp; c) a, an &nbsp;&nbsp; d) an, a</p>
<p><strong>เฉลย:</strong> d) an, a<br>
<strong>อธิบาย:</strong> apple ขึ้นต้นสระ ใช้ an, orange ออกเสียงสระ ใช้ an</p>

<h3>Part 3: Prepositions - 15 คะแนน</h3>

<h4>Time Prepositions</h4>
<p><strong>ข้อสอบ:</strong> The class starts _____ 8 o\'clock.</p>
<p>a) in &nbsp;&nbsp; b) on &nbsp;&nbsp; c) at &nbsp;&nbsp; d) for</p>
<p><strong>เฉลย:</strong> c) at<br>
<strong>อธิบาย:</strong> ระบุเวลาชัดเจน ใช้ at</p>

<h4>Place Prepositions</h4>
<p><strong>ข้อสอบ:</strong> The book is _____ the table.</p>
<p>a) in &nbsp;&nbsp; b) on &nbsp;&nbsp; c) at &nbsp;&nbsp; d) under</p>
<p><strong>เฉลย:</strong> b) on<br>
<strong>อธิบาย:</strong> บนพื้นผิว ใช้ on</p>

<h3>Part 4: Question Words - 10 คะแนน</h3>

<p><strong>ข้อสอบ:</strong> _____ is your name?</p>
<p>a) Who &nbsp;&nbsp; b) What &nbsp;&nbsp; c) Where &nbsp;&nbsp; d) When</p>
<p><strong>เฉลย:</strong> b) What<br>
<strong>อธิบาย:</strong> ถามชื่อ ใช้ What</p>

<h3>Part 5: Vocabulary - 15 คะแนน</h3>

<p><strong>ข้อสอบ:</strong> Opposite of "big"</p>
<p>a) small &nbsp;&nbsp; b) large &nbsp;&nbsp; c) huge &nbsp;&nbsp; d) tall</p>
<p><strong>เฉลย:</strong> a) small</p>

<h3>Part 6: Reading Comprehension - 20 คะแนน</h3>

<p><strong>บทความ:</strong></p>
<blockquote>
My name is Sarah. I am 13 years old. I study at Bangkok School. I like English and Math. My favorite teacher is Ms. Johnson. She teaches English. After school, I usually play badminton with my friends.
</blockquote>

<p><strong>ข้อสอบ 1:</strong> How old is Sarah?</p>
<p>a) 12 &nbsp;&nbsp; b) 13 &nbsp;&nbsp; c) 14 &nbsp;&nbsp; d) 15</p>
<p><strong>เฉลย:</strong> b) 13</p>

<p><strong>ข้อสอบ 2:</strong> What does Ms. Johnson teach?</p>
<p>a) Math &nbsp;&nbsp; b) Science &nbsp;&nbsp; c) English &nbsp;&nbsp; d) Art</p>
<p><strong>เฉลย:</strong> c) English</p>

<h3>Part 7: Writing - 10 คะแนน</h3>

<p><strong>โจทย์:</strong> เขียนประโยคแนะนำตัว 3-5 ประโยค</p>

<p><strong>ตัวอย่างคำตอบ:</strong></p>
<blockquote>
My name is Tom. I am 14 years old. I study at XYZ School. My favorite subject is English. I like playing football.
</blockquote>

<h2>เทคนิคการทำข้อสอบ</h2>

<h3>1. อ่านโจทย์ให้ละเอียด</h3>
<p>อ่านทั้งประโยคก่อนเลือกตอบ อย่าเพิ่งตอบจากคำแรกที่เห็น</p>

<h3>2. จัดการเวลา</h3>
<ul>
    <li>ข้อง่าย: 30 วินาที/ข้อ</li>
    <li>ข้อยาก: 1-2 นาที/ข้อ</li>
    <li>Reading: 5-7 นาที/บทความ</li>
</ul>

<h3>3. ข้ามข้อยากไปก่อน</h3>
<p>ทำข้อง่ายก่อน แล้วค่อยกลับมาทำข้อยาก</p>

<h3>4. ตรวจสอบก่อนส่งข้อสอบ</h3>
<p>เหลือเวลา 5-10 นาที ควรตรวจทานคำตอบ</p>

<h2>หัวข้อที่ต้องอ่านก่อนสอบ</h2>
<ol>
    <li>Tenses: Present Simple, Present Continuous, Past Simple</li>
    <li>Articles: a, an, the</li>
    <li>Prepositions: in, on, at, for, since</li>
    <li>Question Words: Who, What, Where, When, Why, How</li>
    <li>Vocabulary: Opposites, Synonyms</li>
    <li>Reading: Main idea, Details</li>
</ol>',
                'category' => 'ข้อสอบ',
                'author' => 'Teacher Mike',
                'views' => 4200,
                'is_featured' => false,
                'is_active' => true,
                'published_at' => now()->subDays(15),
            ],
            [
                'title' => 'แนะนำคอร์สติวสนทนาอังกฤษ',
                'slug' => 'english-conversation-courses-guide',
                'short_description' => 'คอร์สสนทนาภาษาอังกฤษยอดนิยม เลือกแบบไหนให้เหมาะกับระดับและเป้าหมายของคุณ',
                'content' => '<h2>คอร์สสนทนาอังกฤษแบบต่างๆ</h2>

<h3>1. คอร์สสนทนาเบื้องต้น (Beginner)</h3>
<p><strong>เหมาะกับ:</strong> คนที่พูดภาษาอังกฤษไม่ได้เลย หรือน้อยมาก</p>
<p><strong>เนื้อหา:</strong></p>
<ul>
    <li>ทักทาย แนะนำตัว</li>
    <li>บอกความต้องการเบื้องต้น (I want, I like)</li>
    <li>คำศัพท์ในชีวิตประจำวัน</li>
    <li>ประโยคสั้นๆ พื้นฐาน</li>
</ul>
<p><strong>ราคา:</strong> 300-500 บาท/ชม.</p>
<p><strong>ระยะเวลา:</strong> 2-3 เดือน (24-36 ชั่วโมง)</p>

<h3>2. คอร์สสนทนาระดับกลาง (Intermediate)</h3>
<p><strong>เหมาะกับ:</strong> พูดได้บ้าง แต่ยังไม่คล่อง ไม่มั่นใจ</p>
<p><strong>เนื้อหา:</strong></p>
<ul>
    <li>สนทนาในสถานการณ์ต่างๆ (ร้านอาหาร โรงแรม)</li>
    <li>แสดงความคิดเห็น</li>
    <li>เล่าประสบการณ์</li>
    <li>แก้ไขสำเนียงและการออกเสียง</li>
</ul>
<p><strong>ราคา:</strong> 400-700 บาท/ชม.</p>
<p><strong>ระยะเวลา:</strong> 3-6 เดือน (36-72 ชั่วโมง)</p>

<h3>3. คอร์สสนทนาขั้นสูง (Advanced)</h3>
<p><strong>เหมาะกับ:</strong> พูดได้คล่อง อยากพัฒนาเพิ่มเติม</p>
<p><strong>เนื้อหา:</strong></p>
<ul>
    <li>อภิปรายประเด็นต่างๆ</li>
    <li>Debate และ Presentation</li>
    <li>Idioms และ Slang</li>
    <li>ภาษาอังกฤษเชิงธุรกิจ</li>
</ul>
<p><strong>ราคา:</strong> 600-1,000 บาท/ชม.</p>
<p><strong>ระยะเวลา:</strong> 6-12 เดือน</p>

<h3>4. คอร์สสนทนาเฉพาะทาง</h3>

<h4>A. Business English</h4>
<p><strong>เหมาะกับ:</strong> คนทำงานที่ต้องใช้ภาษาอังกฤษ</p>
<p><strong>เนื้อหา:</strong></p>
<ul>
    <li>การประชุม (Meeting)</li>
    <li>การนำเสนอ (Presentation)</li>
    <li>อีเมลธุรกิจ</li>
    <li>การเจรจาต่อรอง</li>
</ul>

<h4>B. Travel English</h4>
<p><strong>เหมาะกับ:</strong> คนที่ชอบเที่ยวต่างประเทศ</p>
<p><strong>เนื้อหา:</strong></p>
<ul>
    <li>จองโรงแรม เช็คอิน</li>
    <li>สั่งอาหาร</li>
    <li>ถามทาง</li>
    <li>ช้อปปิ้ง ต่อรองราคา</li>
</ul>

<h4>C. Interview Preparation</h4>
<p><strong>เหมาะกับ:</strong> คนที่กำลังหางานหรือเตรียมสอบสัมภาษณ์</p>
<p><strong>เนื้อหา:</strong></p>
<ul>
    <li>แนะนำตัว</li>
    <li>ตอบคำถามสัมภาษณ์</li>
    <li>การใช้ภาษาอังกฤษอย่างมืออาชีพ</li>
</ul>

<h2>วิธีเลือกคอร์สที่เหมาะกับคุณ</h2>

<h3>1. ประเมินระดับตัวเอง</h3>
<ul>
    <li>ทำแบบทดสอบวัดระดับ</li>
    <li>ลองพูดกับเจ้าของภาษาดู</li>
    <li>ปรึกษาครูเพื่อประเมินระดับ</li>
</ul>

<h3>2. กำหนดเป้าหมายให้ชัด</h3>
<ul>
    <li>ต้องการพูดเพื่ออะไร? (ทำงาน, เที่ยว, สอบ)</li>
    <li>ต้องการพูดได้ระดับไหน?</li>
    <li>มีเวลาเรียนเท่าไหร่?</li>
</ul>

<h3>3. ทดลองเรียนก่อน</h3>
<ul>
    <li>เรียนทดลอง 1-2 ครั้ง</li>
    <li>ดูว่าครูสอนตรงกับเป้าหมายไหม</li>
    <li>สไตล์การสอนเหมาะกับตัวเองไหม</li>
</ul>

<h2>เทคนิคฝึกพูดให้คล่อง</h2>

<h3>1. พูดทุกวัน</h3>
<p>แม้แค่ 10-15 นาที แต่ทำสม่ำเสมอ</p>

<h3>2. อย่ากลัวผิด</h3>
<p>ยิ่งพูดผิด ยิ่งเรียนรู้เร็ว</p>

<h3>3. บันทึกเสียงตัวเอง</h3>
<p>ฟังย้อนหลังเพื่อหาจุดพัฒนา</p>

<h3>4. ดูหนัง ฟังเพลง</h3>
<p>เรียนรู้สำนวนและการใช้ภาษาจริง</p>

<h3>5. หาเพื่อนคุยภาษาอังกฤษ</h3>
<p>ฝึกพูดกับเจ้าของภาษาหรือคนที่เรียนอยู่เหมือนกัน</p>

<h2>คอร์สแนะนำบน EngBuddy</h2>

<table border="1" style="width:100%; border-collapse: collapse;">
<tr>
    <th>คอร์ส</th>
    <th>ระดับ</th>
    <th>ระยะเวลา</th>
    <th>ราคา</th>
</tr>
<tr>
    <td>Conversation Beginner</td>
    <td>เริ่มต้น</td>
    <td>2-3 เดือน</td>
    <td>300 บาท/ชม.</td>
</tr>
<tr>
    <td>Daily Conversation</td>
    <td>กลาง</td>
    <td>3-6 เดือน</td>
    <td>500 บาท/ชม.</td>
</tr>
<tr>
    <td>Business English</td>
    <td>สูง</td>
    <td>6+ เดือน</td>
    <td>700 บาท/ชม.</td>
</tr>
<tr>
    <td>Travel English</td>
    <td>กลาง</td>
    <td>1-2 เดือน</td>
    <td>400 บาท/ชม.</td>
</tr>
</table>

<h2>สรุป</h2>
<p>การเลือกคอร์สสนทนาอังกฤษที่ดี <strong>ต้องเริ่มจากการประเมินตัวเองและกำหนดเป้าหมาย</strong> แล้วเลือกคอร์สที่ตรงกับความต้องการ <strong>อย่าลืมฝึกพูดสม่ำเสมอ</strong> เพราะสนทนาต้องพูดบ่อยๆ ถึงจะคล่อง!</p>',
                'category' => 'คอร์สเรียน',
                'author' => 'Teacher Sarah',
                'views' => 1920,
                'is_featured' => false,
                'is_active' => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'เรียนอังกฤษออนไลน์ราคาถูก 2025',
                'slug' => 'affordable-online-english-courses-2025',
                'short_description' => 'รวมแพลตฟอร์มเรียนภาษาอังกฤษออนไลน์ราคาประหยัด มีคุณภาพ เหมาะกับทุกงบประมาณ',
                'content' => '<h2>แพลตฟอร์มเรียนภาษาอังกฤษออนไลน์ราคาถูก ปี 2025</h2>

<h3>1. EngBuddy (แนะนำ!)</h3>
<p><strong>ราคา:</strong> เริ่มต้น 300 บาท/ชั่วโมง</p>
<p><strong>จุดเด่น:</strong></p>
<ul>
    <li>ครูไทยและเจ้าของภาษา</li>
    <li>เรียน 1:1 ส่วนตัว</li>
    <li>เลือกเวลาเรียนได้เอง</li>
    <li>รีวิวครูจริงจากนักเรียน</li>
</ul>
<p><strong>เหมาะกับ:</strong> ทุกระดับ ทุกอายุ</p>

<h3>2. YouTube (ฟรี!)</h3>
<p><strong>ราคา:</strong> ฟรี</p>
<p><strong>Channel แนะนำ:</strong></p>
<ul>
    <li><strong>English with Lucy</strong> - เรียนรู้ British English</li>
    <li><strong>Learn English with TV Series</strong> - เรียนจากซีรีย์</li>
    <li><strong>Rachel\'s English</strong> - ฝึกออกเสียงอเมริกัน</li>
    <li><strong>BBC Learning English</strong> - เนื้อหาคุณภาพสูง</li>
</ul>
<p><strong>เหมาะกับ:</strong> คนที่มีวินัย เรียนรู้ด้วยตนเองได้</p>

<h3>3. Duolingo (ฟรี + Pro)</h3>
<p><strong>ราคา:</strong> ฟรี (มีโฆษณา) หรือ Pro 299 บาท/เดือน</p>
<p><strong>จุดเด่น:</strong></p>
<ul>
    <li>เกมมีฟาย เล่นสนุก</li>
    <li>เรียนได้ทุกที่ ทุกเวลา</li>
    <li>ระบบติดตามความก้าวหน้า</li>
</ul>
<p><strong>เหมาะกับ:</strong> ผู้เริ่มต้น เด็ก</p>

<h3>4. Preply</h3>
<p><strong>ราคา:</strong> 150-800 บาท/ชั่วโมง (ขึ้นกับครู)</p>
<p><strong>จุดเด่น:</strong></p>
<ul>
    <li>ครูเจ้าของภาษาจากทั่วโลก</li>
    <li>เรียน 1:1 ออนไลน์</li>
    <li>เลือกครูตามงบประมาณ</li>
</ul>
<p><strong>ข้อเสีย:</strong> ครูราคาถูกอาจสอนไม่ดี</p>

<h3>5. Cambly</h3>
<p><strong>ราคา:</strong> แพ็กเกจเริ่มต้น 1,500 บาท/เดือน</p>
<p><strong>จุดเด่น:</strong></p>
<ul>
    <li>ครูเจ้าของภาษา 100%</li>
    <li>เรียนได้ทันที ไม่ต้องนัดล่วงหน้า</li>
    <li>บันทึกวิดีโอทบทวนได้</li>
</ul>
<p><strong>เหมาะกับ:</strong> คนที่ต้องการฝึกพูดกับเจ้าของภาษา</p>

<h3>6. iTalki</h3>
<p><strong>ราคา:</strong> 100-600 บาท/ชั่วโมง</p>
<p><strong>จุดเด่น:</strong></p>
<ul>
    <li>ครูเยอะมาก เลือกได้เพียบ</li>
    <li>มีทั้ง Professional Teacher และ Community Tutor (ถูกกว่า)</li>
    <li>เรียนทดลองถูกมาก (50-100 บาท)</li>
</ul>

<h3>7. Elsa Speak</h3>
<p><strong>ราคา:</strong> Pro 1,900 บาท/ปี</p>
<p><strong>จุดเด่น:</strong></p>
<ul>
    <li>ฝึกออกเสียงด้วย AI</li>
    <li>วิเคราะห์สำเนียงแม่นมาก</li>
    <li>เหมาะกับคนที่ต้องการแก้สำเนียง</li>
</ul>

<h3>8. Khan Academy (ฟรี!)</h3>
<p><strong>ราคา:</strong> ฟรี 100%</p>
<p><strong>จุดเด่น:</strong></p>
<ul>
    <li>เนื้อหาคุณภาพสูง</li>
    <li>มีวิดีโอสอนและแบบฝึกหัด</li>
    <li>เหมาะกับเด็กและวัยรุ่น</li>
</ul>

<h2>เปรียบเทียบราคา</h2>

<table border="1" style="width:100%; border-collapse: collapse;">
<tr>
    <th>แพลตฟอร์ม</th>
    <th>ราคา/เดือน</th>
    <th>ระบบ</th>
    <th>คุณภาพ</th>
</tr>
<tr>
    <td>YouTube</td>
    <td>ฟรี</td>
    <td>วิดีโอ</td>
    <td>⭐⭐⭐⭐</td>
</tr>
<tr>
    <td>Duolingo Free</td>
    <td>ฟรี</td>
    <td>แอป</td>
    <td>⭐⭐⭐</td>
</tr>
<tr>
    <td>EngBuddy</td>
    <td>1,200-2,400</td>
    <td>1:1 ครู</td>
    <td>⭐⭐⭐⭐⭐</td>
</tr>
<tr>
    <td>Cambly</td>
    <td>1,500+</td>
    <td>1:1 ครู</td>
    <td>⭐⭐⭐⭐</td>
</tr>
<tr>
    <td>iTalki</td>
    <td>400-2,400</td>
    <td>1:1 ครู</td>
    <td>⭐⭐⭐⭐</td>
</tr>
</table>

<h2>เทคนิคประหยัดค่าเรียน</h2>

<h3>1. เริ่มจากแหล่งฟรีก่อน</h3>
<p>ใช้ YouTube, Duolingo ฟรี สร้างพื้นฐานก่อน แล้วค่อยไปเรียนกับครู</p>

<h3>2. ซื้อแพ็กเกจยาวๆ</h3>
<p>แพ็กเกจ 6 เดือน, 1 ปี ถูกกว่าจ่ายรายเดือน</p>

<h3>3. เลือก Community Tutor</h3>
<p>บน iTalki, Preply มีครูราคาถูก (100-200 บาท/ชม.)</p>

<h3>4. เรียนกลุ่ม</h3>
<p>แบ่งค่าครูกับเพื่อนๆ ราคาถูกลง 50%</p>

<h3>5. ใช้โปรโมชั่น</h3>
<p>รอช่วง Sale เช่น 11.11, Black Friday ลดได้ถึง 50%</p>

<h2>แผนเรียนแบบประหยัด</h2>

<h3>เดือนที่ 1-3: พื้นฐาน (ฟรี)</h3>
<ul>
    <li>YouTube: ดูวิดีโอ Grammar พื้นฐาน</li>
    <li>Duolingo: ฝึกคำศัพท์ทุกวัน 15 นาที</li>
    <li>ค่าใช้จ่าย: 0 บาท</li>
</ul>

<h3>เดือนที่ 4-6: พัฒนา (300-500 บาท/เดือน)</h3>
<ul>
    <li>iTalki Community Tutor: 2 ชั่วโมง/เดือน</li>
    <li>Elsa Speak Pro: ฝึกออกเสียง</li>
    <li>ค่าใช้จ่าย: 400 บาท/เดือน</li>
</ul>

<h3>เดือนที่ 7+: ฝึกพูด (1,000-1,500 บาท/เดือน)</h3>
<ul>
    <li>EngBuddy: 4 ชั่วโมง/เดือน</li>
    <li>YouTube: ดูซีรีย์/หนังฝึกฟัง</li>
    <li>ค่าใช้จ่าย: 1,200 บาท/เดือน</li>
</ul>

<h2>สรุป</h2>
<p>เรียนภาษาอังกฤษออนไลน์ไม่จำเป็นต้องแพง! <strong>ถ้ามีวินัย เริ่มจากฟรีก็ได้</strong> แต่ถ้าอยากพัฒนาเร็ว <strong>ควรมีครูช่วยสอน 1:1 สักเดือนละ 2-4 ชั่วโมง</strong> งบ 1,000-2,000 บาท/เดือน ก็เรียนได้มีคุณภาพแล้ว!</p>',
                'category' => 'เรียนออนไลน์',
                'author' => 'EngBuddy Team',
                'views' => 3450,
                'is_featured' => true,
                'is_active' => true,
                'published_at' => now()->subDays(1),
            ],
            [
                'title' => 'ติวสอบสัมภาษณ์อังกฤษที่ใช้จริง',
                'slug' => 'english-job-interview-preparation-tips',
                'short_description' => 'เทคนิคตอบคำถามสัมภาษณ์งานภาษาอังกฤษ พร้อมตัวอย่างคำตอบที่ใช้ได้จริง',
                'content' => '<h2>คำถามสัมภาษณ์ที่ถูกถามบ่อยที่สุด</h2>

<h3>1. Tell me about yourself (แนะนำตัว)</h3>
<p><strong>เทคนิค:</strong> พูดสั้นๆ 1-2 นาที โครงสร้าง Past → Present → Future</p>

<p><strong>ตัวอย่างคำตอบ:</strong></p>
<blockquote>
"I graduated from Chulalongkorn University with a degree in Business Administration. Currently, I work as a Marketing Coordinator at ABC Company, where I manage social media campaigns and analyze customer data. I\'m looking for new opportunities to grow my skills in digital marketing, which is why I\'m very interested in this position."
</blockquote>

<h3>2. What are your strengths? (จุดแข็ง)</h3>
<p><strong>เทคนิค:</strong> เลือก 2-3 จุดแข็งที่เกี่ยวข้องกับงาน + ยกตัวอย่างประกอบ</p>

<p><strong>ตัวอย่างคำตอบ:</strong></p>
<blockquote>
"My biggest strength is problem-solving. In my previous role, I identified a gap in our customer service process and developed a new system that reduced response time by 30%. I\'m also a strong communicator and work well in team environments."
</blockquote>

<h3>3. What are your weaknesses? (จุดอ่อน)</h3>
<p><strong>เทคนิค:</strong> เลือกจุดอ่อนจริง แต่บอกว่ากำลังพัฒนา</p>

<p><strong>ตัวอย่างคำตอบ:</strong></p>
<blockquote>
"I tend to be a perfectionist, which sometimes slows me down. However, I\'ve been working on this by setting clearer deadlines for myself and learning to prioritize tasks more effectively. I\'ve found that using project management tools like Trello has really helped me improve in this area."
</blockquote>

<h3>4. Why do you want to work here? (ทำไมอยากทำงานที่นี่)</h3>
<p><strong>เทคนิค:</strong> ศึกษาบริษัทก่อน + บอกว่าเหมาะกับเป้าหมาย</p>

<p><strong>ตัวอย่างคำตอบ:</strong></p>
<blockquote>
"I\'ve been following your company\'s growth for the past year, and I\'m impressed by your innovative approach to sustainable technology. Your company values align with mine, and I believe this role would allow me to contribute my skills while learning from industry leaders. I\'m particularly excited about the opportunity to work on your new AI project."
</blockquote>

<h3>5. Where do you see yourself in 5 years? (เป้าหมาย 5 ปี)</h3>
<p><strong>เทคนิค:</strong> แสดงความทะเยอทะยาน แต่สมจริง + เชื่อมโยงกับบริษัท</p>

<p><strong>ตัวอย่างคำตอบ:</strong></p>
<blockquote>
"In five years, I see myself as a senior team member who has made significant contributions to the company\'s growth. I\'d like to have developed expertise in data analytics and perhaps taken on a leadership role, mentoring junior team members. I believe this position would be an excellent stepping stone toward those goals."
</blockquote>

<h3>6. Why should we hire you? (ทำไมควรจ้างคุณ)</h3>
<p><strong>เทคนิค:</strong> สรุป Skills + Experience + Motivation</p>

<p><strong>ตัวอย่างคำตอบ:</strong></p>
<blockquote>
"You should hire me because I bring both the technical skills and the passion this role requires. My 3 years of experience in project management, combined with my proven track record of delivering projects on time and under budget, make me an ideal fit. More importantly, I\'m genuinely excited about your company\'s mission and eager to contribute to your team\'s success."
</blockquote>

<h2>คำถามเจาะลึกเฉพาะทาง</h2>

<h3>สำหรับตำแหน่ง Marketing</h3>
<p><strong>Q:</strong> "How do you measure the success of a marketing campaign?"</p>
<p><strong>A:</strong> "I measure success through a combination of KPIs including ROI, conversion rates, engagement metrics, and customer acquisition costs. I believe in setting clear objectives at the beginning and using data analytics tools to track progress."</p>

<h3>สำหรับตำแหน่ง IT/Developer</h3>
<p><strong>Q:</strong> "Describe a challenging project you worked on."</p>
<p><strong>A:</strong> "I worked on developing a mobile app with tight deadlines. The challenge was integrating multiple APIs while maintaining app performance. I solved this by implementing asynchronous processing and thorough testing, which resulted in a successful launch."</p>

<h2>ประโยคที่ควรจำ</h2>

<h3>เริ่มต้นสัมภาษณ์</h3>
<ul>
    <li>"Thank you for giving me this opportunity."</li>
    <li>"I\'m excited to learn more about this position."</li>
</ul>

<h3>ตอบคำถาม</h3>
<ul>
    <li>"That\'s a great question..."</li>
    <li>"In my experience..."</li>
    <li>"For example..."</li>
    <li>"What I learned from that was..."</li>
</ul>

<h3>ถามคำถามกลับ</h3>
<ul>
    <li>"What does a typical day look like in this role?"</li>
    <li>"What are the biggest challenges facing the team?"</li>
    <li>"What opportunities for professional development does the company offer?"</li>
</ul>

<h3>จบสัมภาษณ์</h3>
<ul>
    <li>"Thank you for your time today."</li>
    <li>"I\'m very interested in this opportunity."</li>
    <li>"I look forward to hearing from you."</li>
</ul>

<h2>เทคนิค STAR Method</h2>
<p>ใช้ตอบคำถามเกี่ยวกับประสบการณ์</p>

<ul>
    <li><strong>S</strong>ituation: อธิบายสถานการณ์</li>
    <li><strong>T</strong>ask: บอกหน้าที่/ปัญหา</li>
    <li><strong>A</strong>ction: อธิบายว่าทำอะไร</li>
    <li><strong>R</strong>esult: บอกผลลัพธ์</li>
</ul>

<p><strong>ตัวอย่าง:</strong></p>
<blockquote>
<strong>S:</strong> "Last year, our team was facing declining sales."<br>
<strong>T:</strong> "I was tasked with developing a new customer retention strategy."<br>
<strong>A:</strong> "I analyzed customer feedback, identified pain points, and implemented a loyalty program."<br>
<strong>R:</strong> "Within 6 months, we saw a 25% increase in repeat customers."
</blockquote>

<h2>ข้อควรระวัง</h2>

<h3>อย่าทำ:</h3>
<ul>
    <li>❌ พูดลอยๆ ไม่มีตัวอย่างประกอบ</li>
    <li>❌ พูดเยอะเกินไป (เกิน 3-4 นาที)</li>
    <li>❌ พูดจาลบหลู่บริษัทเก่า</li>
    <li>❌ โกหก/พูดเกินจริง</li>
    <li>❌ บอกว่า "I don\'t have any weaknesses"</li>
</ul>

<h3>ควรทำ:</h3>
<ul>
    <li>✅ ศึกษาบริษัทก่อนสัมภาษณ์</li>
    <li>✅ เตรียมตัวอย่างประกอบ</li>
    <li>✅ พูดด้วยความมั่นใจ</li>
    <li>✅ ฟังคำถามให้ชัดก่อนตอบ</li>
    <li>✅ รักษาสายตา Body language ที่ดี</li>
</ul>

<h2>การเตรียมตัวก่อนสัมภาษณ์</h2>

<ol>
    <li><strong>ศึกษาบริษัท</strong> - เว็บไซต์ LinkedIn ข่าว</li>
    <li><strong>เตรียมคำตอบ</strong> - เขียนโครงร่างคำตอบ</li>
    <li><strong>ฝึกพูด</strong> - พูดหน้ากระจก หรือให้เพื่อนฟัง</li>
    <li><strong>เตรียมคำถาม</strong> - อย่างน้อย 3-5 คำถาม</li>
    <li><strong>แต่งกายเหมาะสม</strong> - Business casual หรือ Formal</li>
</ol>

<h2>หลังสัมภาษณ์</h2>
<p>ส่งอีเมล Thank you note ภายใน 24 ชั่วโมง:</p>

<blockquote>
Subject: Thank You - [ชื่อตำแหน่ง] Interview<br><br>

Dear [ชื่อผู้สัมภาษณ์],<br><br>

Thank you for taking the time to meet with me today. I enjoyed learning more about the [ตำแหน่ง] position and [ชื่อบริษัท]. Our conversation reinforced my interest in this opportunity.<br><br>

I\'m confident that my skills and experience would make me a valuable addition to your team. Please don\'t hesitate to contact me if you need any additional information.<br><br>

I look forward to hearing from you.<br><br>

Best regards,<br>
[ชื่อคุณ]
</blockquote>

<h2>สรุป</h2>
<p>การเตรียมตัวสัมภาษณ์ที่ดี = <strong>ศึกษาบริษัท + เตรียมคำตอบ + ฝึกพูด</strong> อย่าลืมใช้ <strong>STAR Method</strong> และมีความมั่นใจในตัวเอง Good luck!</p>',
                'category' => 'สัมภาษณ์งาน',
                'author' => 'Teacher David',
                'views' => 2890,
                'is_featured' => false,
                'is_active' => true,
                'published_at' => now()->subDays(8),
            ],
            [
                'title' => 'สอนอังกฤษสำหรับเด็ก 6–12 ขวบ',
                'slug' => 'teaching-english-for-kids-6-12-years',
                'short_description' => 'วิธีสอนภาษาอังกฤษให้เด็กประถม ด้วยกิจกรรมสนุกๆ ที่ช่วยให้เด็กเรียนรู้อย่างมีความสุข',
                'content' => '<h2>หลักการสอนอังกฤษสำหรับเด็ก</h2>

<h3>1. เรียนผ่านการเล่น (Learning through Play)</h3>
<p>เด็กวัยนี้เรียนรู้ได้ดีที่สุดผ่านการเล่นและกิจกรรมสนุกๆ</p>

<h3>2. ใช้ภาพและเสียง</h3>
<p>เด็กจดจำได้ดีกับสิ่งที่มองเห็นและได้ยิน</p>

<h3>3. ทำซ้ำๆ (Repetition)</h3>
<p>ฝึกซ้ำในหลายรูปแบบเพื่อให้จดจำ</p>

<h3>4. ชมเชยและให้กำลังใจ</h3>
<p>Positive reinforcement ช่วยสร้างแรงจูงใจ</p>

<h2>กิจกรรมสอนตามช่วงอายุ</h2>

<h3>อายุ 6-8 ขวบ (ป.1-ป.3)</h3>

<h4>คำศัพท์พื้นฐาน</h4>
<ul>
    <li>สี, ตัวเลข, ผลไม้, สัตว์</li>
    <li>ครอบครัว, ของใช้ในบ้าน</li>
    <li>ส่วนของร่างกาย</li>
</ul>

<h4>กิจกรรมแนะนำ:</h4>
<ul>
    <li><strong>Flashcards</strong> - บัตรคำศัพท์มีภาพ</li>
    <li><strong>TPR (Total Physical Response)</strong> - เรียนผ่านการเคลื่อนไหว</li>
    <li><strong>เพลง</strong> - ABC Song, Number Song, Color Song</li>
    <li><strong>เกม Bingo</strong> - ช่วยฝึกการฟังและจดจำ</li>
</ul>

<h3>อายุ 9-12 ขวบ (ป.4-ป.6)</h3>

<h4>คำศัพท์ขั้นสูง</h4>
<ul>
    <li>กริยา (Verbs) ต่างๆ</li>
    <li>คำคุณศัพท์ (Adjectives)</li>
    <li>Prepositions (in, on, under)</li>
    <li>ประโยคง่ายๆ</li>
</ul>

<h4>กิจกรรมแนะนำ:</h4>
<ul>
    <li><strong>Story Time</strong> - อ่านนิทานภาษาอังกฤษ</li>
    <li><strong>Role Play</strong> - แสดงบทบาทสมมติ</li>
    <li><strong>Board Games</strong> - Scrabble Junior, Pictionary</li>
    <li><strong>คาราโอเกะภาษาอังกฤษ</strong> - ร้องเพลงพร้อมดูเนื้อเพลง</li>
</ul>

<h2>กิจกรรมรายวัน 15 นาที</h2>

<h3>วันจันทร์: Vocabulary Day</h3>
<ul>
    <li>สอนคำศัพท์ใหม่ 5-10 คำ</li>
    <li>ใช้ Flashcards พร้อมรูปภาพ</li>
    <li>ทบทวนด้วยเกม Memory Card</li>
</ul>

<h3>วันอังคาร: Song & Rhyme Day</h3>
<ul>
    <li>ร้องเพลงภาษาอังกฤษ</li>
    <li>ท่องคำกลอนสั้นๆ (Nursery Rhymes)</li>
    <li>ทำท่าประกอบ</li>
</ul>

<h3>วันพุธ: Game Day</h3>
<ul>
    <li>I Spy: "I spy with my little eye, something blue"</li>
    <li>Simon Says: ฝึกคำสั่ง</li>
    <li>Charades: ทายคำจากการแสดงท่า</li>
</ul>

<h3>วันพฤหัสบดี: Story Day</h3>
<ul>
    <li>อ่านนิทานภาษาอังกฤษ</li>
    <li>ถามคำถามเกี่ยวกับเรื่อง</li>
    <li>ให้เด็กเล่าเรื่องที่อ่าน</li>
</ul>

<h3>วันศุกร์: Review & Fun Day</h3>
<ul>
    <li>ทบทวนสิ่งที่เรียนทั้งสัปดาห์</li>
    <li>ดูการ์ตูนภาษาอังกฤษ</li>
    <li>เล่นเกมที่เด็กชอบ</li>
</ul>

<h2>เกมสอนภาษาอังกฤษ</h2>

<h3>1. Flashcard Race</h3>
<p>แบ่งเด็กเป็น 2 ทีม แข่งกันหยิบ Flashcard ที่ครูเรียก</p>

<h3>2. Hot Potato</h3>
<p>ส่งต่อลูกบอล ตอบคำถามภาษาอังกฤษเมื่อเพลงหยุด</p>

<h3>3. Musical Chairs</h3>
<p>เก้าอี้ดนตรี แต่เวลานั่งต้องพูดคำศัพท์ที่ครูกำหนด</p>

<h3>4. Scavenger Hunt</h3>
<p>ให้เด็กหาของตามรายการภาษาอังกฤษ "Find something red"</p>

<h3>5. Pictionary</h3>
<p>วาดรูป ให้เพื่อนทายคำภาษาอังกฤษ</p>

<h2>แอปและเว็บไซต์แนะนำ</h2>

<table border="1" style="width:100%; border-collapse: collapse;">
<tr>
    <th>แอป/เว็บ</th>
    <th>อายุ</th>
    <th>ฟีเจอร์</th>
</tr>
<tr>
    <td>Starfall</td>
    <td>6-8 ปี</td>
    <td>Phonics, Reading</td>
</tr>
<tr>
    <td>ABCmouse</td>
    <td>6-10 ปี</td>
    <td>เกมการศึกษา</td>
</tr>
<tr>
    <td>Duolingo ABC</td>
    <td>6-9 ปี</td>
    <td>Reading, Writing</td>
</tr>
<tr>
    <td>Fun English</td>
    <td>6-12 ปี</td>
    <td>เกม, เพลง</td>
</tr>
</table>

<h2>การ์ตูน/ซีรีย์ภาษาอังกฤษแนะนำ</h2>

<h3>อายุ 6-8 ปี</h3>
<ul>
    <li>Peppa Pig - ง่าย คำศัพท์ชีวิตประจำวัน</li>
    <li>Bluey - สนุก เรียนรู้สำนวนภาษา</li>
    <li>Little Einsteins - ดนตรี + ศิลปะ</li>
</ul>

<h3>อายุ 9-12 ปี</h3>
<ul>
    <li>Adventure Time - สนุก คำศัพท์หลากหลาย</li>
    <li>Avatar: The Last Airbender - เนื้อเรื่องดี ภาษาชัดเจน</li>
    <li>Wild Kratts - เรียนรู้เรื่องสัตว์</li>
</ul>

<h2>เทคนิคสำหรับผู้ปกครอง</h2>

<h3>1. สร้างสภาพแวดล้อม</h3>
<ul>
    <li>ติดป้ายภาษาอังกฤษในบ้าน (Door, Window, Table)</li>
    <li>เล่นเพลงภาษาอังกฤษขณะเล่น</li>
    <li>มีหนังสือภาษาอังกฤษในบ้าน</li>
</ul>

<h3>2. อย่าบังคับ</h3>
<ul>
    <li>ให้เด็กเรียนในจังหวะที่พร้อม</li>
    <li>ถ้าเด็กไม่อยากเรียน ให้หยุดพัก</li>
    <li>เน้นความสนุก ไม่ใช่การสอบ</li>
</ul>

<h3>3. ชมเชยอย่างจริงใจ</h3>
<ul>
    <li>"Good job!"</li>
    <li>"Excellent!"</li>
    <li>"You\'re doing great!"</li>
</ul>

<h3>4. พูดภาษาอังกฤษบ้าง</h3>
<ul>
    <li>"Good morning!"</li>
    <li>"Let\'s eat!" (กินข้าวกันเถอะ)</li>
    <li>"Time to sleep!" (ถึงเวลานอน)</li>
</ul>

<h2>ตารางเรียน 1 สัปดาห์</h2>

<table border="1" style="width:100%; border-collapse: collapse;">
<tr>
    <th>วัน</th>
    <th>กิจกรรม</th>
    <th>เวลา</th>
</tr>
<tr>
    <td>จันทร์</td>
    <td>Flashcards + เพลง</td>
    <td>15 นาที</td>
</tr>
<tr>
    <td>อังคาร</td>
    <td>Game (Simon Says)</td>
    <td>15 นาที</td>
</tr>
<tr>
    <td>พุธ</td>
    <td>Story Time</td>
    <td>20 นาที</td>
</tr>
<tr>
    <td>พฤหัสบดี</td>
    <td>ดูการ์ตูน + ถามคำถาม</td>
    <td>20 นาที</td>
</tr>
<tr>
    <td>ศุกร์</td>
    <td>Review + เกมสนุกๆ</td>
    <td>15 นาที</td>
</tr>
<tr>
    <td>เสาร์</td>
    <td>ศิลปะ (วาดรูป + พูดภาษาอังกฤษ)</td>
    <td>30 นาที</td>
</tr>
<tr>
    <td>อาทิตย์</td>
    <td>ครอบครัวร้องเพลง/ดูหนัง</td>
    <td>30 นาที</td>
</tr>
</table>

<h2>สรุป</h2>
<p>การสอนภาษาอังกฤษให้เด็ก <strong>ต้องสนุก ไม่ควรเครียด</strong> ใช้เวลาแค่ <strong>15-30 นาที/วัน</strong> ด้วยกิจกรรมหลากหลาย เด็กจะเรียนรู้อย่างมีความสุขและพัฒนาภาษาอังกฤษอย่างเป็นธรรมชาติ!</p>',
                'category' => 'เด็ก',
                'author' => 'Teacher Emma',
                'views' => 3580,
                'is_featured' => true,
                'is_active' => true,
                'published_at' => now()->subDays(4),
            ],
        ];

        foreach ($articles as $articleData) {
            Student_article::create($articleData);
        }

        $this->command->info('สร้างข้อมูล 10 บทความใน student_articles สำเร็จ!');
    }
}
