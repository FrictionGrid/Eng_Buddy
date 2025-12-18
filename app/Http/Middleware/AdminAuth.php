<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // ตรวจสอบว่ามี session admin_authenticated หรือไม่
        if (!session()->has('admin_authenticated')) {
            return redirect()->route('admin.login')
                ->with('error', 'กรุณาเข้าสู่ระบบก่อนเข้าใช้งาน');
        }

        return $next($request);
    }
}
