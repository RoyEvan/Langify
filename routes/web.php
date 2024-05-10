<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;


Route::get('/', [SiteController::class, "index"]);


Route::prefix("login")->group(function () {
    Route::get('/', [SiteController::class, "login"]);
    Route::post('/', [SiteController::class, "login"]);
});

Route::prefix("student")->group(function () {
    Route::get('/', [SiteController::class, "dashboard"]);
    Route::get('/kelas', [SiteController::class, "kelas"]);
    Route::get('/tugas', [SiteController::class, "tugas"]);
    Route::get('/detail_kelas', [SiteController::class, "detail_kelas"]);
});

Route::prefix("teacher")->group(function () {
    Route::get('/', [SiteController::class, ""]);
});

Route::prefix("admin")->group(function () {
    // Route::get();
});
