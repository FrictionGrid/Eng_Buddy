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

// Admin Controllers
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TutorController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ArticleController;


// Admin Dashboard Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Authentication routes (ไม่ต้อง login)
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');

    // Protected admin routes (ต้อง login)
    Route::middleware(['admin.auth'])->group(function () {
        // Logout
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        // Dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Tutors Management
        Route::prefix('tutors')->name('tutors.')->group(function () {
            Route::get('/', [TutorController::class, 'index'])->name('index');
            Route::get('{id}', [TutorController::class, 'show'])->name('show');
            Route::patch('{id}/approve', [TutorController::class, 'approve'])->name('approve');
            Route::patch('{id}/reject', [TutorController::class, 'reject'])->name('reject');
            Route::patch('{id}/suspend', [TutorController::class, 'suspend'])->name('suspend');
            Route::patch('{id}/unsuspend', [TutorController::class, 'unsuspend'])->name('unsuspend');
        });

        // Courses Management
        Route::resource('courses', CourseController::class)->except(['show']);

        // Students Management (Read-only)
        Route::get('students', [StudentController::class, 'index'])->name('students.index');

        // Reviews Management
        Route::resource('reviews', ReviewController::class);

        // Articles Management
        Route::resource('articles', ArticleController::class);
    });
});

// ==================================================
// Tutor Part //
Route::get('/Tutor/home', [TutorHomeController::class, 'index'])->name('tutor.home');
Route::get('/Tutor/course', [TutorCourseController::class, 'index'])->name('tutor.course');
Route::get('/Tutor/course/{id}', [TutorCourseController::class, 'show'])->name('tutor.course.detail');
Route::get('/Tutor/apply', function () {
    return view('Tutor_apply');
});
Route::get('Tutor/register', [TutorRegisterController::class, 'showRegisterForm'])->name('register');
Route::post('Tutor/register', [TutorRegisterController::class, 'register'])->name('register.submit');
Route::get('Tutor/terms', function () {
    return view('Tutor_term');
})->name('tutor.terms');
Route::get('Tutor/privacy', function () {
    return view('Tutor_private');
})->name('tutor.privacy');
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