<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Material;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAssignmentController extends Controller
{
    public function assignment(Request $req)
    {
        $active_route = "dashboard";
        $user = Auth::guard('teacher_guard')->user();
        $today = Carbon::today();

        $course = $user->Course()->wherePivot("IS_FINISHED", 0)->get();

        if ($req->assignment_id) {

            $assign =  Assignment::find($req->assignment_id);
            $course = Course::find($assign->COURSE_ID);
            $student = $course->Student()->wherePivot("IS_FINISHED", 0)->get();
            $studentDone = $assign->Student()->get();

            if (!$assign) return back()->with("notification", "You don't have this task!.");

            return view('page.teacher.assignment', compact('active_route','assign','course','teacher','student','studentDone','user','today'));
        }
        else {
            return back();
        }
    }
}
