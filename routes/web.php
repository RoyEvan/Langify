<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\Student\StudentAccountController;
use App\Http\Controllers\Student\StudentAssignmentController;
use App\Http\Controllers\Student\StudentClassDetailController;
use App\Http\Controllers\Student\StudentClassroomController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Teacher\TeacherAccountController;
use App\Http\Controllers\Teacher\TeacherAssignmentController;
use App\Http\Controllers\Teacher\TeacherClassDetailController;
use App\Http\Controllers\Teacher\TeacherClassroomController;
use App\Http\Controllers\Teacher\TeacherDashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', [SiteController::class, "index"]);


Route::prefix("login")->group(function () {
    Route::get('/', [SiteController::class, "login"]);
    Route::post('/', [SiteController::class, "login"]);
});

Route::prefix("register")->group(function () {
    Route::get('/', [SiteController::class, "register"]);
    Route::post('/', [SiteController::class, "register"]);
});

Route::prefix("student")->group(function () {
    Route::get('/', [StudentDashboardController::class, "dashboard"]);
    Route::get('/classroom', [StudentClassroomController::class, "classroom"]);
    Route::get('/account_settings', [StudentAccountController::class, "account_settings"]);

    Route::get('/assignment', [StudentAssignmentController::class, "assignment"]);
    Route::get('/class_detail', [StudentClassDetailController::class, "class_detail"]);
});

Route::prefix("teacher")->group(function () {
    Route::get('/', [TeacherDashboardController::class, "dashboard"]);
    Route::get('/classroom', [TeacherClassroomController::class, "classroom"]);
    Route::get('/account_settings', [TeacherAccountController::class, "account_settings"]);

    Route::get('/assignment', [TeacherAssignmentController::class, "assignment"]);
    Route::get('/class_detail', [TeacherClassDetailController::class, "class_detail"]);
});

Route::prefix("admin")->group(function () {
    // Route::get();
});
