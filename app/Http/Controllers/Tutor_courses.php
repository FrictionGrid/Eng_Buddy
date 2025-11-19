<?php

namespace App\Http\Controllers;

use App\Models\Tutor_course;
use Illuminate\Http\Request;

class Tutor_courses extends Controller
{
   
    public function index(Request $request)
    {
        $query = Tutor_course :: query();

     
        if ($request->filled('q')) {
            $searchTerm = $request->q;
            $query->where(function($q) use ($searchTerm) {
                $q->where('subject', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('location', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('job_code', 'LIKE', "%{$searchTerm}%");
            });
        }

        if ($request->filled('day')) {
            $query->where('day', 'LIKE', "%{$request->day}%");
        }

   
        if ($request->filled('category')) {
            $query->where('subject', 'LIKE', "%{$request->category}%");
        }

   
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }


   

        $courses = $query->get();
        return view('tutor_course', compact('courses'));
    }
}
