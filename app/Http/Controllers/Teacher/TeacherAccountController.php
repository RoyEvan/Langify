<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAccountController extends Controller
{
    public function account_settings(Request $req)
    {
        $active_route = "account_settings";
        $accountData = Auth::guard('teacher_guard')->user();


        return view('page.teacher.account_settings', compact('active_route', 'accountData'));
    }
}
