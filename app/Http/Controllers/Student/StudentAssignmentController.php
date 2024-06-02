<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentAssignmentController extends Controller
{
    public function assignment(Request $req)
    {
        $active_route = "dashboard";

        return view('page.student.assignment', compact('active_route'));
    }
}
