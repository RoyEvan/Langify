<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function isLoggedIn() {
        if(Auth::guard('teacher_guard')->check() || Auth::guard('student_guard')->check()) {
            return true;
        }

        return false;
    }

    public function logout() {
        
    }

    public function doLogin(Request $request) {
        $credentials = [
            "username" => $request->username,
            "password" => $request->password
        ];

        if(Auth::guard('teacher_guard')->attempt($credentials)) {
            $user = Auth::guard('teacher_guard')->user();

            dump($user);
        }
    }
}
