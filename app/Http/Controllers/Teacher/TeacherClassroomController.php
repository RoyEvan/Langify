<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherClassroomController extends Controller
{
    public function classroom(Request $req)
    {
        $active_route = "classroom";

        if($req->course_id) {

            $course = Auth::guard('teacher_guard')->user()->Course()->find($req->course_id);
            $students = $course->Student()->wherePivot("IS_FINISHED", 0)->get();

            if(!$course) return redirect("teacher/classroom")->with("msg", "Page Not Found!");

            $materials = $course->Material()->get();

            return view("page.teacher.class_detail", compact("active_route", "course", "materials", "students"));
        }
        else {
            $courses = Auth::guard('teacher_guard')->user()->Course()->get();
            $teacher = Auth::guard('teacher_guard');

            return view('page.teacher.classroom', compact('active_route', 'courses', 'teacher'));
        }
    }
}
