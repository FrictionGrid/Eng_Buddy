<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor_course;

class Tutor_Home extends Controller
{
    public function index()
    {
        // ดึงข้อมูล 5 รายการล่าสุด
        $courses = Tutor_course::orderBy('created_at', 'desc')
                               ->limit(5)
                               ->get();

        return view('Tutor_home', compact('courses'));
    }
}
