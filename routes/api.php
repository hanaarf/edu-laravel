<?php

use App\Http\Controllers\Api\ArtikelApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\JenjangController;
use App\Http\Controllers\Api\MateriApiController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/jenjang', [JenjangController::class, 'getJenjang']);
Route::get('/kelas/{jenjang_id}', [JenjangController::class, 'getKelasByJenjang']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/complete-registration', [AuthController::class, 'completeRegistration']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/materi', [MateriApiController::class, 'index']);
});
