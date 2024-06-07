<?php

namespace App\Http\Controllers\Student;
use App\Models\Assignment;
use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAssignmentController extends Controller
{
    public function assignment(Request $req)
    {
        $active_route = "dashboard";

        //dd($studentDone->pivot->SCORE);

        return view("page.student.assignment", compact('active_route'));

    }
    public function assignmentDetail(Request $req){
        $active_route = "dashboard";
        $user = Auth::guard('student_guard')->user();
        if ($req->assignment_id) {

            $assign =  Assignment::find($req->assignment_id);
            $course = Course::find($assign->COURSE_ID);
            $student = $course->Student()->wherePivot("IS_FINISHED", 0)->get();
            $studentDone = $assign->Student()->get();
            $teacher = Teacher::find($course->TEACHER_ID);
            if (!$assign) {
                return redirect("student/")->with("notification", "You don't have this task!.");
            }
            return view('page.student.assignment', compact('active_route','assign','course','teacher','student','studentDone','user'));
        }else {
            $today = Carbon::today();
            $course = Auth::guard('student_guard')->user()->Course()->wherePivot("IS_FINISHED", 0)->get();
            $assign =  Assignment::where('DEADLINE', '>=',  $today)->get();
            //$student = Auth::guard('student_guard')->user();
            return redirect("student/")->with(compact('active_route','course', 'assign' ,'today'));
        }
    }
}
