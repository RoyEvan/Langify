<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAssignmentController extends Controller
{
    public function assignment(Request $req)
    {
        $active_route = "dashboard";
        $teacher = Auth::guard('teacher_guard')->user();
        $today = Carbon::today();

        $course = $teacher->Course;

        if ($req->assignment_id) {
            $assignment_cid = Assignment::find($req->assignment_id)->Course->COURSE_ID;
            $course_taught = $course->find($assignment_cid);
            if (!$course_taught) return back()->with("notification", "You don't have this task!.");

            $assign = Assignment::find($req->assignment_id);
            $student = $course_taught->Student()->wherePivot("IS_FINISHED", 0)->get();
            $studentDone = $assign->Student;


            return view('page.teacher.assignment', compact('active_route','assign','course','teacher','student','studentDone','today'));
        }
        else {
            return back();
        }
    }

    public function download_assignment(Request $req) {
        return Storage::disk("local")->download("FileAssignment/$req->");
    }
}
