<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentAccountController extends Controller
{
    public function account_settings(Request $req)
    {
        $active_route = "account_settings";

        return view('page.student.account_settings', compact('active_route'));
    }
}
