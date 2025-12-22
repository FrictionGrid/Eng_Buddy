<?php

namespace App\Http\Controllers;

use App\Models\tutor_education;
use App\Models\tutor_experience;
use App\Models\User;
use App\Models\Tutor_profile;
use App\Models\Tutor_subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TutorRegisterController extends Controller
{

    public function showRegisterForm()
    {
        return view('Tutor_register');
    }


    public function register(Request $request)
    {
        $validated = $request->validate([
            // Account Information
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'
            ],

            // Personal Information
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'province' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:10',
            'bio' => 'nullable|string',

            // ID Card Image
            'id_card_image' => 'required|image|mimes:jpeg,jpg,png|max:2048',

            // Education (Array of qualifications)
            'qualifications' => 'required|array|min:1',
            'qualifications.*.degree_level' => 'required|string|in:bachelor,master,phd,certificate,diploma,other',
            'qualifications.*.field_of_study' => 'required|string|max:255',
            'qualifications.*.institution' => 'required|string|max:255',
            'qualifications.*.gpa' => 'required|numeric|min:0|max:4',

            // Subjects (Array of subjects)
            'subjects' => 'required|array|min:1',
            'subjects.*.subject_name' => 'required|string|max:255',
            'subjects.*.hourly_rate' => 'nullable|numeric|min:0|max:9999.99',
            'subjects.*.description' => 'nullable|string',

            // Teaching Experience
            'has_teaching_experience' => 'required|boolean',
            'teaching_experience_years' => 'nullable|numeric|min:0|max:99.5',
            'work_experience' => 'nullable|string',
            'additional_info' => 'nullable|string',

            // Terms and Privacy
            'accept_terms' => 'required|accepted',
            'accept_privacy' => 'required|accepted',
        ], [
            // Email validation messages
            'email.required' => 'กรุณากรอกอีเมล',
            'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            'email.unique' => 'อีเมลนี้ถูกใช้งานแล้ว',

            // Password validation messages
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'password.min' => 'รหัสผ่านต้องมีอย่างน้อย 8 ตัวอักษร',
            'password.confirmed' => 'รหัสผ่านไม่ตรงกัน',
            'password.regex' => 'รหัสผ่านต้องประกอบด้วย ตัวพิมพ์ใหญ่ ตัวพิมพ์เล็ก ตัวเลข และสัญลักษณ์พิเศษอย่างน้อยหนึ่งตัว',

            // Personal info validation messages
            'first_name.required' => 'กรุณากรอกชื่อ',
            'last_name.required' => 'กรุณากรอกนามสกุล',
            'phone.required' => 'กรุณากรอกเบอร์โทรศัพท์',

            // ID card validation messages
            'id_card_image.required' => 'กรุณาอัปโหลดรูปบัตรประชาชน',
            'id_card_image.image' => 'ไฟล์ต้องเป็นรูปภาพเท่านั้น',
            'id_card_image.mimes' => 'รองรับเฉพาะไฟล์ JPG, JPEG และ PNG',
            'id_card_image.max' => 'ไฟล์รูปต้องมีขนาดไม่เกิน 2MB',

            // Education validation messages
            'qualifications.required' => 'กรุณากรอกข้อมูลวุฒิการศึกษาอย่างน้อย 1 รายการ',
            'qualifications.*.degree_level.required' => 'กรุณาเลือกระดับการศึกษา',
            'qualifications.*.degree_level.in' => 'ระดับการศึกษาไม่ถูกต้อง',
            'qualifications.*.field_of_study.required' => 'กรุณากรอกสาขาวิชา',
            'qualifications.*.institution.required' => 'กรุณากรอกสถาบันการศึกษา',
            'qualifications.*.gpa.required' => 'กรุณากรอก GPA',
            'qualifications.*.gpa.numeric' => 'GPA ต้องเป็นตัวเลข',
            'qualifications.*.gpa.min' => 'GPA ต้องมากกว่าหรือเท่ากับ 0',
            'qualifications.*.gpa.max' => 'GPA ต้องไม่เกิน 4.00',

            // Subject validation messages
            'subjects.required' => 'กรุณากรอกวิชาที่สอนได้อย่างน้อย 1 วิชา',
            'subjects.*.subject_name.required' => 'กรุณากรอกชื่อวิชา',

            // Teaching experience validation messages
            'has_teaching_experience.required' => 'กรุณาระบุว่ามีประสบการณ์สอนหรือไม่',
            'teaching_experience_years.numeric' => 'จำนวนปีประสบการณ์ต้องเป็นตัวเลข',
            'teaching_experience_years.min' => 'จำนวนปีประสบการณ์ต้องมากกว่าหรือเท่ากับ 0',
            'teaching_experience_years.max' => 'จำนวนปีประสบการณ์ต้องไม่เกิน 99.5',

            // Terms validation messages
            'accept_terms.required' => 'กรุณายอมรับข้อกำหนดและเงื่อนไข',
            'accept_terms.accepted' => 'กรุณายอมรับข้อกำหนดและเงื่อนไข',
            'accept_privacy.required' => 'กรุณายอมรับนโยบายความเป็นส่วนตัว',
            'accept_privacy.accepted' => 'กรุณายอมรับนโยบายความเป็นส่วนตัว',
        ]);

        DB::beginTransaction();
        try {
            // 1. Create User Account
            $user = User::create([
                'name' => $validated['first_name'] . ' ' . $validated['last_name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            // 2. Upload ID Card Image
            $idCardPath = null;
            if ($request->hasFile('id_card_image')) {
                $idCardPath = $request->file('id_card_image')
                    ->store('tutor_id_cards', 'public');
            }

            // 3. Create Tutor Profile
            $tutorProfile = Tutor_profile::create([
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

                // Terms and Privacy
                'accepted_terms_at' => now(),
                'accepted_privacy_at' => now(),

                // Default status is pending (waiting for admin approval)
                'status' => 'pending',
            ]);

            // 4. Create Teaching Experience Record
            tutor_experience::create([
                'tutor_profile_id' => $tutorProfile->id,
                'has_teaching_experience' => $validated['has_teaching_experience'],
                'teaching_experience_years' => $validated['teaching_experience_years'] ?? 0,
                'work_experience' => $validated['work_experience'] ?? null,
                'additional_info' => $validated['additional_info'] ?? null,
            ]);

            // 5. Create Education Records
            foreach ($validated['qualifications'] as $qualification) {
                tutor_education::create([
                    'tutor_profile_id' => $tutorProfile->id,
                    'degree_level' => $qualification['degree_level'],
                    'field_of_study' => $qualification['field_of_study'],
                    'institution' => $qualification['institution'],
                    'gpa' => $qualification['gpa'],
                ]);
            }

            // 6. Create Subject Records
            foreach ($validated['subjects'] as $subject) {
                Tutor_subject::create([
                    'tutor_profile_id' => $tutorProfile->id,
                    'subject_name' => $subject['subject_name'],
                    'hourly_rate' => $subject['hourly_rate'] ?? null,
                    'description' => $subject['description'] ?? null,
                ]);
            }

            // Commit transaction
            DB::commit();

            // Auto-login the new tutor
            Auth::login($user);

            // Redirect to dashboard with success message
            return redirect()->route('tutor.dashboard')
                ->with('success', 'สมัครติวเตอร์สำเร็จ! โปรดรอการอนุมัติจากผู้ดูแลระบบ')
                ->with('clear_draft', true);

        } catch (\Exception $e) {
            // Rollback transaction on error
            DB::rollBack();

            // Log the error for debugging
            Log::error('Tutor registration failed: ' . $e->getMessage(), [
                'email' => $request->email,
                'trace' => $e->getTraceAsString()
            ]);

            // Return with error message
            return back()->withErrors([
                'error' => 'เกิดข้อผิดพลาดในการสมัคร: ' . $e->getMessage()
            ])->withInput($request->except(['password', 'password_confirmation', 'id_card_image']));
        }
    }
}
