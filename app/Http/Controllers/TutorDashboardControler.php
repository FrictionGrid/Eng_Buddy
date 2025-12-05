<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Tutor_profile;   

class TutorDashboardControler extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $tutorProfile = $user->tutorProfile()
                             ->with(['educations', 'subjects', 'experiences'])
                             ->first();

        return view('Tutor_dashboard', compact('user', 'tutorProfile'));
    }

    public function profile()
    {
        $user = Auth::user();

        $tutorProfile = $user->tutorProfile()
                             ->with(['educations', 'subjects', 'experiences'])
                             ->first();

        return view('Tutor_profile', compact('user', 'tutorProfile'));
    }

    public function updateProfile(Request $request)
    {
        try {
            $user = Auth::user();
            $tutorProfile = $user->tutorProfile;   

            $validated = $request->validate([
                'first_name'   => 'required|string|max:255',
                'last_name'    => 'required|string|max:255',
                'phone'        => 'required|string|max:20',
                'address'      => 'nullable|string',
                'province'     => 'nullable|string|max:255',
                'district'     => 'nullable|string|max:255',
                'postal_code'  => 'nullable|string|max:10',
                'bio'          => 'nullable|string',
                'id_card_image' => 'nullable|mimes:jpeg,jpg,png|max:2048',
            ]);

            if ($request->hasFile('id_card_image')) {
                if ($tutorProfile->id_card_image) {
                    Storage::disk('public')->delete($tutorProfile->id_card_image);
                }

                $validated['id_card_image'] = $request->file('id_card_image')
                    ->store('tutor_id_cards', 'public');
            }

            $tutorProfile->update($validated);

            return back()->with('success', 'อัปเดตโปรไฟล์สำเร็จ');

        } catch (\Exception $e) {

            return back()->withErrors([
                'error' => 'เกิดข้อผิดพลาด: ' . $e->getMessage(),
            ]);
        }
    }
}
