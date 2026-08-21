<?php

use App\Http\Controllers\JobManagement\JobManagementController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('job-management')->controller(JobManagementController::class)->group(function () {
        Route::get('add-resume', 'addResumeView')->name('add-resume');
        Route::post('store-resume', 'storeResume')->name('store-resume');
    });
});
