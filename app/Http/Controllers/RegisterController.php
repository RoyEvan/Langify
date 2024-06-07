<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class RegisterController extends Controller
{
    public function register(Request $req)
    {
        if (Auth::guard('student_guard')->check()) {
            return redirect('/student');
        }
        if (Auth::guard('teacher_guard')->check()) {
            return redirect('/teacher');
        }

        return view('register');
    }

    public function doRegister(Request $req)
    {
        $req->validate([
            "student_email" => 'required|email',
            "student_name" => 'required',
            "student_password" => 'required|confirmed',
        ], [], []);


        // Create New ID
        $prefix = 'S' . Date::now()->format('y');
        $lastId = Student::orderBy('STUDENT_ID', 'desc')->first()->STUDENT_ID;
        $numericPart = (int) substr($lastId ?? '', strlen($prefix));
        $newNumericPart = str_pad($numericPart + 1, 5, '0', STR_PAD_LEFT);
        $newID = $prefix . $newNumericPart;

        // Insert New Account as Studen
        $result = Student::create([
            "STUDENT_ID" => $newID,
            "STUDENT_EMAIL" => $req->student_email,
            "STUDENT_NAME" => $req->student_name,
            "STUDENT_PASSWORD" => bcrypt($req->student_password),
            "STUDENT_USERNAME" => substr(substr("abcdefghijklmnopqrstuvwxyz", mt_rand(0, 25), 1).substr(md5(time()), 1), 4, 10),
            "STUDENT_ADDRESS" => "",
            "STUDENT_PHONE" => "",
        ]);

        if ($result) {
            return redirect('login')->with('notification', "Register Success! Start your first journey.");
        } else {
            return redirect('register');
        }

    }


}
