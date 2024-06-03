<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherDashboardController extends Controller
{
    public function dashboard(Request $req)
    {
        $active_route = "dashboard";

        return view('page.teacher.dashboard', compact('active_route'));
    }
}
