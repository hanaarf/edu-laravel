<?php

use App\Http\Controllers\Api\ArtikelApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\JenjangController;
use App\Http\Controllers\Api\MateriApiController;
use App\Http\Controllers\Api\SiswaApiController;
use App\Http\Controllers\Api\UlasanApiController;
use App\Models\SiswaProfile;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/jenjang', [JenjangController::class, 'getJenjang']);
Route::get('/kelas/{jenjang_id}', [JenjangController::class, 'getKelasByJenjang']);
Route::get('/materi/search-public', [MateriApiController::class, 'searchByJudulPublic']);

// 🔐 Route ini khusus user login (filter jenjang & kelas)
Route::middleware('auth:sanctum')->get('/materi/search', [MateriApiController::class, 'search']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/complete-registration', [AuthController::class, 'completeRegistration']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'getProfile']);

    Route::get('/materi', [MateriApiController::class, 'index']);
    Route::get('/materi-limit', [MateriApiController::class, 'indexLimit']);
    Route::get('/materi/{id}', [MateriApiController::class, 'show']);   

    Route::post('/ulasan', [UlasanApiController::class, 'store']);  

    Route::post('/siswa/update-menit', [SiswaApiController::class, 'updateMenit']);   
    Route::post('/siswa/update-profile', [SiswaApiController::class, 'updateProfile']);   
    Route::put('/siswa/update-avatar', [SiswaApiController::class, 'updateAvatar']);   
});


