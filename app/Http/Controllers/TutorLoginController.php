<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class  TutorLoginController extends Controller
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

if (Auth::attempt($credentials)) {

    return redirect()->route('tutor.dashboard');
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
