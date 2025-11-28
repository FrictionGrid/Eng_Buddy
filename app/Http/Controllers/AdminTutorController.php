<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TutorProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTutorController extends Controller
{
    /**
     * แสดงรายการ tutors ทั้งหมด
     */
    public function index(Request $request)
    {
        // ดึงข้อมูล tutors พร้อม user และ educations
        $query = TutorProfile::with(['user', 'educations', 'subjects']);

        // Filter ตามสถานะ (ถ้ามี)
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Search ตามชื่อหรืออีเมล
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      $userQuery->where('email', 'like', "%{$search}%");
                  });
            });
        }

        // เรียงตามวันที่สร้างล่าสุด และแบ่งหน้า
        $tutors = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('Admin_tutor', compact('tutors'));
    }

    /**
     * แสดงรายละเอียด tutor
     */
    public function show($id)
    {
        $tutor = TutorProfile::with([
            'user',
            'educations',
            'subjects',
            'experience',
            'approver'
        ])->findOrFail($id);

        return view('Admin_tutor_detail', compact('tutor'));
    }

    /**
     * อนุมัติ tutor
     */
    public function approve($id)
    {
        $tutor = TutorProfile::findOrFail($id);

        $tutor->update([
            'status' => 'approved',
            'approved_at' => now(),
            'approved_by' => Auth::id(),
            'rejection_reason' => null,
        ]);

        return redirect()->route('admin.tutors.show', $id)
            ->with('success', 'อนุมัติ Tutor เรียบร้อยแล้ว');
    }

    /**
     * ปฏิเสธ tutor
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:500',
        ]);

        $tutor = TutorProfile::findOrFail($id);

        $tutor->update([
            'status' => 'rejected',
            'rejection_reason' => $request->rejection_reason,
            'approved_at' => null,
            'approved_by' => null,
        ]);

        return redirect()->route('admin.tutors.show', $id)
            ->with('success', 'ปฏิเสธ Tutor เรียบร้อยแล้ว');
    }

    /**
     * ระงับ tutor
     */
    public function suspend($id)
    {
        $tutor = TutorProfile::findOrFail($id);

        $tutor->update([
            'status' => 'suspended',
            'suspended_at' => now(),
        ]);

        return redirect()->route('admin.tutors.show', $id)
            ->with('success', 'ระงับ Tutor เรียบร้อยแล้ว');
    }

    /**
     * เปิดใช้งาน tutor อีกครั้ง (unsuspend)
     */
    public function activate($id)
    {
        $tutor = TutorProfile::findOrFail($id);

        $tutor->update([
            'status' => 'approved',
            'suspended_at' => null,
        ]);

        return redirect()->route('admin.tutors.show', $id)
            ->with('success', 'เปิดใช้งาน Tutor เรียบร้อยแล้ว');
    }
}
