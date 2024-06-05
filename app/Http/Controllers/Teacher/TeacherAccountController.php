<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAccountController extends Controller
{
    public function account_settings(Request $req)
    {
        $active_route = "account_settings";
        $accountData = Auth::guard('teacher_guard')->user();
        $courseTaken = $accountData->Course()->get();


        return view('page.teacher.account_settings', compact('active_route', 'accountData', 'courseTaken'));
    }

    public function updateSetting(Request $req)
    {
        $req->validate([
            "TEACHER_EMAIL" => 'required|email',
            "TEACHER_NAME" => 'required',
            "TEACHER_ADDRESS" => 'required',
            "TEACHER_PHONE" => 'required',
        ], [], [
            "TEACHER_EMAIL" => "Email",
            "TEACHER_NAME" => "Name",
            "TEACHER_ADDRESS" => "Address",
            "TEACHER_PHONE" => "Phone",
        ]);


        $teacherLogin = Auth::guard('teacher_guard')->user();

        $teacher = Teacher::find($teacherLogin->TEACHER_ID);
        $result = $teacher->update([
            "TEACHER_EMAIL" => $req->TEACHER_EMAIL,
            "TEACHER_NAME" => $req->TEACHER_NAME,
            "TEACHER_ADDRESS" => $req->TEACHER_ADDRESS,
            "TEACHER_PHONE" => $req->TEACHER_PHONE,
        ]);


        if ($result) {
            return redirect('teacher/account_settings')->with('notification', 'Woohoo! Its a success!');
        } else {
            return redirect('teacher/account_settings')->with('notification', 'There is something wrong!');
        }


    }
}
