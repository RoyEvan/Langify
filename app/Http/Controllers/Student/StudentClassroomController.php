<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentClassroomController extends Controller
{
    public function classroom(Request $req)
    {
        $active_route = "classroom";

        return view('page.student.classroom', compact('active_route'));
    }
}
