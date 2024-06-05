<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Material;
use App\Models\MaterialFile;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherClassroomController extends Controller
{
    public function classroom(Request $req)
    {
        $active_route = "classroom";

        if($req->course_id) {

            $course = Auth::guard('teacher_guard')->user()->Course()->find($req->course_id);
            // $course = Course::find($req->course_id);
            if(!$course) return redirect("teacher/classroom")->with("msg", "Page Not Found!");

            $students = $course->Student()->wherePivot("IS_FINISHED", 0)->get();


            $materials = $course->Material()->get();

            // foreach($materials as $m) {
            //     dump($m->MaterialFile);
            // }
            // dd("..");

            $files = Storage::disk("local")->files("assignments");

            return view("page.teacher.class_detail", compact("active_route", "course", "materials", "students", "files"));
        }
        else {
            $courses = Auth::guard('teacher_guard')->user()->Course()->get();
            $teacher = Auth::guard('teacher_guard');

            return view('page.teacher.classroom', compact('active_route', 'courses', 'teacher'));
        }
    }

    public function upload_material(Request $req) {
        $cid = $req->course_id;

        $course = Course::find($cid);
        if(!$course) return redirect("teacher/classroom")->with("msg", "Page Not Found!");

        $req->validate([
            "materialfile"  => "file",
            "materialtitle" => "required|string|min:6|max:32",
            "materialdesc"  => "required|string|max:255"
        ],[
            "materialfile.file"  => "File tidak valid",
            "materialtitle.required" => "Judul materi wajib diisi!",
            "materialtitle.string" => "Judul Materi hanya boleh string!",
            "materialtitle.min" => "Panjang minimal judul materi yaitu 6 karakter!",
            "materialtitle.max" => "Panjang maksimal judul materi yaitu 32 karakter!",
            "materialdesc.required" => "Deskripsi materi wajib diisi!",
            "materialdesc.string" => "Deskripsi materi hanya boleh string!",
            "materialdesc.max" => "Panjang maksimal deskripsi materi yaitu 255 karakter!"
        ],[]);


        $material = new Material([
            'COURSE_ID' => $cid,
            'MATERIAL_TITLE' => $req->materialtitle,
            'MATERIAL_DESC' => $req->materialdesc
        ]);
        $material->save();


        $file = $req->file("materialfile");
        if($file) {
            $mid = Material::orderBy("created_at", "desc")->first()->MATERIAL_ID;
            $filename = $mid . "_" . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . "." . $file->getClientOriginalExtension();
            $foldername = "materials";

            $materialFile = new MaterialFile([
                'MATERIAL_ID' => $material->MATERIAL_ID,
                'MATERIAL_FILE_PATH' => "$filename"
            ]);
            $materialFile->save();

            $file->storeAs($foldername, $filename, "local");
        }

        return redirect("teacher/classroom/$cid")->with("msg", "Berhasil menambahkan materi");
    }

    public function download_material(Request $req) {
        return Storage::disk("local")->download("materials/$req->file_id");;
    }
}
