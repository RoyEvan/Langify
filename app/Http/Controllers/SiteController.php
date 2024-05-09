<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function isLoggedIn(Request $req) {
        // Cek Apakah logged in


        return false;
    }

    public function index(Request $req) {
        if($this->isLoggedIn($req)) {
            return redirect("langify/dashboard");
        }
        else {
            return redirect("langify/login");
        }
    }
    public function login(Request $req) {
        return view('layout.login');
    }

    public function dashboard(Request $req) {

    }

}
