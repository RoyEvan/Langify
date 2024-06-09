<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentClassDetailController extends Controller
{
    public function class_detail(Request $req)
    {
        $active_route = "classroom";
        $student = Auth::guard('student_guard')->user();

        $course =  $student->Course()->find($req->course_id);
        if(!$course) return redirect("student/classroom/")->with("notification", "You haven't signed up for that class.");

        $students = $course->Student()->wherePivot("IS_FINISHED", 0)->get();
        $materials = $course->Material()->get();
        $assign = $course->Assignment()->get();

        $combined = DB::table('assignments')
            ->select('ASSIGNMENT_ID', 'COURSE_ID', 'ASSIGNMENT_TITLE', 'ASSIGNMENT_DESC', 'CREATED_AT', 'UPDATED_AT', 'DELETED_AT', 'DEADLINE')
            ->where('COURSE_ID', $req->course_id)
            ->unionAll(
                DB::table('materials')
                ->select('MATERIAL_ID', 'COURSE_ID', 'MATERIAL_TITLE', 'MATERIAL_DESC', 'CREATED_AT', 'UPDATED_AT', 'DELETED_AT', DB::raw('NULL AS DEADLINE'))
                ->where('COURSE_ID', $req->course_id)
            )
            ->orderBy('CREATED_AT','DESC')
            ->get();

        return view("page.student.class_detail", compact("active_route", "course", "materials", "student", "combined", "assign"));
    }
}
