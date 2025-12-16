<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TutorHomeController;
use App\Http\Controllers\TutorCourseController;
use App\Http\Controllers\TutorRegisterController;
use App\Http\Controllers\TutorLoginController;
use App\Http\Controllers\TutorDashboardControler;
use App\Http\Controllers\StudentHomeController;
use App\Http\Controllers\StudentApplyController;
use App\Http\Controllers\StudentArticleController;

// Tutor Part //
Route::get('/Tutor/home', [TutorHomeController::class, 'index'])->name('tutor.home');
Route::get('/Tutor/course', [TutorCourseController::class, 'index']);
Route::get('/Tutor/apply', function () {
    return view('Tutor_apply');
});
Route::get('Tutor/register', [TutorRegisterController::class, 'showRegisterForm'])->name('register');
Route::post('Tutor/register', [TutorRegisterController::class, 'register'])->name('register.submit');
    Route::get('terms', function () {
        return view('Tutor_term');
    })->name('terms');
    Route::get('privacy', function () {
        return view('Tutor_private');
    })->name('privacy');
    Route::get('Tutor/login', [TutorLoginController::class, 'showLoginForm'])->name('login');
    Route::post('Tutor/login', [TutorLoginController::class, 'login'])->name('login.submit');
    Route::post('Tutor/logout', [TutorLoginController::class, 'logout'])->name('tutor.logout');
        Route::get('dashboard', [TutorDashboardControler::class, 'index'])->name('tutor.dashboard');

        // Student Part //
Route::get('/student/home', [StudentHomeController::class, 'index'])->name('student.home');
Route::get('/student/course', function () {
    return view('Student_course');
});
Route::get('/student/apply', [StudentApplyController::class, 'index'])->name('student.apply');
Route::post('/student/apply', [StudentApplyController::class, 'store'])->name('student.apply.store');
Route::get('/student/articles', [StudentArticleController::class, 'index'])->name('articles.index');
Route::get('/student/articles/{slug}', [StudentArticleController::class, 'show'])->name('articles.show');
Route::get('/student/promotion', function () {
    return view('Student_promotion');
});