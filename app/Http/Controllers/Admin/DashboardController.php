<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tutor_profile;
use App\Models\tutor_course;
use App\Models\StudentApply;

class DashboardController extends Controller
{
    /**
     * แสดงหน้า Dashboard หลัก
     */
    public function index()
    {
        // นับจำนวนข้อมูลต่างๆ สำหรับแสดงใน dashboard
        $stats = [
            'total_tutors' => Tutor_profile::count(),
            'pending_tutors' => Tutor_profile::where('status', 'pending')->count(),
            'approved_tutors' => Tutor_profile::where('status', 'approved')->count(),
            'total_courses' => tutor_course::count(),
            'total_students' => StudentApply::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
