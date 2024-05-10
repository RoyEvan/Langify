<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function isLoggedIn(Request $req)
    {
        // Cek Apakah logged in


        return false;
    }

    public function index(Request $req)
    {
        if ($this->isLoggedIn($req)) {
            return redirect("langify/dashboard");
        } else {
            return redirect("langify/login");
        }
    }
    public function login(Request $req)
    {
        return view('layout.login');
    }

    public function dashboard(Request $req)
    {
        return view('layout.dashboard');
    }

    public function kelas(Request $req)
    {
        return view('layout.kelas');
    }

    public function detail_kelas(Request $req)
    {
        return view('layout.detail_kelas');
    }

    public function tugas(Request $req)
    {
        return view('layout.tugas');
    }
}
