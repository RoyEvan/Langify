<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Material;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Assign;

class TeacherDashboardController extends Controller
{
    public function dashboard(Request $req)
    {
        $active_route = "dashboard";


        $today  = Carbon::now();
        $teacherLogin = Auth::guard('teacher_guard')->user();
        $teacher = Teacher::find($teacherLogin->TEACHER_ID);
        $course = $teacher->Course()->get();
        $assign = Assignment::where('DEADLINE', '>=',  $today)->get();


        $materi = Material::get();
        $materials = [];
        $material_files = [];
        foreach($course as $c) {
            foreach($c->Material()->limit(2)->get() as $m) {
                $materials[] = $m;

                if(count($m->MaterialFile) > 0) $material_files[] = $m->MaterialFile()->first();
            }
        }
        return view('page.teacher.dashboard', compact('active_route','teacher','course','assign','materials','material_files','assign','materi','today'));
    }
}
