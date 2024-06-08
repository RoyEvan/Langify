<?php

namespace App\Http\Controllers\Student;
use App\Models\Assignment;
use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Models\AssignmentFile;
use App\Models\Course;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Assign;

class StudentAssignmentController extends Controller
{
    // public function assignmentDetail(Request $req)
    // {
    //     $active_route = "dashboard";

    //     //dd($studentDone->pivot->SCORE);

    //     return view("page.student.assignment", compact('active_route'));

    // }
    public function assignment (Request $req){
        $active_route = "dashboard";
        $user = Auth::guard('student_guard')->user();
        if ($req->assignment_id) {
            $today = Carbon::today();
            $assign =  Assignment::find($req->assignment_id);
            $course = Course::find($assign->COURSE_ID);
            $student = $course->Student()->wherePivot("IS_FINISHED", 0)->get();
            $studentDone = $assign->Student()->get();
            $teacher = Teacher::find($course->TEACHER_ID);
            if (!$assign) {
                $today = Carbon::today();
                $course = Auth::guard('student_guard')->user()->Course()->wherePivot("IS_FINISHED", 0)->get();
                $assign =  Assignment::where('DEADLINE', '>=',  $today)->get();
                return redirect("student/")->with("notification", "You don't have this task!.", compact('active_route','course', 'assign' ,'today'));
            };
            return view('page.student.assignment', compact('active_route','assign','course','teacher','student','studentDone','user','today'));
        }else {
            $today = Carbon::today();
            $course = Auth::guard('student_guard')->user()->Course()->wherePivot("IS_FINISHED", 0)->get();
            $assign =  Assignment::where('DEADLINE', '>=',  $today)->get();
            //$student = Auth::guard('student_guard')->user();
            return redirect("student/")->with(compact('active_route','course', 'assign' ,'today'));
        }
    }

    public function upload_assign (Request $req){
        $cid = $req->assignment_id;

        $assign = Assignment::find($cid);

        if(!$assign) return redirect("student/")->with("notification", "Page Not Found!");

        $req->validate([
            "fileAssign"  => "file"
        ],[
            "fileAssign.file"  => "File tidak valid"
        ],[]);

        $file = $req->file("fileAssign");
        if($file) {
            $mid = $assign->ASSIGNMENT_ID;
            $filename = $mid . "_" . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . "." . $file->getClientOriginalExtension();
            $foldername = "FileAssignments";

            $assignmentFile = new AssignmentFile([
                'ASSIGNMENT_ID' => $mid,
                'ASSIGNMENT_FILE_PATH' => "$filename"
            ]);
            $assignmentFile->save();

            $file->storeAs($foldername, $filename, "local");
            return redirect("student/assignment/$cid")->with("notification", "Berhasil Mengumpulkan Tugas");
        }
    }

}
