<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function dashboard(Request $req) {

    }

    public function login(Request $req) {
        return view('layout.login');
    }

    public function doLogin(Request $req) {

    }
}
