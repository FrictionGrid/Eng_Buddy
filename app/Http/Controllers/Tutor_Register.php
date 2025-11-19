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
use Illuminate\Validation\Rules\Password;

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
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],


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

            return redirect()->route('dashboard')
                ->with('success', 'สมัครติวเตอร์สำเร็จ! โปรดรอการอนุมัติจากผู้ดูแลระบบ');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors([
                'error' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()
            ])->withInput();
        }
    }


 
}
