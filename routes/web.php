<?php

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Admin\JenjangController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\MateriPdfController;
use App\Http\Controllers\MateriVideoController;
use App\Http\Controllers\Teacher\BaseController as TeacherBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('edu');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() { 
    Route::resource('materi_pdf', MateriPdfController::class);
    Route::get('materi_pdf/kelas/{kelas_id}', [MateriPdfController::class, 'filterByKelas'])->name('materi_pdf.filter');
    Route::resource('materi_video', MateriVideoController::class);
    Route::get('materi_video/kelas/{kelas_id}', [MateriVideoController::class, 'filterByKelas'])->name('materi_video.filter');
    Route::get('/get-kelas/{jenjang_id}', [MateriVideoController::class, 'getKelas']);
});


Route::prefix('A')->middleware(['auth', 'isAdmin'])->group(function() {
    Route::controller(BaseController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('a.dashboard');
    });
    Route::resource('jenjang', JenjangController::class);
    Route::resource('kelas', KelasController::class);
});


Route::prefix('T')->middleware(['auth', 'isTeacher'])->group(function() {
    Route::controller(TeacherBaseController::class)->group(function() {
        Route::get('/dashboard', 'index')->name('t.dashboard');
    });
});