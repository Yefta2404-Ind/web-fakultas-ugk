<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\FacultySectionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/admin/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('admin')->group(function () {

        // CRUD fakultas
        Route::get('/faculties', [FacultyController::class, 'index']);
        Route::post('/faculties', [FacultyController::class, 'store']);
        Route::get('/faculties/{id}', [FacultyController::class, 'show']);
        Route::put('/faculties/{id}', [FacultyController::class, 'update']);
        Route::delete('/faculties/{id}', [FacultyController::class, 'destroy']);

    });

});

Route::prefix('admin')->middleware('auth:sanctum')->group(function () {

    Route::get('faculties/{faculty_id}/sections', [FacultySectionController::class, 'index']);
    Route::get('faculties/{faculty_id}/sections/{section_key}', [FacultySectionController::class, 'show']);
    Route::post('faculties/{faculty_id}/sections/{section_key}', [FacultySectionController::class, 'upsert']);
    Route::delete('faculties/{faculty_id}/sections/{section_key}', [FacultySectionController::class, 'destroy']);

});