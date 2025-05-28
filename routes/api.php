<?php

use App\Http\Controllers\Api\ArtikelApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FollowController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\JenjangController;
use App\Http\Controllers\Api\MateriApiController;
use App\Http\Controllers\Api\SiswaApiController;
use App\Http\Controllers\Api\UlasanApiController;
use App\Models\SiswaProfile;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('/reset-password', [ForgotPasswordController::class, 'reset']);

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
    Route::get('/ulasan/status', [UlasanApiController::class, 'status']); 

    Route::post('/siswa/update-menit', [SiswaApiController::class, 'updateMenit']);   
    Route::post('/siswa/update-profile', [SiswaApiController::class, 'updateProfile']);   
    Route::put('/siswa/update-avatar', [SiswaApiController::class, 'updateAvatar']);   
    Route::get('/siswa/search-users', [SiswaApiController::class, 'searchUser']);   
    Route::get('/siswa/users/{id}', [SiswaApiController::class, 'showUser']);   
    Route::get('/siswa/leaderboard', [SiswaApiController::class, 'leaderboard']);  

    Route::get('/siswa/latihan-materi', [SiswaApiController::class, 'latihanMateri']);   
    Route::get('/siswa/latihan-soal/{materi_id}', [SiswaApiController::class, 'latihanSoal']);   
    Route::post('/siswa/jawaban-soal', [SiswaApiController::class, 'simpanJawaban']);   

  Route::post('/follow', [FollowController::class, 'follow']);
    Route::post('/unfollow', [FollowController::class, 'unfollow']);
    Route::get('/is-following/{userId}', [FollowController::class, 'isFollowing']);
});



