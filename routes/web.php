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

    // Dashboard route
  Route::get('dashboard', [Tutor_dashboard::class, 'index'])->name('tutor.dashboard');

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
Route::get('/student/apply', function () {
    return view('student_apply');
});

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
