<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class StudentAccountController extends Controller
{
    public function account_settings(Request $req)
    {
        $active_route = "account_settings";

        $accountData = Auth::guard('student_guard')->user();
        $courseTaken = $accountData->Course()->get();



        return view('page.student.account_settings', compact('active_route', 'accountData', 'courseTaken'));
    }



    public function updateSetting(Request $req)
    {
        $req->validate([
            "STUDENT_EMAIL" => 'required|email',
            "STUDENT_NAME" => 'required',
            "STUDENT_ADDRESS" => 'required',
            "STUDENT_PHONE" => 'required',
        ], [], [
            "STUDENT_EMAIL" => "Email",
            "STUDENT_NAME" => "Name",
            "STUDENT_ADDRESS" => "Address",
            "STUDENT_PHONE" => "Phone",
        ]);



        $student = Auth::guard('student_guard')->user()->STUDENT_ID;
        $result = $student->update([
            "STUDENT_EMAIL" => $req->STUDENT_EMAIL,
            "STUDENT_NAME" => $req->STUDENT_NAME,
            "STUDENT_ADDRESS" => $req->STUDENT_ADDRESS,
            "STUDENT_PHONE" => $req->STUDENT_PHONE,
        ]);


        if ($result) {
            return redirect('student/account_settings')->with('notification', 'Woohoo! Its a success!');
        } else {
            return redirect('student/account_settings')->with('notification', 'There is something wrong!');
        }
    }


    public function join_class(Request $req)
    {

        // Langify reverse card : code teacher

        $req->validate([
            "COURSE_ID" => 'required',
        ], [], [
            "COURSE_ID" => "Class Code"
        ]);

        $student = Student::find(Auth::guard('student_guard')->user()->STUDENT_ID);
        $course = Course::find($req->COURSE_ID);
        $is_finished = 0;

        // ADD
        $result = $student->Course()->attach($course, ['IS_FINISHED' =>  $is_finished]);

        return redirect('student/account_settings')->with('notification', 'Woohoo! Its a success!');
    }

    public function become_teacher(Request $req)
    {
        $req->validate([
            "ACCESS_CODE" => 'required',
        ], [], [
            "ACCESS_CODE" => "Access Code",
        ]);



        if (Hash::check($req->ACCESS_CODE, "$2y$12$8/Gnw.JyC3G6CrlgUuXoqeeRaHttb/eeaaLUyT71cuQ.LfyJNxqHi")) {
            $student = Auth::guard('student_guard')->user();


            $prefix = 'T' . Date::now()->format('Y');
            $lastId = Teacher::orderBy('TEACHER_ID', 'desc')->first()->TEACHER_ID;
            $numericPart = (int) substr($lastId ?? '', strlen($prefix));
            $newNumericPart = str_pad($numericPart + 1, 3, '0', STR_PAD_LEFT);
            $newID = $prefix . $newNumericPart;


            $result = Teacher::create([
                "TEACHER_ID" => $newID,
                "TEACHER_EMAIL" => $student->STUDENT_EMAIL,
                "TEACHER_NAME" => $student->STUDENT_NAME,
                "TEACHER_PASSWORD" => $student->STUDENT_PASSWORD,
                "TEACHER_USERNAME" => $student->STUDENT_USERNAME,
                "TEACHER_ADDRESS" => $student->STUDENT_ADDRESS,
                "TEACHER_PHONE" => $student->STUDENT_PHONE,
            ]);

            $result = $student->delete();

            if (Auth::guard('student_guard')->check()) {
                Auth::guard('student_guard')->logout();
            }

            return redirect('login')->with('notification', "Great! You've been promoted to Minimum Wage.");
        } else {
            return redirect('student/account_settings')->with('notification', "Wrong Access Code!");
        }



    }
}
