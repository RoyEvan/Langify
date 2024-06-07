<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Material;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function dashboard(Request $req)
    {
        $today = Carbon::now();
        $accountData = Auth::guard('student_guard')->user();
        $siswa = Student::find($accountData->STUDENT_ID);
        $course = $siswa->Course()->wherePivot("IS_FINISHED", 0)->get();
        $assign = Assignment::where('DEADLINE', '>=',  $today)->get();
        $active_route = "dashboard";
        //dd($assign);


        $materials = [];
        $material_files = [];
        foreach($course as $c) {
            foreach($c->Material()->limit(2)->get() as $m) {
                $materials[] = $m;

                if(count($m->MaterialFile) > 0) $material_files[] = $m->MaterialFile()->first();
            }
        }

        return view('page.student.dashboard', compact('active_route','course','assign','today','materials','material_files'));
    }
}
