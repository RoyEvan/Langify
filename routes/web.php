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

    Route::prefix("classroom")->group(function() {
        Route::get('/', [StudentClassroomController::class, "classroom"]);

        Route::prefix("{course_id}")->group(function() {
            Route::get('/', [StudentClassDetailController::class, "class_detail"]);
            Route::get('download/material/{file_id}', [StudentClassroomController::class, "download_material"]);
        });
    });

    Route::prefix("account_settings")->group(function() {
        Route::get('/', [StudentAccountController::class, "account_settings"]);
        Route::get('update', [StudentAccountController::class, "updateSetting"]);
        Route::post('join_class', [StudentAccountController::class, "join_class"]);
        Route::post('become_teacher', [StudentAccountController::class, "become_teacher"]);
    });

    Route::prefix("assignment/{assignment_id}")->group(function() {
        Route::get('/', [StudentAssignmentController::class, "assignment"]);
        Route::post('upload/tugas', [StudentAssignmentController::class, "upload_assign"]);
    });
});

Route::prefix("teacher")->middleware(['CekRole:teacher'])->group(function () {
    Route::get('/', [TeacherDashboardController::class, "dashboard"]);
    Route::post('/add/classroom', [TeacherClassroomController::class, "create_classroom"]);
    Route::get('classroom/{course_id?}', [TeacherClassroomController::class, "classroom"]);

    Route::prefix("classroom/{course_id}")->group(function() {
        Route::post('upload/material', [TeacherClassDetailController::class, "upload_material"]);
        Route::post('add/assignment', [TeacherClassDetailController::class, "add_tugas"]);
        Route::get('delete/material/{material_id}', [TeacherClassDetailController::class, "delete_material"]);

        Route::prefix("download")->group(function() {
            Route::get('material/{file_id}', [TeacherClassDetailController::class, "download_material"]);
            Route::get('assignment/{assignment_id}/{student_id}', [TeacherAssignmentController::class, "download_assignment"]);
        });
    });


    Route::prefix("account_settings")->group(function() {
        Route::get('/', [TeacherAccountController::class, "account_settings"]);
        Route::get('update', [TeacherAccountController::class, "updateSetting"]);
    });


    Route::prefix("assignment")->group(function() {
        Route::get('{assignment_id?}', [TeacherAssignmentController::class, "assignment"]);
        Route::post('{assignment_id}/grade', [TeacherAssignmentController::class, "grade_assignment"]);
    });

});
