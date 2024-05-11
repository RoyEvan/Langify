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
        $active_route = "dashboard";


        return view('layout.dashboard', compact('active_route'));
    }

    public function classroom(Request $req)
    {
        $active_route = "classroom";

        return view('layout.classroom', compact('active_route'));
    }

    public function class_detail(Request $req)
    {
        return view('layout.class_detail');
    }

    public function assignment(Request $req)
    {
        return view('layout.assignment  ');
    }
}
