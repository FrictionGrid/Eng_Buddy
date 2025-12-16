<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student_review;

class StudentHomeController extends Controller
{
    public function index()
    {
        // ดึงรีวิวทั้งหมดจาก database
        $reviews = student_review::all();

        return view('Student_home', compact('reviews'));
    }
}
