<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherClassroomController extends Controller
{
    public function classroom(Request $req)
    {
        $active_route = "classroom";

        if($req->course_id) {


            $course = Course::find($req->course_id);
            dump(Course::find($req->course_id)->toRawSql());
            dump($course);
            dd($course->Student()->wherePivot("COURSE_ID", $req->course_id)->toRawSql());

            if(!$course) return redirect("teacher/classroom")->with("msg", "Page Not Found!");

            $materials = $course->Materials()->get();

            return view("page.teacher.class_detail", compact("active_route", "course", "materials"));
        }
        else {
            $courses = Teacher::find("T2024001")->Course()->get();
            $teacher = Teacher::find("T2024001");

            return view('page.teacher.classroom', compact('active_route', 'courses', 'teacher'));
        }
    }
}
