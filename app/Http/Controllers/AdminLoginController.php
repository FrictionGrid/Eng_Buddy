<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends Controller
{
    /**
     * แสดงหน้า login สำหรับ admin
     */
    public function showLoginForm()
    {
        // ถ้า login แล้วและเป็น admin ให้ redirect ไปหน้า tutors
        if (Auth::check() && Auth::user()->isAdmin()) {
            return redirect()->route('admin.tutors.index');
        }

        return view('Admin_login');
    }

    /**
     * จัดการ login สำหรับ admin
     */
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'กรุณากรอกอีเมล',
            'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
        ]);

        // Rate limiting - ป้องกัน brute force
        $this->ensureIsNotRateLimited($request);

        // พยายาม login
        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            // ตรวจสอบว่าเป็น admin หรือไม่
            if (!$user->isAdmin()) {
                Auth::logout();
                RateLimiter::hit($this->throttleKey($request));

                return back()->withErrors([
                    'email' => 'คุณไม่มีสิทธิ์เข้าถึงระบบ Admin',
                ])->withInput($request->only('email'));
            }

            // Login สำเร็จ
            $request->session()->regenerate();
            RateLimiter::clear($this->throttleKey($request));

            return redirect()->intended(route('admin.tutors.index'));
        }

        // Login ไม่สำเร็จ
        RateLimiter::hit($this->throttleKey($request));

        throw ValidationException::withMessages([
            'email' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง',
        ]);
    }

    /**
     * Logout สำหรับ admin
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    /**
     * ตรวจสอบ rate limiting
     */
    protected function ensureIsNotRateLimited(Request $request)
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        throw ValidationException::withMessages([
            'email' => "พยายามเข้าสู่ระบบมากเกินไป กรุณารอ {$seconds} วินาที",
        ]);
    }

    /**
     * สร้าง throttle key
     */
    protected function throttleKey(Request $request)
    {
        return Str::lower($request->input('email')) . '|' . $request->ip();
    }
}
