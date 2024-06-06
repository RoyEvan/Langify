<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Material;
use App\Models\MaterialFile;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherClassroomController extends Controller
{
    public function classroom(Request $req)
    {
        $active_route = "classroom";

        if($req->course_id) {

            $course = Auth::guard('teacher_guard')->user()->Course()->find($req->course_id);
            // $course = Course::find($req->course_id);
            if(!$course) return redirect("teacher/classroom")->with("msg", "Page Not Found!");

            $students = $course->Student()->wherePivot("IS_FINISHED", 0)->get();


            $materials = $course->Material()->get();

            // foreach($materials as $m) {
            //     dump($m->MaterialFile);
            // }
            // dd("..");

            $files = Storage::disk("local")->files("assignments");

            return view("page.teacher.class_detail", compact("active_route", "course", "materials", "students", "files"));
        }
        else {
            $courses = Auth::guard('teacher_guard')->user()->Course()->get();
            $teacher = Auth::guard('teacher_guard');

            return view('page.teacher.classroom', compact('active_route', 'courses', 'teacher'));
        }
    }
}
