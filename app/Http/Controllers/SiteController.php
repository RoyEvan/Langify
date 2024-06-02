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
            return redirect("dashboard");
        } else {
            return redirect("login");
        }
    }
    public function login(Request $req)
    {


        return view('layout.login');
    }

    public function register(Request $req)
    {


        return view('layout.register');
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

    public function account_settings(Request $req)
    {
        $active_route = "account_settings";

        return view('layout.account_settings', compact('active_route'));
    }

    public function assignment(Request $req)
    {
        return view('layout.assignment  ');
    }
}
