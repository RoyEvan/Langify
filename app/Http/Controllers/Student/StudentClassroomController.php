<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentClassroomController extends Controller
{
    public function classroom(Request $req)
    {
        $active_route = "classroom";

        $student = Auth::guard('student_guard')->user();
        $courses = $student->Course()->wherePivot("IS_FINISHED", 0)->get();

        return view('page.student.classroom', compact('active_route', 'courses', 'student'));
    }

    public function download_material(Request $req) {
        return Storage::disk("local")->download("materials/$req->file_id");
    }
}
