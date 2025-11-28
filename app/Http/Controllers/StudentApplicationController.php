<?php

namespace App\Http\Controllers;

use App\Models\StudentApplication;
use Illuminate\Http\Request;

class StudentApplicationController extends Controller
{
    /**
     * Display the application form
     */
    public function index()
    {
        return view('Student_apply');
    }

    /**
     * Store a new student application
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'line_id' => 'nullable|string|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'nullable|string|max:255',
            'tutor_gender' => 'required|in:ชาย,หญิง,ไม่จำกัด',
        ], [
            'full_name.required' => 'กรุณากรอกชื่อ-นามสกุล',
            'phone.required' => 'กรุณากรอกเบอร์โทรศัพท์',
            'tutor_gender.required' => 'กรุณาเลือกเพศติวเตอร์',
        ]);

        // Create new student application
        $application = StudentApplication::create($validated);

        // Redirect back with success message
        return redirect()->route('student.apply')
            ->with('success', 'ส่งข้อมูลเรียบร้อยแล้ว! ทางสถาบันจะติดต่อกลับภายใน 12 ชั่วโมง');
    }
}
