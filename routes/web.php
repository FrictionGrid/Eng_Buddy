<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tutor_Register;
use App\Http\Controllers\Tutor_login;
use App\Http\Controllers\Tutor_dashboard;
use App\Http\Controllers\Tutor_courses;
use App\Http\Controllers\Tutor_Home;
use App\Http\Controllers\Student_articles;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\RobotsTxtController;
use App\Http\Controllers\AdminTutorController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\AdminStudentController;

Route::get('Tutor/layout', function () {
    return view('Tutor_layout');
});

// ฟังชั่นสมัคร //
    Route::get('Tutor/register', [Tutor_Register::class, 'showRegisterForm'])->name('register');
    Route::post('Tutor/register', [Tutor_Register::class, 'register'])->name('register.submit');
// ฟังชั่นเข้าสู่ระบบ //
    Route::get('Tutor/login', [Tutor_login::class, 'showLoginForm'])->name('login');
    Route::post('Tutor/login', [Tutor_login::class, 'login'])->name('login.submit');
    Route::post('Tutor/logout', [Tutor_login::class, 'logout'])->name('tutor.logout');

    // Dashboard routes with role middleware
    Route::get('dashboard', [Tutor_dashboard::class, 'index'])
        ->middleware(['auth', 'role:tutor'])
        ->name('tutor.dashboard');

    // Admin dashboard (เผื่ออนาคต)
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth', 'role:admin'])->name('admin.dashboard');

    // Terms and Privacy routes
    Route::get('terms', function () {
        return view('Tutor_term');
    })->name('terms');
    Route::get('privacy', function () {
        return view('Tutor_private');
    })->name('privacy');

Route::get('/Tutor/apply', function () {
    return view('Tutor_apply');
});

Route::get('/Tutor/home', [Tutor_Home::class, 'index'])->name('tutor.home');

Route::get('/Tutor/course', [Tutor_courses::class, 'index']);



//  ฝังนักเรียน //
Route::get('/student/home', function () {
    return view('student_home');
});
Route::get('/student/apply', [App\Http\Controllers\StudentApplicationController::class, 'index'])->name('student.apply');
Route::post('/student/apply', [App\Http\Controllers\StudentApplicationController::class, 'store'])->name('student.apply.store');

Route::get('/student/course', function () {
    return view('student_course');
});

Route::get('/student/promotion', function () {
    return view('student_promotion');
});
Route::get('/student/articles', [Student_articles::class, 'index'])->name('articles.index');
Route::get('/student/articles/{slug}', [Student_articles::class, 'show'])->name('articles.show');

// SEO Routes
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [RobotsTxtController::class, 'index'])->name('robots');

// ADMIN //
Route::get('/Admin/layer', function () {
    return view('Admin_layer');
});

// Admin Authentication (ไม่ต้อง login ก่อน)
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// Admin - Tutors Management
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Tutors
    Route::get('/tutors', [AdminTutorController::class, 'index'])->name('tutors.index');
    Route::get('/tutors/{id}', [AdminTutorController::class, 'show'])->name('tutors.show');
    Route::post('/tutors/{id}/approve', [AdminTutorController::class, 'approve'])->name('tutors.approve');
    Route::post('/tutors/{id}/reject', [AdminTutorController::class, 'reject'])->name('tutors.reject');
    Route::post('/tutors/{id}/suspend', [AdminTutorController::class, 'suspend'])->name('tutors.suspend');
    Route::post('/tutors/{id}/activate', [AdminTutorController::class, 'activate'])->name('tutors.activate');

    // Courses
    Route::get('/courses', [AdminCourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [AdminCourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [AdminCourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{id}/edit', [AdminCourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{id}', [AdminCourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{id}', [AdminCourseController::class, 'destroy'])->name('courses.destroy');

    // Students
    Route::get('/students', [AdminStudentController::class, 'index'])->name('students.index');
});
