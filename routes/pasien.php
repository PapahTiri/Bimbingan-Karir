<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pasien\JanjiPeriksaController;
use App\Http\Controllers\pasien\RiwayatPeriksaController;

Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::prefix('janji-periksa')->group(function () {
        Route::get('/', [JanjiPeriksaController::class, 'index'])->name('pasien.janjiPeriksa.index');
        Route::post('/', [JanjiPeriksaController::class, 'store'])->name('pasien.janjiPeriksa.store');
    });
    // Route::resource('janjiPeriksa', JanjiPeriksaController::class)
    //     ->names('pasien.janjiPeriksa');

    Route::prefix('riwayat-periksa')->group(function(){
        Route::get('/', [RiwayatPeriksaController::class, 'index'])->name('pasien.riwayatPeriksa.index');
        Route::get('/{id}/detail', [RiwayatPeriksaController::class, 'show'])->name('pasien.riwayatPeriksa.detail');
        Route::get('/{id}/riwayat', [RiwayatPeriksaController::class, 'riwayat'])->name('pasien.riwayatPeriksa.riwayat');
    });
});

// Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->group(function () {
//       Route::resource('riwayatPeriksa', RiwayatPeriksaController::class)
//           ->names('pasien.riwayatPeriksa');

//           Route::get('riwayatPeriksa/{id}/riwayat', [RiwayatPeriksaController::class, 'riwayat'])
//         ->name('pasien.riwayatPeriksa.riwayat');
// });

