<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function dashboard(Request $req)
    {
        $active_route = "dashboard";

        return view('page.student.dashboard', compact('active_route'));
    }
}
