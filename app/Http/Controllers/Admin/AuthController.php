<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DashboardUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * แสดงหน้า Login
     */
    public function showLogin()
    {
        // ถ้า login แล้ว redirect ไป dashboard
        if (session()->has('admin_authenticated')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    /**
     * ประมวลผล Login
     */
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // หาผู้ใช้จาก username
        $user = DashboardUser::where('username', $request->username)->first();

        // ตรวจสอบว่ามีผู้ใช้และรหัสผ่านถูกต้อง (แบบ plain text)
        if (!$user || $request->password !== $user->password) {
            return back()
                ->withInput($request->only('username'))
                ->with('error', 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
        }

        // สร้าง session ใหม่ (regenerate เพื่อป้องกัน session fixation)
        $request->session()->regenerate();

        // เก็บข้อมูลใน session
        session([
            'admin_authenticated' => true,
            'admin_username' => $user->username,
            'admin_id' => $user->id,
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'เข้าสู่ระบบสำเร็จ');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        // ลบ session ทั้งหมด
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->route('admin.login')
            ->with('success', 'ออกจากระบบสำเร็จ');
    }
}
