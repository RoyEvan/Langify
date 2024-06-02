<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherClassroomController extends Controller
{
    public function classroom(Request $req)
    {
        $active_route = "classroom";

        return view('page.teacher.classroom', compact('active_route'));
    }
}
