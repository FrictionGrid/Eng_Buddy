<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tutor_course;

class TutorCoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'subject' => 'TOEIC Preparation',
                'description' => 'เตรียมสอบ TOEIC เป้าหมาย 600+ สำหรับคนทำงาน',
                'location' => 'ออนไลน์ (Zoom)',
                'day' => 'จันทร์, พุธ, ศุกร์',
                'time' => '19:00-20:30',
                'rate' => 500,
                'job_code' => 'TC001',
                'status' => 'ใหม่',
            ],
            [
                'subject' => 'IELTS Speaking & Writing',
                'description' => 'เน้นฝึก Speaking และ Writing สำหรับสอบ IELTS',
                'location' => 'สยามสแควร์, กรุงเทพฯ',
                'day' => 'อาทิตย์',
                'time' => '10:00-12:00',
                'rate' => 800,
                'job_code' => 'TC002',
                'status' => 'ใหม่',
            ],
            [
                'subject' => 'English Conversation for Kids',
                'description' => 'สนทนาภาษาอังกฤษสำหรับเด็ก อายุ 6-10 ปี',
                'location' => 'บางนา, กรุงเทพฯ',
                'day' => 'เสาร์',
                'time' => '09:00-10:30',
                'rate' => 400,
                'job_code' => 'TC003',
                'status' => 'ใหม่',
            ],
            [
                'subject' => 'Business English',
                'description' => 'ภาษาอังกฤษธุรกิจ สำหรับผู้บริหารและพนักงานออฟฟิศ',
                'location' => 'อาคารสาทร, กรุงเทพฯ',
                'day' => 'อังคาร, พฤหัสบดี',
                'time' => '18:00-19:30',
                'rate' => 700,
                'job_code' => 'TC004',
                'status' => 'ใหม่',
            ],
            [
                'subject' => 'Grammar Foundation ม.ต้น',
                'description' => 'พื้นฐานแกรมม่าร์สำหรับนักเรียน ม.1-ม.3',
                'location' => 'ลาดพร้าว, กรุงเทพฯ',
                'day' => 'พุธ, ศุกร์',
                'time' => '16:00-17:30',
                'rate' => 450,
                'job_code' => 'TC005',
                'status' => 'ใหม่',
            ],
            [
                'subject' => 'TOEFL iBT Intensive',
                'description' => 'เตรียมสอบ TOEFL แบบเข้มข้น เป้าหมาย 90+',
                'location' => 'ออนไลน์ (Google Meet)',
                'day' => 'เสาร์, อาทิตย์',
                'time' => '13:00-15:00',
                'rate' => 900,
                'job_code' => 'TC006',
                'status' => 'ใหม่',
            ],
            [
                'subject' => 'Phonics for Beginners',
                'description' => 'สอนการออกเสียง Phonics สำหรับเด็กเริ่มต้น',
                'location' => 'รามคำแหง, กรุงเทพฯ',
                'day' => 'อังคาร, พฤหัสบดี',
                'time' => '15:00-16:00',
                'rate' => 350,
                'job_code' => 'TC007',
                'status' => 'ใหม่',
            ],
            [
                'subject' => 'IELTS ติวเข้มทุกส่วน',
                'description' => 'ติว IELTS ครบทุกส่วน เป้าหมาย Band 7.0+',
                'location' => 'เชียงใหม่',
                'day' => 'จันทร์-ศุกร์',
                'time' => '17:00-19:00',
                'rate' => 750,
                'job_code' => 'TC008',
                'status' => 'ใหม่',
            ],
            [
                'subject' => 'English for Travel',
                'description' => 'ภาษาอังกฤษสำหรับการเดินทางท่องเที่ยว',
                'location' => 'ออนไลน์',
                'day' => 'อาทิตย์',
                'time' => '14:00-15:30',
                'rate' => 400,
                'job_code' => 'TC009',
                'status' => 'ใหม่',
            ],
            [
                'subject' => 'English ม.ปลาย เตรียมสอบเข้ามหาวิทยาลัย',
                'description' => 'ติวภาษาอังกฤษ ม.4-ม.6 เน้นเตรียมสอบ GAT/PAT',
                'location' => 'พระราม 9, กรุงเทพฯ',
                'day' => 'เสาร์',
                'time' => '10:00-12:00',
                'rate' => 600,
                'job_code' => 'TC010',
                'status' => 'ใหม่',
            ],
            [
                'subject' => 'Conversation Practice - Intermediate',
                'description' => 'ฝึกสนทนาภาษาอังกฤษระดับกลาง',
                'location' => 'ออนไลน์',
                'day' => 'จันทร์, พุธ',
                'time' => '20:00-21:00',
                'rate' => 350,
                'job_code' => 'TC011',
                'status' => 'ใหม่',
            ],
            [
                'subject' => 'Writing for University',
                'description' => 'Academic Writing สำหรับนักศึกษามหาวิทยาลัย',
                'location' => 'ธรรมศาสตร์ ท่าพระจันทร์',
                'day' => 'อาทิตย์',
                'time' => '13:00-15:00',
                'rate' => 550,
                'job_code' => 'TC012',
                'status' => 'ปิดงาน',
            ],
            [
                'subject' => 'English for IT Professionals',
                'description' => 'ภาษาอังกฤษสำหรับโปรแกรมเมอร์และนักพัฒนา',
                'location' => 'ออนไลน์',
                'day' => 'พฤหัสบดี',
                'time' => '20:00-21:30',
                'rate' => 650,
                'job_code' => 'TC013',
                'status' => 'ใหม่',
            ],
            [
                'subject' => 'TOEIC Listening & Reading',
                'description' => 'เน้นฝึก Listening และ Reading เพื่อเตรียมสอบ TOEIC',
                'location' => 'ออนไลน์',
                'day' => 'อังคาร, ศุกร์',
                'time' => '19:00-20:30',
                'rate' => 500,
                'job_code' => 'TC014',
                'status' => 'ใหม่',
            ],
            [
                'subject' => 'English Pronunciation & Accent',
                'description' => 'แก้สำเนียง ฝึกออกเสียงให้ชัดเจน',
                'location' => 'ออนไลน์',
                'day' => 'เสาร์',
                'time' => '16:00-17:30',
                'rate' => 450,
                'job_code' => 'TC015',
                'status' => 'ใหม่',
            ],
            [
                'subject' => 'English Camp for Kids (Summer)',
                'description' => 'แคมป์ภาษาอังกฤษช่วงปิดเทอม อายุ 8-12 ปี',
                'location' => 'หัวหิน, ประจวบคีรีขันธ์',
                'day' => 'จันทร์-ศุกร์',
                'time' => '09:00-16:00',
                'rate' => 1200,
                'job_code' => 'TC016',
                'status' => 'ใหม่',
            ],
            [
                'subject' => 'IELTS Speaking Only',
                'description' => 'เน้นเฉพาะ Speaking เตรียมสอบ IELTS',
                'location' => 'ออนไลน์',
                'day' => 'อาทิตย์',
                'time' => '10:00-11:30',
                'rate' => 600,
                'job_code' => 'TC017',
                'status' => 'ใหม่',
            ],
            [
                'subject' => 'English for Medical Students',
                'description' => 'ภาษาอังกฤษทางการแพทย์สำหรับนักศึกษาแพทย์',
                'location' => 'มหิดล ศาลายา',
                'day' => 'เสาร์',
                'time' => '14:00-16:00',
                'rate' => 800,
                'job_code' => 'TC018',
                'status' => 'ปิดงาน',
            ],
            [
                'subject' => 'English Reading Comprehension',
                'description' => 'ฝึกทักษะการอ่านและเข้าใจ สำหรับนักเรียน ม.ต้น',
                'location' => 'ออนไลน์',
                'day' => 'พุธ',
                'time' => '17:00-18:00',
                'rate' => 350,
                'job_code' => 'TC019',
                'status' => 'ใหม่',
            ],
            [
                'subject' => 'General English - All Levels',
                'description' => 'ภาษาอังกฤษทั่วไป ปรับระดับตามความเหมาะสม',
                'location' => 'พัทยา, ชลบุรี',
                'day' => 'อังคาร, พฤหัสบดี',
                'time' => '18:30-20:00',
                'rate' => 500,
                'job_code' => 'TC020',
                'status' => 'ใหม่',
            ],
        ];

        foreach ($courses as $course) {
            Tutor_course::create($course);
        }

        $this->command->info('สร้างข้อมูล 20 รายการใน tutor_courses สำเร็จ!');
    }
}
