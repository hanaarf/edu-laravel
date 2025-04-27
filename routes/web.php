<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\JenjangController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\HasilLatihanController;
use App\Http\Controllers\LatihanPdfController;
use App\Http\Controllers\LatihanSoalController;
use App\Http\Controllers\LatihanVideoController;
use App\Http\Controllers\MateriPdfController;
use App\Http\Controllers\MateriVideoController;
use App\Http\Controllers\Teacher\BaseController as TeacherBaseController;
use App\Models\LatihanVideo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('edu');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('A')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::controller(BaseController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('a.dashboard');
    });
    Route::resource('jenjang', JenjangController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('data_admin', AdminController::class);
    Route::resource('data_guru', GuruController::class);
    Route::resource('data_siswa', SiswaController::class);
});

Route::middleware('auth')->group(function () {
    // materi video
    Route::resource('materi_video', MateriVideoController::class);
    Route::get('materi_video/kelas/{kelas_id}', [MateriVideoController::class, 'filterByKelas'])->name('materi_video.filter');
    Route::get('/get-kelas/{jenjang_id}', [MateriVideoController::class, 'getKelas']);
  
    // latihan video
    Route::resource('latihan_video', LatihanVideoController::class);
    Route::get('/latihan_video/filter/{kelas}', [LatihanVideoController::class, 'filter'])->name('latihan_video.filter');

    // upload-ck
    Route::post('latihan/upload-ck', [LatihanVideoController::class, 'upload'])->name('latihan.upload-ck');

    // get materi,kelas
    Route::get('/get-materi/{kelas_id}', [LatihanVideoController::class, 'getMateriVideo']);
    // hasil latihan
    Route::resource('hasil_latihan', HasilLatihanController::class);
});

Route::prefix('T')->middleware(['auth', 'isTeacher'])->group(function () {
    Route::controller(TeacherBaseController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('t.dashboard');
    });
});
