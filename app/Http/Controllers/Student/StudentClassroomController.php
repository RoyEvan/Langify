<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentClassroomController extends Controller
{
    public function classroom(Request $req)
    {
        $active_route = "classroom";

        if ($req->course_id) {
            $course =  Auth::guard('student_guard')->user()->Course()->find($req->course_id);

            if (!$course) {
                return redirect("student/classroom/")->with("notification", "You haven't signed up for that class.");
            }

            $materials = $course->Material()->get();

            return view("page.student.class_detail", compact("active_route", "course", "materials"));
        } else {
            $courses = Auth::guard('student_guard')->user()->Course()->wherePivot("IS_FINISHED", 0)->get();
            $student = Auth::guard('student_guard')->user();

            return view('page.student.classroom', compact('active_route', 'courses', 'student'));
        }
    }
}
