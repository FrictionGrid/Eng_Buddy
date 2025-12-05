# วิธีทดสอบระบบ Register

## ขั้นตอนการทดสอบ:

### 1. เปิดเบราว์เซอร์และเข้าไปที่:
```
http://127.0.0.1:8000/Tutor/register
```

### 2. กรอกข้อมูลในฟอร์ม:

#### ข้อมูลบัญชี:
- **อีเมล**: test@example.com
- **รหัสผ่าน**: Test@1234
- **ยืนยันรหัสผ่าน**: Test@1234

#### ข้อมูลส่วนตัว:
- **ชื่อ**: ทดสอบ
- **นามสกุล**: ระบบ
- **เบอร์โทรศัพท์**: 0812345678
- **จังหวัด**: กรุงเทพมหานคร
- **เขต/อำเภอ**: บางกะปิ
- **รหัสไปรษณีย์**: 10240
- **ที่อยู่**: 123 ถนนลาดพร้าว
- **รูปบัตรประชาชน**: อัปโหลดรูปภาพใดๆ (ไฟล์ JPG, PNG ไม่เกิน 2MB)
- **แนะนำตัว**: ผมสอนภาษาอังกฤษมา 5 ปี

#### วุฒิการศึกษา:
- **ระดับการศึกษา**: ปริญญาตรี
- **สาขาวิชา**: ภาษาอังกฤษ
- **สถาบันการศึกษา**: มหาวิทยาลัยธรรมศาสตร์
- **GPA**: 3.50

#### วิชาที่สอนได้:
- **วิชา**: IELTS
- **อัตราค่าสอน**: 500
- **รายละเอียดเพิ่มเติม**: สอน IELTS ทุกส่วน

#### ประสบการณ์สอน:
- **ประสบการณ์สอนจริง**: มีประสบการณ์
- **จำนวนปีที่มีประสบการณ์สอน**: 5
- **ประสบการณ์ทำงาน**: สอนที่โรงเรียนนานาชาติ 3 ปี
- **ข้อมูลเพิ่มเติม**: มีประสบการณ์สอนนักเรียนทุกระดับ

#### ข้อตกลง:
- ✓ ยอมรับข้อกำหนดและเงื่อนไข
- ✓ ยอมรับนโยบายความเป็นส่วนตัว

### 3. กดปุ่ม "ส่งใบสมัคร"

### 4. ตรวจสอบผลลัพธ์:

#### กรณีสำเร็จ:
- ระบบจะ redirect ไปที่ `/dashboard`
- แสดงข้อความ "สมัครติวเตอร์สำเร็จ! โปรดรอการอนุมัติจากผู้ดูแลระบบ"
- Login อัตโนมัติด้วยบัญชีที่สร้าง

#### ตรวจสอบข้อมูลในฐานข้อมูล:
```sql
-- ตรวจสอบ user
SELECT * FROM users WHERE email = 'test@example.com';

-- ตรวจสอบ tutor profile
SELECT * FROM tutor_profiles WHERE user_id = (SELECT id FROM users WHERE email = 'test@example.com');

-- ตรวจสอบ education
SELECT * FROM tutor_educations WHERE tutor_profile_id = (SELECT id FROM tutor_profiles WHERE user_id = (SELECT id FROM users WHERE email = 'test@example.com'));

-- ตรวจสอบ subjects
SELECT * FROM tutor_subjects WHERE tutor_profile_id = (SELECT id FROM tutor_profiles WHERE user_id = (SELECT id FROM users WHERE email = 'test@example.com'));

-- ตรวจสอบ experience
SELECT * FROM tutor_experiences WHERE tutor_profile_id = (SELECT id FROM tutor_profiles WHERE user_id = (SELECT id FROM users WHERE email = 'test@example.com'));
```

## การแก้ปัญหา Error 419:

### ปัญหา:
Error 419 Page Expired เกิดจาก CSRF token หมดอายุ

### แก้ไขแล้ว:
1. ✓ เพิ่ม SESSION_LIFETIME จาก 120 นาที → 480 นาที (8 ชั่วโมง)
2. ✓ เพิ่ม JavaScript auto-refresh CSRF token ทุก 5 นาที
3. ✓ สร้าง storage symlink สำหรับการอัปโหลดไฟล์

### หมายเหตุ:
- หากกรอกฟอร์มนานเกิน 8 ชั่วโมง ระบบจะ auto-refresh token ให้อัตโนมัติ
- ไฟล์รูปจะถูกเก็บที่: `storage/app/public/tutor_id_cards/`
