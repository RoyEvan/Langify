<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function dashboard(Request $req)
    {
        $accountData = Auth::guard('student_guard')->user();
        $siswa = Student::find($accountData->STUDENT_ID);
        $course = $siswa->Course()->get();
        $assign = Assignment::get();
        $active_route = "dashboard";
        //dd($siswa);
        return view('page.student.dashboard', compact('active_route','course','assign'));
    }
}
