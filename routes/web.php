<?php

use Illuminate\Support\Facades\Route;

// ==============================
// CONTROLLER
// ==============================


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PtController;
use App\Http\Controllers\PtRegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PtDashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\JadwalController;

// ============================================================
// ADMIN - DASHBOARD
// ============================================================
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [
        DashboardController::class,
        'TampilDashboardAdminFunction'
    ])->name('dashboard');

    // Daftar PT Travel
    Route::get('/pt', [
        PtController::class,
        'TampilDataPtFunction'
    ])->name('pt.index');

    // Detail PT
    Route::get('/pt/{pt}', [
        PtController::class,
        'TampilDetailPtFunction'
    ])->name('pt.show');

    // Setujui PT
    Route::patch('/pt/{pt}/approve', [
        PtController::class,
        'SetujuiPtFunction'
    ])->name('pt.approve');

    // Tolak PT
    Route::patch('/pt/{pt}/reject', [
        PtController::class,
        'TolakPtFunction'
    ])->name('pt.reject');

});

// ============================================================
// REGISTRASI PT TRAVEL
// ============================================================

Route::get('/pt/register', [
    PtRegistrationController::class,
    'TampilFormRegistrasiPtFunction'
])->name('pt.register');

Route::post('/pt/register', [
    PtRegistrationController::class,
    'SimpanRegistrasiPtFunction'
])->name('pt.register.store');

// ============================================================
// LOGIN
// ============================================================

// Menampilkan halaman login
Route::get('/login', [
    LoginController::class,
    'TampilFormLoginFunction'
])->name('login');

// Memproses login
Route::post('/login', [
    LoginController::class,
    'ProsesLoginFunction'
])->name('login.process');

// Logout
Route::post('/logout', [
    LoginController::class,
    'LogoutFunction'
])->name('logout');


// ============================================================
// PT TRAVEL - DASHBOARD
// ============================================================

Route::prefix('pt')
    ->name('pt.')
    ->middleware(['auth', 'pt'])
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard PT
        |--------------------------------------------------------------------------
        */
        Route::get('/dashboard', [
            PtDashboardController::class,
            'TampilDashboardPtFunction'
        ])->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | Kendaraan PT
        |--------------------------------------------------------------------------
        */

        Route::get('/kendaraan', [
            KendaraanController::class,
            'TampilDataKendaraanFunction'
        ])->name('kendaraan.index');

        Route::get('/kendaraan/tambah', [
            KendaraanController::class,
            'TampilFormTambahKendaraanFunction'
        ])->name('kendaraan.create');

        Route::post('/kendaraan', [
            KendaraanController::class,
            'SimpanKendaraanFunction'
        ])->name('kendaraan.store');

        Route::get('/kendaraan/{kendaraan}/edit', [
            KendaraanController::class,
            'TampilFormEditKendaraanFunction'
        ])->name('kendaraan.edit');

        Route::put('/kendaraan/{kendaraan}', [
            KendaraanController::class,
            'UpdateKendaraanFunction'
        ])->name('kendaraan.update');

        Route::delete('/kendaraan/{kendaraan}', [
            KendaraanController::class,
            'HapusKendaraanFunction'
        ])->name('kendaraan.destroy');

    

        /*
        |--------------------------------------------------------------------------
        | Driver PT
        |--------------------------------------------------------------------------
        */

        Route::get('/driver', [
            DriverController::class,
            'TampilDataDriverFunction'
        ])->name('driver.index');

        Route::get('/driver/tambah', [
            DriverController::class,
            'TampilFormTambahDriverFunction'
        ])->name('driver.create');

        Route::post('/driver', [
            DriverController::class,
            'SimpanDriverFunction'
        ])->name('driver.store');

        Route::get('/driver/{driver}/edit', [
            DriverController::class,
            'TampilFormEditDriverFunction'
        ])->name('driver.edit');

        Route::put('/driver/{driver}', [
            DriverController::class,
            'UpdateDriverFunction'
        ])->name('driver.update');

        Route::delete('/driver/{driver}', [
            DriverController::class,
            'HapusDriverFunction'
        ])->name('driver.destroy');


        /*
        |--------------------------------------------------------------------------
        | Manajemen Rute PT
        |--------------------------------------------------------------------------
        */

        Route::get('/rute', [
            RuteController::class,
            'TampilDataRuteFunction'
        ])->name('rute.index');

        Route::get('/rute/tambah', [
            RuteController::class,
            'TampilFormTambahRuteFunction'
        ])->name('rute.create');

        Route::post('/rute', [
            RuteController::class,
            'SimpanRuteFunction'
        ])->name('rute.store');

        Route::get('/rute/{rute}/edit', [
            RuteController::class,
            'TampilFormEditRuteFunction'
        ])->name('rute.edit');

        Route::put('/rute/{rute}', [
            RuteController::class,
            'UpdateRuteFunction'
        ])->name('rute.update');

        Route::delete('/rute/{rute}', [
            RuteController::class,
            'HapusRuteFunction'
        ])->name('rute.destroy');


        /*
        |--------------------------------------------------------------------------
        | Manajemen Jadwal PT
        |--------------------------------------------------------------------------
        */

        Route::get('/jadwal', [
            JadwalController::class,
            'TampilDataJadwalFunction'
        ])->name('jadwal.index');

        Route::get('/jadwal/tambah', [
            JadwalController::class,
            'TampilFormTambahJadwalFunction'
        ])->name('jadwal.create');

        Route::post('/jadwal', [
            JadwalController::class,
            'SimpanJadwalFunction'
        ])->name('jadwal.store');

        Route::get('/jadwal/{jadwal}/edit', [
            JadwalController::class,
            'TampilFormEditJadwalFunction'
        ])->name('jadwal.edit');

        Route::put('/jadwal/{jadwal}', [
            JadwalController::class,
            'UpdateJadwalFunction'
        ])->name('jadwal.update');

        Route::delete('/jadwal/{jadwal}', [
            JadwalController::class,
            'HapusJadwalFunction'
        ])->name('jadwal.destroy');




        });