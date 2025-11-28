<?php

namespace App\Http\Controllers;

use App\Models\Tutor_course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCourseController extends Controller
{
    /**
     * แสดงรายการคอร์สทั้งหมด
     */
    public function index(Request $request)
    {
        $query = Tutor_course::query();

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('subject', 'like', "%{$search}%")
                  ->orWhere('job_code', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // เรียงตามวันที่สร้างล่าสุด และแบ่งหน้า
        $courses = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('Admin_course', compact('courses'));
    }

    /**
     * แสดงฟอร์มเพิ่มคอร์สใหม่
     */
    public function create()
    {
        return view('Admin_course_form', [
            'course' => null,
            'isEdit' => false
        ]);
    }

    /**
     * บันทึกคอร์สใหม่
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'day' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'rate' => 'nullable|integer|min:0',
            'status' => 'required|in:ใหม่,ปิดงาน',
        ], [
            'subject.required' => 'กรุณากรอกชื่อวิชา',
            'location.required' => 'กรุณากรอกสถานที่',
            'day.required' => 'กรุณากรอกวันที่สอน',
            'time.required' => 'กรุณากรอกเวลาสอน',
            'status.required' => 'กรุณาเลือกสถานะ',
        ]);

        // สร้าง job_code อัตโนมัติ
        $validated['job_code'] = $this->generateJobCode();

        Tutor_course::create($validated);

        return redirect()->route('admin.courses.index')
            ->with('success', 'เพิ่มคอร์สเรียบร้อยแล้ว');
    }

    /**
     * แสดงฟอร์มแก้ไขคอร์ส
     */
    public function edit($id)
    {
        $course = Tutor_course::findOrFail($id);

        return view('Admin_course_form', [
            'course' => $course,
            'isEdit' => true
        ]);
    }

    /**
     * อัพเดทข้อมูลคอร์ส
     */
    public function update(Request $request, $id)
    {
        $course = Tutor_course::findOrFail($id);

        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'day' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'rate' => 'nullable|integer|min:0',
            'status' => 'required|in:ใหม่,ปิดงาน',
        ], [
            'subject.required' => 'กรุณากรอกชื่อวิชา',
            'location.required' => 'กรุณากรอกสถานที่',
            'day.required' => 'กรุณากรอกวันที่สอน',
            'time.required' => 'กรุณากรอกเวลาสอน',
            'status.required' => 'กรุณาเลือกสถานะ',
        ]);

        $course->update($validated);

        return redirect()->route('admin.courses.index')
            ->with('success', 'แก้ไขคอร์สเรียบร้อยแล้ว');
    }

    /**
     * ลบคอร์ส
     */
    public function destroy($id)
    {
        $course = Tutor_course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.courses.index')
            ->with('success', 'ลบคอร์สเรียบร้อยแล้ว');
    }

    /**
     * สร้าง job_code อัตโนมัติ
     */
    private function generateJobCode()
    {
        do {
            // สร้างรหัสแบบ COURSE + 6 หลัก
            $code = 'COURSE' . str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
        } while (Tutor_course::where('job_code', $code)->exists());

        return $code;
    }
}
