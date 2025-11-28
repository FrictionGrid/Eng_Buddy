<?php

namespace App\Http\Controllers;

use App\Models\StudentApplication;
use Illuminate\Http\Request;

class AdminStudentController extends Controller
{
    /**
     * แสดงรายการใบสมัครนักเรียนทั้งหมด
     */
    public function index(Request $request)
    {
        $query = StudentApplication::query();

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('line_id', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Filter by tutor gender
        if ($request->has('tutor_gender') && $request->tutor_gender != '') {
            $query->where('tutor_gender', $request->tutor_gender);
        }

        // เรียงตามวันที่สร้างล่าสุด และแบ่งหน้า
        $applications = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('Admin_student', compact('applications'));
    }
}
