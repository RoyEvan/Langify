<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherAssignmentController extends Controller
{
    public function assignment(Request $req)
    {
        $active_route = "dashboard";

        return view('page.student.assignment', compact('active_route'));
    }
}
