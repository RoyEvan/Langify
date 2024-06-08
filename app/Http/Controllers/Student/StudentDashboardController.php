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
        $siswa = Auth::guard('student_guard')->user();
        $course = $siswa->Course()->wherePivot("IS_FINISHED", 0)->get();

        // dd($assign);
        $active_route = "dashboard";


        $assign = [];
        $materials = [];
        $material_files = [];
        foreach($course as $c) {
            foreach($c->Material()->limit(2)->get() as $m) {
                $materials[] = $m;

                if(count($m->MaterialFile) > 0) $material_files[] = $m->MaterialFile()->first();
            }
        }

        foreach($course as $c) {
            foreach($c->Assignment()->where('DEADLINE', '>=',  $today)->get() as $a) {
                $assign[] = $a;
            }
        }
        return view('page.student.dashboard', compact('active_route','course','assign','today','materials','material_files'));
    }
}
