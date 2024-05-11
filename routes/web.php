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
    Route::get('/classroom', [SiteController::class, "classroom"]);
    Route::get('/assignment', [SiteController::class, "assignment"]);
    Route::get('/class_detail', [SiteController::class, "class_detail"]);
});

Route::prefix("teacher")->group(function () {
    Route::get('/', [SiteController::class, ""]);
});

Route::prefix("admin")->group(function () {
    // Route::get();
});
