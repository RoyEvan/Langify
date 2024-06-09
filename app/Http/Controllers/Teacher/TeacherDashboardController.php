<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Material;
use App\Models\Teacher;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Assign;

class TeacherDashboardController extends Controller
{
    public function dashboard(Request $req)
    {
        $active_route = "dashboard";

        $teacher = Auth::guard('teacher_guard')->user();
        $today  = new DateTime("", new DateTimeZone("Asia/Jakarta"));

        $course = $teacher->Course()->get();

        $assign = [];
        $materials = [];
        $material_files = [];
        foreach($course as $c) {
            foreach($c->Material()->limit(2)->get() as $m) {
                $materials[] = $m;

                if(count($m->MaterialFile) > 0) $material_files[] = $m->MaterialFile()->first();
            }

            foreach($c->Assignment()->where('DEADLINE', '>=',  $today)->get() as $a) {
                $assign[] = $a;
            }
        }
        return view('page.teacher.dashboard', compact('active_route','teacher','course','assign','materials','material_files','assign','today'));

    }
}
