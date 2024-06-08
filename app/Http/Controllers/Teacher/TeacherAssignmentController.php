<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAssignmentController extends Controller
{
    public function assignment(Request $req)
    {

        $active_route = "dashboard";
        $user = Auth::guard('student_guard')->user();
        if ($req->assignment_id) {
            $today = Carbon::today();
            $assign =  Assignment::find($req->assignment_id);
            dd($assign);
            $course = Course::find($assign->COURSE_ID);
            $student = $course->Student()->wherePivot("IS_FINISHED", 0)->get();
            $studentDone = $assign->Student()->get();
            $teacher = Teacher::find($course->TEACHER_ID);
            if (!$assign) {
                $today = Carbon::today();
                $course = Auth::guard('student_guard')->user()->Course()->wherePivot("IS_FINISHED", 0)->get();
                $assign =  Assignment::where('DEADLINE', '>=',  $today)->get();
                $teacherLogin = Auth::guard('teacher_guard')->user();
                $teacher = Teacher::find($teacherLogin->TEACHER_ID);
                $materi = Material::get();
                return redirect("teacher/")->with("notification", "You don't have this task!.", compact('active_route','teacher','course','assign','materi','today'));
            };
            return view('page.teacher.assignment', compact('active_route','assign','course','teacher','student','studentDone','user','today'));
        }else {
            $teacherLogin = Auth::guard('teacher_guard')->user();
            $teacher = Teacher::find($teacherLogin->TEACHER_ID);
            $today = Carbon::today();
            $course = Auth::guard('student_guard')->user()->Course()->wherePivot("IS_FINISHED", 0)->get();
            $assign =  Assignment::where('DEADLINE', '>=',  $today)->get();
            $materi = Material::get();
            //$student = Auth::guard('student_guard')->user();
            return redirect("teacher/")->with(compact('active_route','teacher','course','assign','materi','today'));
        }
    }
}
