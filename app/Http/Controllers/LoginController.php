<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $req)
    {
        if (Auth::guard('student_guard')->check()) {
            return redirect('/student');
        }
        if (Auth::guard('teacher_guard')->check()) {
            return redirect('/teacher');
        }

        return view('login');
    }

    public function logout()
    {
        if (Auth::guard('student_guard')->check()) {
            Auth::guard('student_guard')->logout();
        }


        if (Auth::guard('teacher_guard')->check()) {
            Auth::guard('teacher_guard')->logout();
        }


        return redirect('login');
    }

    public function doLogin(Request $req)
    {
        $req->validate([
            "email" => 'required|email',
            "password" => 'required',
        ], [], []);


        $studentCredentials = [
            "STUDENT_EMAIL" => $req->email,
            "password" => $req->password
        ];

        $teacherCredentials = [
            "TEACHER_EMAIL" => $req->email,
            "password" => $req->password
        ];

        if (Auth::guard('student_guard')->attempt($studentCredentials)) {
            return redirect('student');
        } else if (Auth::guard('teacher_guard')->attempt($teacherCredentials)) {
            return redirect('teacher');
        }

        return redirect('login')->with('notification', "Login failed! Please try again.");
    }
}
