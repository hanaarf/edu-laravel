<?php

use App\Http\Controllers\Api\ArtikelApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/complete-registration', [AuthController::class, 'completeRegistration']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/artikel', [ArtikelApiController::class, 'index']);
});
