<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::prefix('langify')->group(function () {
    Route::get('/', [SiteController::class, 'login']);

    Route::prefix('student')->group(function() {
        Route::get('/', [SiteController::class, ]);
    });

    Route::prefix('teacher')->group(function() {

    });
});
