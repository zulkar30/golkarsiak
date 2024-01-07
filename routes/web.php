<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalegController;
use App\Http\Controllers\DapilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaksiController;
use App\Http\Controllers\TpsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/user/change-password', [UserController::class, 'changePassword'])->name('user.change-password');
Route::post('/user/change-password', [UserController::class, 'changePasswordUpdate'])->name('user.change-password.update');

// Backsite Page Start
Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){

    // Dasboard Page
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/desa/{desa_id}', [DashboardController::class, 'show'])->name('desa.show');

    // User Page
    Route::resource('user', UserController::class);
    Route::get('/user/profile', [UserController::class, 'showUser'])->name('user.profile');
    Route::get('profile/{user}/edit', [UserController::class, 'editFoto'])->name('edit.foto');
    Route::put('profile/{user}', [UserController::class, 'updateFoto'])->name('update.foto');


    // Permission Page
    Route::get('permission', [PermissionController::class, 'index'])->name('permission');

    // Caleg Page
    Route::get('caleg', [CalegController::class, 'index'])->name('caleg');
    Route::get('caleg/{caleg}/edit', [CalegController::class, 'edit'])->name('caleg.edit');
    Route::put('caleg/{caleg}', [CalegController::class, 'update'])->name('caleg.update');

    // Dapil Page
    Route::get('dapil', [DapilController::class, 'index'])->name('dapil');

    // Desa Page
    Route::get('desa', [DesaController::class, 'index'])->name('desa');

    // Kecamatan Page
    Route::get('kecamatan', [KecamatanController::class, 'index'])->name('kecamatan');

    // Paket Page
    Route::get('paket', [PaketController::class, 'index'])->name('paket');
    Route::get('paket/{paket}/edit', [PaketController::class, 'edit'])->name('paket.edit');
    Route::put('paket/{paket}', [PaketController::class, 'update'])->name('paket.update');

    // Tps Page
    Route::get('tps', [TpsController::class, 'index'])->name('tps');

    // Role Page
    Route::get('role', [RoleController::class, 'index'])->name('role');

    // Pengurus Page
    Route::get('kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::post('kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
    Route::get('kegiatan/{kegiatan}', [KegiatanController::class, 'show'])->name('kegiatan.show');
    Route::put('kegiatan/{kegiatan}', [KegiatanController::class, 'update'])->name('kegiatan.update');
    Route::delete('kegiatan/{kegiatan}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
    Route::get('kegiatan/{kegiatan}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
    Route::post('kegiatan/terima/{id}', [KegiatanController::class, 'terima'])->name('kegiatan.terima');
    Route::post('kegiatan/tunda/{id}', [KegiatanController::class, 'tunda'])->name('kegiatan.tunda');

    // Saksi Page
    Route::resource('saksi', SaksiController::class);
    Route::post('get-desa', [SaksiController::class, 'getDesa'])->name('gd');
    Route::get('get-tps', [SaksiController::class, 'getTps'])->name('gt');
});
// Backsite Page End

