<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherDashboardController extends Controller
{
    public function dashboard(Request $req)
    {
        $active_route = "dashboard";

        return view('page.teacher.dashboard', compact('active_route'));
    }
}
