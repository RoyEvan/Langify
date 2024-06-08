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

        if ($req->course_id) {

            $course = Auth::guard('teacher_guard')->user()->Course()->find($req->course_id);
            // $course = Course::find($req->course_id);
            if (!$course) {
                abort(404);
            }

            $students = $course->Student()->wherePivot("IS_FINISHED", 0)->get();
            $materials = $course->Material()->get();
            $files = Storage::disk("local")->files("assignments");

            return view("page.teacher.class_detail", compact("active_route", "course", "materials", "students", "files"));
        } else {
            $courses = Auth::guard('teacher_guard')->user()->Course()->get();
            $teacher = Auth::guard('teacher_guard');

            return view('page.teacher.classroom', compact('active_route', 'courses', 'teacher'));
        }
    }

    public function create_classroom(Request $req)
    {
        $req->validate([
            "COURSE_NAME" => 'required',
            "COURSE_DESC" => 'required',
            "COURSE_LEVEL" => 'required',
            "COURSE_CLASS" => 'required',
            "COURSE_DAY" => 'required',
            "COURSE_LENGTH" => 'required',
        ], [], []);


        // Create New ID
        $prefix = 'C';
        $lastId = Course::orderBy('COURSE_ID', 'desc')->first()->COURSE_ID;


        $numericPart = (int) substr($lastId ?? '', strlen($prefix));
        $newNumericPart = str_pad($numericPart + 1, 4, '0', STR_PAD_LEFT);
        $newID = $prefix . $newNumericPart;

        // Insert New Account as Studen
        $result = Course::create([
            "COURSE_ID" => $newID,
            "TEACHER_ID" => Auth::guard('teacher_guard')->user()->TEACHER_ID,
            "COURSE_NAME" => $req->COURSE_NAME,
            "COURSE_DESC" => $req->COURSE_DESC,
            "COURSE_LEVEL" => $req->COURSE_LEVEL,
            "COURSE_CLASS" => $req->COURSE_CLASS,
            "COURSE_DAY" => $req->COURSE_DAY,
            "COURSE_LENGTH" => $req->COURSE_LENGTH,
        ]);

        if ($result) {
            return redirect('teacher/classroom')->with('notification', "You have new class to teach!");
        } else {
            return redirect('teacher/classroom')->with('notification', "There is something wrong!");
        }
    }
}
