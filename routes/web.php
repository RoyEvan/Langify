<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
use App\Http\Middleware\CekRole;
use Illuminate\Support\Facades\Route;



Route::get('/', [SiteController::class, "index"]);


Route::prefix("login")->group(function () {
    Route::get('/', [LoginController::class, "login"]);
    Route::post('/doLogin', [LoginController::class, "doLogin"]);
});

Route::prefix("logout")->group(function () {
    Route::get('/', [LoginController::class, "logout"]);
});

Route::prefix("register")->group(function () {
    Route::get('/', [RegisterController::class, "register"]);
    Route::post('/doRegister', [RegisterController::class, "doRegister"]);
});

Route::prefix("student")->middleware(['CekRole:student'])->group(function () {
    Route::get('/', [StudentDashboardController::class, "dashboard"]);

    Route::get('/classroom/{course_id?}', [StudentClassroomController::class, "classroom"]);

    Route::get('/account_settings', [StudentAccountController::class, "account_settings"]);
    Route::get('/account_settings/update', [StudentAccountController::class, "updateSetting"]);

    Route::get('/assignment', [StudentAssignmentController::class, "assignment"]);
});

Route::prefix("teacher")->middleware(['CekRole:teacher'])->group(function () {
    Route::get('/', [TeacherDashboardController::class, "dashboard"]);

    Route::get('/classroom/{course_id?}', [TeacherClassroomController::class, "classroom"]);
    Route::post('/classroom/{course_id}/upload/material', [TeacherClassroomController::class, "upload_material"]);
    Route::get('/classroom/{course_id}/download/material/{file_id}', [TeacherClassroomController::class, "download_material"]);

    Route::get('/account_settings', [TeacherAccountController::class, "account_settings"]);
    Route::get('/account_settings/update', [TeacherAccountController::class, "updateSetting"]);


    Route::get('/assignment', [TeacherAssignmentController::class, "assignment"]);
    Route::get('/class_detail', [TeacherClassDetailController::class, "class_detail"]);
});

Route::prefix("admin")->group(function () {
    // Route::get();
});
