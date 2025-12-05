<?php

namespace App\Http\Controllers;

use App\Models\tutor_course;

class TutorHomeController extends Controller
{
    public function index()
    {
        $courses = Tutor_course::orderBy('created_at', 'desc')
                               ->limit(5)
                               ->get();

        return view('Tutor_home', compact('courses'));
    }
}
