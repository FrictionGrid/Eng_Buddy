<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tutor_profile;
use App\Models\Tutor_subject;
use App\Models\tutor_education;
use App\Models\tutor_experience;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * แสดงรายการติวเตอร์ทั้งหมด
     */
    public function index(Request $request)
    {
        $query = Tutor_profile::with('user');

        // ค้นหาตามชื่อหรืออีเมล
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('email', 'like', "%{$search}%");
                  });
            });
        }

        // กรองตามสถานะ
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // กรองติวเตอร์ที่ถูกระงับ
        if ($request->filled('suspended')) {
            if ($request->suspended === 'yes') {
                $query->whereNotNull('suspended_at');
            } else {
                $query->whereNull('suspended_at');
            }
        }

        $tutors = $query->latest()->paginate(15);

        return view('admin.tutors.index', compact('tutors'));
    }

    /**
     * แสดงรายละเอียดติวเตอร์
     */
    public function show($id)
    {
        $tutor = Tutor_profile::with([
            'user',
        ])->findOrFail($id);

        // ดึงข้อมูลวิชาที่สอน
        $subjects = Tutor_subject::where('tutor_profile_id', $id)->get();

        // ดึงข้อมูลการศึกษา
        $educations = tutor_education::where('tutor_profile_id', $id)->get();

        // ดึงข้อมูลประสบการณ์
        $experiences = tutor_experience::where('tutor_profile_id', $id)->get();

        return view('admin.tutors.show', compact('tutor', 'subjects', 'educations', 'experiences'));
    }

    /**
     * อนุมัติติวเตอร์
     */
    public function approve($id)
    {
        $tutor = Tutor_profile::findOrFail($id);

        $tutor->update([
            'status' => 'approved',
            'approved_at' => now(),
            'approved_by' => session('admin_id'),
            'rejection_reason' => null,
        ]);

        return back()->with('success', 'อนุมัติติวเตอร์สำเร็จ');
    }

    /**
     * ปฏิเสธติวเตอร์
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'reason' => 'required|string|max:1000',
        ]);

        $tutor = Tutor_profile::findOrFail($id);

        $tutor->update([
            'status' => 'rejected',
            'rejection_reason' => $request->reason,
            'approved_at' => null,
            'approved_by' => null,
        ]);

        return back()->with('success', 'ปฏิเสธติวเตอร์สำเร็จ');
    }

    /**
     * ระงับติวเตอร์
     */
    public function suspend(Request $request, $id)
    {
        $request->validate([
            'reason' => 'required|string|max:1000',
        ]);

        $tutor = Tutor_profile::findOrFail($id);

        $tutor->update([
            'suspended_at' => now(),
            'rejection_reason' => $request->reason, // ใช้ฟิลด์เดียวกันเก็บเหตุผล
        ]);

        return back()->with('success', 'ระงับติวเตอร์สำเร็จ');
    }

    /**
     * เปิดใช้งานติวเตอร์อีกครั้ง
     */
    public function unsuspend($id)
    {
        $tutor = Tutor_profile::findOrFail($id);

        $tutor->update([
            'suspended_at' => null,
        ]);

        return back()->with('success', 'เปิดใช้งานติวเตอร์สำเร็จ');
    }
}
