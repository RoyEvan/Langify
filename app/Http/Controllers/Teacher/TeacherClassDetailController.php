<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherClassDetailController extends Controller
{
    public function class_detail(Request $req)
    {
        $active_route = "class_detail";

        return view('page.teacher.class_detail', compact('active_route'));
    }
}
