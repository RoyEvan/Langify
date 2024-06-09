<?php

namespace App\Http\Controllers\Student;
use App\Models\Assignment;
use App\Http\Controllers\Controller;
use App\Models\AssignmentFile;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAssignmentController extends Controller
{
    public function assignment (Request $req){
        $active_route = "dashboard";
        $user = Auth::guard('student_guard')->user();

        $today = Carbon::today();

        $course = $user->Course()->wherePivot("IS_FINISHED", 0)->get();

        if ($req->assignment_id) {
            // Checking whether the student has joined that course or not
            // In order to see the assignment
            $assignment_cid = Assignment::find($req->assignment_id)->Course->COURSE_ID;
            $course_joined = $course->find($assignment_cid);
            if (!$course_joined) return back()->with("notification", "You don't have this task!.");

            $assign = Assignment::find($req->assignment_id);

            $student = $assign->Course->Student()->wherePivot("IS_FINISHED", 0)->get();
            $studentDone = $assign->Student;

            return view('page.student.assignment', compact('active_route','assign','student','studentDone','user','today'));
        }
        else {
            return back();
        }
    }

    public function upload_assign (Request $req){
        $aid = $req->assignment_id;

        $assign = Assignment::find($aid);

        if(!$assign) return back()->with("notification", "You don't have this assignment!");

        $req->validate([
            "fileAssign"  => "file"
        ],[
            "fileAssign.file"  => "File tidak valid"
        ],[]);

        $file = $req->file("fileAssign");
        if(!$file) return back()->with("notification", "You have not uploaded any file!");

        $aid = $assign->ASSIGNMENT_ID;
        $filename = $aid . "_" . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . "." . $file->getClientOriginalExtension();
        $foldername = "FileAssignments";

        $student = Auth::guard("student_guard")->user();
        $result = $student->Assignment()->attach($assign, ['FILE_PATH' => $filename, "SCORE" => 0, "CREATED_AT" => new DateTime()]);

        $file->storeAs($foldername, $filename, "local");
        return redirect("student/assignment/$aid")->with("notification", "Berhasil Mengumpulkan Tugas");
    }
}
