<?php

namespace App\Http\Controllers;

use App\Models\TutorEducation;
use App\Models\User;
use App\Models\TutorProfile;
use App\Models\TutorSubject;      
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Tutor_Register extends Controller
{
 
    public function showRegisterForm()
    {
        return view('Tutor_register');
    }


    public function register(Request $request)
    {
        $validated = $request->validate([

            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'
            ],


            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'province' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:10',
            'bio' => 'nullable|string',

            'id_card_image' => 'required|image|max:2048',


            'qualifications' => 'required|array|min:1',
            'qualifications.*.degree_level' => 'required|string',
            'qualifications.*.field_of_study' => 'required|string|max:255',
            'qualifications.*.institution' => 'required|string|max:255',
            'qualifications.*.gpa' => 'required|numeric|min:0|max:4',


            'subjects' => 'required|array|min:1',
            'subjects.*.subject_name' => 'required|string|max:255',
            'subjects.*.hourly_rate' => 'required|numeric|min:0|max:9999.99',
            'subjects.*.description' => 'nullable|string',


            'has_teaching_experience' => 'required|boolean',
            'teaching_experience_years' => 'nullable|numeric|min:0|max:99.5',
            'work_experience' => 'nullable|string',
            'additional_info' => 'nullable|string',


            'accept_terms' => 'required|accepted',
            'accept_privacy' => 'required|accepted',
        ], [
            // Email
            'email.required' => 'กรุณากรอกอีเมล',
            'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            'email.unique' => 'อีเมลนี้ถูกใช้งานแล้ว',

            // Password
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'password.min' => 'รหัสผ่านต้องมีอย่างน้อย 8 ตัวอักษร',
            'password.confirmed' => 'รหัสผ่านไม่ตรงกัน',
            'password.regex' => 'รหัสผ่านต้องประกอบด้วย ตัวพิมพ์ใหญ่ ตัวพิมพ์เล็ก ตัวเลข และสัญลักษณ์พิเศษอย่างน้อยหนึ่งตัว',

            // Personal Info
            'first_name.required' => 'กรุณากรอกชื่อ',
            'last_name.required' => 'กรุณากรอกนามสกุล',
            'phone.required' => 'กรุณากรอกเบอร์โทรศัพท์',

            // ID Card
            'id_card_image.required' => 'กรุณาอัปโหลดรูปบัตรประชาชน',
            'id_card_image.image' => 'ไฟล์ต้องเป็นรูปภาพเท่านั้น',
            'id_card_image.max' => 'ไฟล์รูปต้องมีขนาดไม่เกิน 2MB',

            // Qualifications
            'qualifications.required' => 'กรุณากรอกข้อมูลวุฒิการศึกษาอย่างน้อย 1 รายการ',
            'qualifications.*.degree_level.required' => 'กรุณาเลือกระดับการศึกษา',
            'qualifications.*.field_of_study.required' => 'กรุณากรอกสาขาวิชา',
            'qualifications.*.institution.required' => 'กรุณากรอกสถาบันการศึกษา',
            'qualifications.*.gpa.required' => 'กรุณากรอก GPA',
            'qualifications.*.gpa.numeric' => 'GPA ต้องเป็นตัวเลข',
            'qualifications.*.gpa.min' => 'GPA ต้องมากกว่าหรือเท่ากับ 0',
            'qualifications.*.gpa.max' => 'GPA ต้องไม่เกิน 4.00',

            // Subjects
            'subjects.required' => 'กรุณากรอกวิชาที่สอนได้อย่างน้อย 1 วิชา',
            'subjects.*.subject_name.required' => 'กรุณากรอกชื่อวิชา',
            'subjects.*.hourly_rate.required' => 'กรุณากรอกอัตราค่าสอน',
            'subjects.*.hourly_rate.numeric' => 'อัตราค่าสอนต้องเป็นตัวเลข',
            'subjects.*.hourly_rate.min' => 'อัตราค่าสอนต้องมากกว่า 0',

            // Teaching Experience
            'has_teaching_experience.required' => 'กรุณาระบุว่ามีประสบการณ์สอนหรือไม่',

            // Terms
            'accept_terms.required' => 'กรุณายอมรับข้อกำหนดและเงื่อนไข',
            'accept_terms.accepted' => 'กรุณายอมรับข้อกำหนดและเงื่อนไข',
            'accept_privacy.required' => 'กรุณายอมรับนโยบายความเป็นส่วนตัว',
            'accept_privacy.accepted' => 'กรุณายอมรับนโยบายความเป็นส่วนตัว',
        ]);

        DB::beginTransaction();
        try {
          
            $user = User::create([
                'name' => $validated['first_name'] . ' ' . $validated['last_name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'tutor',
            ]);

        
            $idCardPath = null;
            if ($request->hasFile('id_card_image')) {
                $idCardPath = $request->file('id_card_image')
                    ->store('tutor_id_cards', 'public');
            }

            
            $tutorProfile = TutorProfile::create([
                'user_id' => $user->id,
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'phone' => $validated['phone'],
                'address' => $validated['address'] ?? null,
                'province' => $validated['province'] ?? null,
                'district' => $validated['district'] ?? null,
                'postal_code' => $validated['postal_code'] ?? null,
                'bio' => $validated['bio'] ?? null,
                'id_card_image' => $idCardPath,

                
                'has_teaching_experience' => $validated['has_teaching_experience'],
                'teaching_experience_years' => $validated['teaching_experience_years'] ?? 0,
                'work_experience' => $validated['work_experience'] ?? null,
                'additional_info' => $validated['additional_info'] ?? null,

                'accepted_terms_at' => now(),
                'accepted_privacy_at' => now(),
                'status' => 'pending',
            ]);

            
            foreach ($validated['qualifications'] as $q) {
                TutorEducation::create([
                    'tutor_profile_id' => $tutorProfile->id,
                    'degree_level' => $q['degree_level'],
                    'field_of_study' => $q['field_of_study'],
                    'institution' => $q['institution'],
                    'gpa' => $q['gpa'],
                ]);
            }

         
            foreach ($validated['subjects'] as $s) {
                TutorSubject::create([
                    'tutor_profile_id' => $tutorProfile->id,
                    'subject_name' => $s['subject_name'],
                    'hourly_rate' => $s['hourly_rate'],
                    'description' => $s['description'] ?? null,
                ]);
            }

            DB::commit();

            Auth::login($user);

            return redirect()->route('tutor.dashboard')
                ->with('success', 'สมัครติวเตอร์สำเร็จ! โปรดรอการอนุมัติจากผู้ดูแลระบบ')
                ->with('clear_draft', true);

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors([
                'error' => 'เกิดข้อผิดพลาดในการสมัคร กรุณาลองใหม่อีกครั้ง'
            ])->withInput($request->except(['password', 'password_confirmation', 'id_card_image']));
        }
    }


 
}
