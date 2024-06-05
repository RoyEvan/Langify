<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


        $studentLogin = Auth::guard('student_guard')->user();

        $student = Student::find($studentLogin->STUDENT_ID);
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





}
