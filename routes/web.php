<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserloginController;
use App\Http\Controllers\Admin\DatakaryawanController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// route untuk user 
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/export-pdf', [UserController::class, 'exportPdf'])->name('user.export.pdf');
    Route::get('/profileindex', [MyProfileController::class, 'show'])->name('profileindex');
});


// route untuk admin
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/userlogin', [UserloginController::class, 'index'])->name('admin.userlogin');
    Route::delete('/admin/userlogin/delete/{id}', [UserloginController::class, 'destroy'])->name('user.delete');
    Route::resource('/admin/datakaryawan', DatakaryawanController::class);
    Route::get('admin/gaji', [GajiController::class, 'index'])->name('gaji');
    Route::get('/gaji/create', [GajiController::class, 'create'])->name('gaji.create');
    Route::post('/gaji', [GajiController::class, 'store'])->name('gaji.store');
    Route::get('/gaji/{gaji}', [GajiController::class, 'show'])->name('gaji.show');
});

// route untuk pengajuan 
Route::middleware(['auth'])->group(function () {  
    Route::get('pengajuanabsen', [PengajuanController::class, 'create']);
    Route::post('/pengajuan/store', [PengajuanController::class, 'store'])->name('pengajuanstore');
    Route::get('/admin/pengajuan', [PengajuanController::class, 'index'])->name('frondpengajuan');
    Route::post('/admin/pengajuan/{id}/konfirmasi', [PengajuanController::class, 'konfirmasi'])->name('konfirmasi');
    Route::post('/admin/pengajuan/{id}/tolak', [PengajuanController::class, 'tolak'])->name('tolak');
    Route::post('/admin/pengajuan/{id}/hapus', [PengajuanController::class, 'destroy'])->name('hapus');
});

// route untuk presensi
Route::middleware(['auth'])->group(function () {
    Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi.index'); 
    Route::get('admin/presensi', [PresensiController::class, 'indexadmin'])->name('admin.presensi'); 
    Route::delete('admin/presensi/hapus/{id}', [PresensiController::class, 'destroy'])->name('admin.presensihapus');
    Route::post('/presensi', [PresensiController::class, 'store'])->name('presensi.store'); 
    Route::post('/presensi/keluar', [PresensiController::class, 'presensikeluar'])->name('presensi.keluar'); 
});

// route untuk gaji
Route::post('/gaji/{id}/bayar', [GajiController::class, 'bayar'])->name('gaji.bayar');
Route::delete('/gaji/{id}', [GajiController::class, 'destroy'])->name('gaji.destroy');


require __DIR__.'/auth.php';
