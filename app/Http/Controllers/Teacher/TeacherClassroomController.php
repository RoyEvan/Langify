<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TeacherClassroomController extends Controller
{


    public function classroom(Request $req)
    {
        $active_route = "classroom";

        if ($req->course_id) {

            $course = Auth::guard('teacher_guard')->user()->Course()->find($req->course_id);
            if (!$course) {
                return abort(403);
            }

            $students = $course->Student()->wherePivot("IS_FINISHED", 0)->get();
            $materials = $course->Material()->get();
            $files = Storage::disk("local")->files("assignments");

            $assign = Assignment::withTrashed()->get();
            $student = $course->Student()->wherePivot("IS_FINISHED", 0)->get();
            //$studentDone = $assign->Student()->get();
            return view("page.teacher.class_detail", compact("active_route", "course", "materials", "students", "files","assign","student"));
        } else {
            $teacher = Auth::guard('teacher_guard')->user();
            $courses = $teacher->Course()->get();

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

        $nameCorrect = false;
        $dayCorrect = false;
        $classCorrect = false;

        $name = ucfirst(strtolower($req->COURSE_NAME));
        $day = ucfirst(strtolower($req->COURSE_DAY));
        $class = ucfirst(strtolower($req->COURSE_CLASS));

        $languages = ["English", "Japanese", "Spanish", "Mandarin"];
        $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
        $classes = [
            "A-101", "A-102", "A-103", "A-104", "A-105", "A-106", "A-107", "A-108", "A-109",
            "A-201", "A-202", "A-203", "A-204", "A-205", "A-206", "A-207", "A-208", "A-209"
        ];

        foreach($languages as $l) {
            if($name == $l) {
                $nameCorrect = true;
            }
        }
        if(!$nameCorrect) return redirect('teacher/classroom')->with('notification', "Supported languages are English, Japanese, Spanish, Mandarin");


        foreach($classes as $c) {
            if($class == $c) {
                $classCorrect = true;
            }
        }
        if(!$classCorrect) return redirect('teacher/classroom')->with('notification', "Invalid class! Only A-101 to A-109 and A-201 to A-209 are accepted!");


        foreach($days as $d) {
            if($day == $d) {
                $dayCorrect = true;
            }
        }
        if(!$dayCorrect) return redirect('teacher/classroom')->with('notification', "Unknown day!");

        // Create New ID
        $prefix = 'C';
        $lastId = Course::orderBy('COURSE_ID', 'desc')->first()->COURSE_ID;


        $numericPart = (int) substr($lastId ?? '', strlen($prefix));
        $newNumericPart = str_pad($numericPart + 1, 4, '0', STR_PAD_LEFT);
        $newID = $prefix . $newNumericPart;

        // Insert New Account as Student
        DB::beginTransaction();
        try {
            $result = Course::create([
                "COURSE_ID" => $newID,
                "TEACHER_ID" => Auth::guard('teacher_guard')->user()->TEACHER_ID,
                "COURSE_NAME" => $name,
                "COURSE_DESC" => $req->COURSE_DESC,
                "COURSE_LEVEL" => $req->COURSE_LEVEL,
                "COURSE_CLASS" => $class,
                "COURSE_DAY" => $day,
                "COURSE_LENGTH" => $req->COURSE_LENGTH,
            ]);

            DB::commit();

            return redirect('teacher/classroom')->with('notification', "You have new class to teach!");
        }
        catch(Exception $ex) {
            DB::rollBack();
            return redirect('teacher/classroom')->with('notification', "There is something wrong!");
        }
    }
}
