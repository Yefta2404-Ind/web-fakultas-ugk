<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// SUPER ADMIN
use App\Http\Controllers\SuperAdmin\FacultyController as SuperFacultyController;
use App\Http\Controllers\SuperAdmin\AdminUserController;

// FACULTY ADMIN
use App\Http\Controllers\FacultyAdmin\SectionController;
use App\Http\Controllers\FacultyAdmin\ProgramController;
use App\Http\Controllers\FacultyAdmin\LecturerController;
use App\Http\Controllers\FacultyAdmin\FacilityController;
use App\Http\Controllers\FacultyAdmin\AchievementController;
use App\Http\Controllers\FacultyAdmin\NewsController;

// =================== AUTH ===================
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/me', function (Request $request) {
        return $request->user();
    });

    // ============ SUPER ADMIN ROUTES ============
    Route::middleware('role:superadmin')->prefix('super-admin')->group(function () {
        Route::apiResource('faculties', SuperFacultyController::class);
        Route::apiResource('faculty-admins', AdminUserController::class)
            ->only(['index', 'store', 'destroy']);
    });

    // ============ FACULTY ADMIN ROUTES ============
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        // Section
        Route::get('sections', [SectionController::class, 'index']);
        Route::apiResource('sections', SectionController::class)->except(['index']);

        // Program
        Route::get('programs', [ProgramController::class, 'index']);
        Route::apiResource('programs', ProgramController::class)->except(['index']);

        // Lecturer
        Route::get('lecturers', [LecturerController::class, 'index']);
        Route::apiResource('lecturers', LecturerController::class)->except(['index']);

        // Facility
        Route::get('facilities', [FacilityController::class, 'index']);
        Route::apiResource('facilities', FacilityController::class)->except(['index']);

        // Achievement
        Route::get('achievements', [AchievementController::class, 'index']);
        Route::apiResource('achievements', AchievementController::class)->except(['index']);

        // News
        Route::get('news', [NewsController::class, 'index']);
        Route::apiResource('news', NewsController::class)->except(['index']);
    });

});
