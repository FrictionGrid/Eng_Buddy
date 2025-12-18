<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentApply;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * แสดงรายการใบสมัครนักเรียนทั้งหมด (Read-only)
     */
    public function index(Request $request)
    {
        $query = StudentApply::query();

        // ค้นหาตามชื่อหรือช่องทางติดต่อ
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('line_id', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // กรองตามเพศติวเตอร์ที่ต้องการ
        if ($request->filled('tutor_gender')) {
            $query->where('tutor_gender', $request->tutor_gender);
        }

        $students = $query->latest()->paginate(15);

        return view('admin.students.index', compact('students'));
    }
}
