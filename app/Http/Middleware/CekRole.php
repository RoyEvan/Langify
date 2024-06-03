<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$allowed): Response
    {
        if (Auth::guard('student_guard')->check() || Auth::guard('teacher_guard')->check()) {
            foreach ($allowed as $a) {

                if (Auth::guard('student_guard')->check()) {
                    if (Auth::guard('student_guard')->user()->globalrole == $a) {
                        return $next($request);
                    } else {
                        abort(403);
                    }
                } else if (Auth::guard('teacher_guard')->check()) {
                    if (Auth::guard('teacher_guard')->user()->globalrole == $a) {
                        return $next($request);
                    } else {
                        abort(403);
                    }
                }
            }
        } else {
            return redirect("login");
        }
    }
}
