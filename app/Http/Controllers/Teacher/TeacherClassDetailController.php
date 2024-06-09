<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Material;
use App\Models\MaterialFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherClassDetailController extends Controller
{
    public function class_detail(Request $req)
    {
        $active_route = "classroom";
        $teacher = Auth::guard('teacher_guard')->user();

        $course = $teacher->Course()->find($req->course_id);
        if (!$course) return redirect("teacher/classroom")->with("notification", "Page Not Found!");

        $students = $course->Student()->wherePivot("IS_FINISHED", 0)->get();
        $materials = $course->Material()->get();

        $files = Storage::disk("local")->files("materials");

        return view("page.teacher.class_detail", compact("active_route", "course", "materials", "students", "files"));
    }

    public function add_tugas(Request $req)
    {
        $cid = $req->course_id;

        $course = Course::find($cid);
        if (!$course) return redirect("teacher/classroom")->with("notification", "Page Not Found!");
        $req->validate([
            "assignment_title" => "required|string",
            "assignment_desc" => "required|string",
            "deadline" => "required|date"
        ], [
            "assignment_title.required" => "Judul tugas wajib diisi!!",
            "assignment_title.string" => "Judul tugas hanya boleh string/varchar!!",
            "assignment_desc.required" => "Deskripsi tugas wajib diisi!!",
            "assignment_desc.string" => "Judul tugas hanya boleh string/varchar!!",
            "deadline.required" => "Deadline tugas wajib diisi!!",
            "deadline.date" => "Deadline tugas hanya boleh Tanggal!!",

        ], []);

        $assignment = new Assignment([
            'COURSE_ID' => $cid,
            'ASSIGNMENT_TITLE' => $req->assignment_title,
            'ASSIGNMENT_DESC' => $req->assignment_desc,
            'DEADLINE' => $req->deadline,
        ]);
        $assignment->save();

        return redirect("teacher/classroom/$cid")->with("notification", "Berhasil menambahkan tugas");
    }

    public function upload_material(Request $req)
    {
        $cid = $req->course_id;

        $course = Course::find($cid);
        if (!$course) return redirect("teacher/classroom")->with("notification", "Page Not Found!");

        $req->validate([
            "materialfile"  => "file",
            "materialtitle" => "required|string|min:6|max:32",
            "materialdesc"  => "required|string|max:255"
        ], [
            "materialfile.file"  => "File tidak valid",
            "materialtitle.required" => "Judul materi wajib diisi!",
            "materialtitle.string" => "Judul Materi hanya boleh string!",
            "materialtitle.min" => "Panjang minimal judul materi yaitu 6 karakter!",
            "materialtitle.max" => "Panjang maksimal judul materi yaitu 32 karakter!",
            "materialdesc.required" => "Deskripsi materi wajib diisi!",
            "materialdesc.string" => "Deskripsi materi hanya boleh string!",
            "materialdesc.max" => "Panjang maksimal deskripsi materi yaitu 255 karakter!"
        ], []);


        $material = new Material([
            'COURSE_ID' => $cid,
            'MATERIAL_TITLE' => $req->materialtitle,
            'MATERIAL_DESC' => $req->materialdesc
        ]);
        $material->save();


        $file = $req->file("materialfile");
        if ($file) {
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

        return redirect("teacher/classroom/$cid")->with("notification", "Berhasil menambahkan materi");
    }

    public function delete_material(Request $req)
    {
        $cid = $req->course_id;
        $mid = $req->material_id;


        $materialfile = MaterialFile::where("MATERIAL_ID", '=', $mid)->first();
        if ($materialfile) {
            Storage::disk("local")->delete("materials/" . $materialfile->MATERIAL_FILE_PATH);
            MaterialFile::where("MATERIAL_ID", '=', $mid)->delete();
        }


        $material = Material::find($mid);
        $material->delete();

        return redirect("teacher/classroom/$cid")->with("notification", "Berhasil menghapus materi");
    }

    public function download_material(Request $req)
    {
        return Storage::disk("local")->download("materials/$req->file_id");;
    }
}
