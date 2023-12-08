<?php

use App\Http\Controllers\CalegController;
use App\Http\Controllers\DapilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\KecamatanController;
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

// Backsite Page Start
Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){

    // Dasboard Page
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/desa/{desa_id}', [DashboardController::class, 'show'])->name('desa.show');

    // User Page
    Route::resource('user', UserController::class);

    // Permission Page
    Route::get('permission', [PermissionController::class, 'index'])->name('permission');

    // Caleg Page
    Route::get('caleg', [CalegController::class, 'index'])->name('caleg');

    // Dapil Page
    Route::get('dapil', [DapilController::class, 'index'])->name('dapil');

    // Desa Page
    Route::get('desa', [DesaController::class, 'index'])->name('desa');

    // Kecamatan Page
    Route::get('kecamatan', [KecamatanController::class, 'index'])->name('kecamatan');

    // Tps Page
    Route::get('tps', [TpsController::class, 'index'])->name('tps');

    // Role Page
    Route::get('role', [RoleController::class, 'index'])->name('role');

    // Role Page
    Route::resource('saksi', SaksiController::class);
    Route::post('get-desa', [SaksiController::class, 'getDesa'])->name('gd');
    Route::get('get-tps', [SaksiController::class, 'getTps'])->name('gt');
});
// Backsite Page End

