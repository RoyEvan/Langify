<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentClassDetailController extends Controller
{
    public function class_detail(Request $req)
    {
        $active_route = "classroom";
        $student = Auth::guard('student_guard')->user();

        $course =  $student->Course()->find($req->course_id);
        if(!$course) return redirect("student/classroom/")->with("notification", "You haven't signed up for that class.");

        $students = $course->Student()->wherePivot("IS_FINISHED", 0)->get();
        $materials = $course->Material()->get();

        $files = Storage::disk("local")->files("materials");

        return view("page.student.class_detail", compact("active_route", "course", "materials", "students", "files"));
    }
}
