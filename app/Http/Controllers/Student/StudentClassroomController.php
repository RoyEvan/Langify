<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentClassroomController extends Controller
{
    public function classroom(Request $req)
    {
        $active_route = "classroom";

        if($req->course_id) {
            $course = Course::find($req->course_id);

            if(!$course) return redirect("student/classroom/")->with("msg", "Page Not Found!");

            $materials = $course->Material()->get();

            return view("page.student.class_detail", compact("active_route", "course", "materials"));
        }
        else {
            $courses = Student::find("S2400001")->Course()->wherePivot("IS_FINISHED", 0)->get();
            $student = Student::find("S2400001");

            return view('page.student.classroom', compact('active_route', 'courses', 'student'));
        }
    }
}
