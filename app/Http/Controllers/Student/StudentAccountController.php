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
}
