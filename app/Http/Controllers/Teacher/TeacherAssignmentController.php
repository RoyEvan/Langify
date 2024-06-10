<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherAssignmentController extends Controller
{
    public function assignment(Request $req)
    {
        $active_route = "dashboard";
        $teacher = Auth::guard('teacher_guard')->user();
        $today = Carbon::today();

        $course = $teacher->Course;

        $assignment_cid = Assignment::find($req->assignment_id)->Course->COURSE_ID;
        $course_taught = $course->find($assignment_cid);
        if (!$course_taught) return back()->with("notification", "You don't teach this course!.");

        $assign = Assignment::find($req->assignment_id);
        $student = $course_taught->Student()->wherePivot("IS_FINISHED", 0)->get();
        $studentDone = $assign->Student;

        return view('page.teacher.assignment', compact('active_route','assign','teacher','student','studentDone','today'));
    }

    public function grade_assignment(Request $req) {
        $req->validate([
            "sid" => "required",
            "score" => "required|integer|min:0|max:100"
        ],[
            "sid.required" => "Invalid student!"
        ],[]);

        $teacher = Auth::guard('teacher_guard')->user();
        $course = $teacher->Course;
        $assignment = Assignment::find($req->assignment_id);
        $assignment_cid = $assignment->Course->COURSE_ID;
        $course_taught = $course->find($assignment_cid);
        if (!$course_taught) return back()->with("notification", "You don't teach this course!.");

        $student = Student::find($req->sid);
        // dd($student->Assignment->find($req->assignment_id));
        if($student->Assignment->find($req->assignment_id)) {
            $result = $student->Assignment()->updateExistingPivot($assignment, [
                'SCORE' => $req->score,
            ]);
        }

        return back();
    }

    public function download_assignment(Request $req) {
        $teacher = Auth::guard('teacher_guard')->user();
        $course = $teacher->Course;
        $assignment_cid = Assignment::find($req->assignment_id)->Course->COURSE_ID;
        $course_taught = $course->find($assignment_cid);
        if (!$course_taught) return back()->with("notification", "You don't teach this course!.");


        $assignment = Assignment::find($req->assignment_id);
        $student = $assignment->Student()->find($req->sid);
        $filename = $student->pivot->FILE_PATH;
        return Storage::disk("local")->download("assignments/". $filename);
    }
}
