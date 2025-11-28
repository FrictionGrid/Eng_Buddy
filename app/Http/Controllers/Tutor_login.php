<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Tutor_login extends Controller
{
 

    public function showLoginForm()
    {
        return view('Tutor_login');
    }

   
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $user = Auth::user();

            // ตรวจสอบ role และ redirect ตามที่เหมาะสม
            if ($user->isAdmin()) {
                // สำหรับอนาคต: redirect ไปหน้า admin dashboard
                return redirect()->route('admin.dashboard');
            }

            if ($user->isTutor()) {
                return redirect()->intended(route('tutor.dashboard'));
            }

            // ถ้าไม่มี role ที่รู้จัก
            Auth::logout();
            return back()->withErrors([
                'email' => 'บัญชีของคุณไม่มีสิทธิ์เข้าถึงระบบนี้',
            ]);
        }

        return back()->withErrors([
            'email' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
