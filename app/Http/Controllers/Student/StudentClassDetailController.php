<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentClassDetailController extends Controller
{
    public function class_detail(Request $req)
    {
        $active_route = "classroom";

        return view('page.student.class_detail', compact('active_route'));
    }
}
