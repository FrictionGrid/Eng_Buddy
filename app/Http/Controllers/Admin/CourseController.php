<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tutor_course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * แสดงรายการคอร์สทั้งหมด
     */
    public function index(Request $request)
    {
        $query = tutor_course::query();

        // ค้นหาตามชื่อวิชา
        if ($request->filled('search')) {
            $query->where('subject', 'like', "%{$request->search}%");
        }

        // กรองตามสถานะ
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $courses = $query->latest()->paginate(15);

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * แสดงฟอร์มสร้างคอร์สใหม่
     */
    public function create()
    {
        return view('admin.courses.create');
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
            'gender' => 'nullable|string|max:255',
            'level' => 'nullable|string|max:255',
            'school' => 'nullable|string|max:255',
            'transportation' => 'nullable|string|max:255',
            'referral_fee' => 'nullable|integer|min:0',
        ]);

        // สร้าง job_code อัตโนมัติ (job + เลข 4 หลัก = 7 ตัวอักษร)
        do {
            $randomNumber = str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT);
            $jobCode = 'job' . $randomNumber;
        } while (tutor_course::where('job_code', $jobCode)->exists());

        $validated['job_code'] = $jobCode;

        tutor_course::create($validated);

        return redirect()->route('admin.courses.index')
            ->with('success', 'สร้างคอร์สสำเร็จ');
    }

    /**
     * แสดงฟอร์มแก้ไขคอร์ส
     */
    public function edit($id)
    {
        $course = tutor_course::findOrFail($id);

        return view('admin.courses.edit', compact('course'));
    }

    /**
     * อัปเดตข้อมูลคอร์ส
     */
    public function update(Request $request, $id)
    {
        $course = tutor_course::findOrFail($id);

        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'day' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'rate' => 'nullable|integer|min:0',
            'status' => 'required|in:ใหม่,ปิดงาน',
            'gender' => 'nullable|string|max:255',
            'level' => 'nullable|string|max:255',
            'school' => 'nullable|string|max:255',
            'transportation' => 'nullable|string|max:255',
            'referral_fee' => 'nullable|integer|min:0',
        ]);

        $course->update($validated);

        return redirect()->route('admin.courses.index')
            ->with('success', 'อัปเดตคอร์สสำเร็จ');
    }

    /**
     * ลบคอร์ส
     */
    public function destroy($id)
    {
        $course = tutor_course::findOrFail($id);
        $course->delete();

        return back()->with('success', 'ลบคอร์สสำเร็จ');
    }
}
