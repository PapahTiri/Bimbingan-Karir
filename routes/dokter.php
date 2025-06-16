<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dokter\ObatController;
use App\Http\Controllers\Dokter\PeriksaController;
use App\Http\Controllers\Dokter\JadwalPeriksaController;
use App\Http\Controllers\Dokter\RiwayatPeriksaController;

Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->group(function () {
    Route::get('/dashboard', function () {
        return view('dokter.dashboard');
    })->name('dokter.dashboard');
    
    Route::prefix('obat')->group(function () {
        Route::get('/', [ObatController::class, 'index'])->name('dokter.obat.index');
        Route::get('/create', [ObatController::class, 'create'])->name('dokter.obat.create');
        Route::post('/', [ObatController::class, 'store'])->name('dokter.obat.store');
        Route::get('/{id}/edit', [ObatController::class, 'edit'])->name('dokter.obat.edit');
        Route::patch('/{id}', [ObatController::class, 'update'])->name('dokter.obat.update');
        Route::delete('/{id}', [ObatController::class, 'destroy'])->name('dokter.obat.destroy');
    
        Route::get('/trash', [ObatController::class, 'trash'])->name('dokter.obat.trash');
        Route::patch('/restore/{id}', [ObatController::class, 'restore'])->name('dokter.obat.restore');
        Route::delete('/force-delete/{id}', [ObatController::class, 'forceDelete'])->name('dokter.obat.forceDelete');
    });

    Route::resource('jadwalPeriksa', JadwalPeriksaController::class)
        ->names('dokter.jadwalPeriksa');

    Route::patch('jadwalPeriksa/{id}/toggle-status', [JadwalPeriksaController::class, 'toggleStatus'])
    ->name('dokter.jadwalPeriksa.toggle-status');

       Route::prefix('periksa')->group(function () {
        Route::get('/', [PeriksaController::class, 'index'])->name('dokter.periksa.index');
        Route::get('/{id}/create', [PeriksaController::class, 'create'])->name('dokter.periksa.create');
        Route::post('/', [PeriksaController::class, 'store'])->name('dokter.periksa.store');
    });

    Route::get('dokter/riwayat-periksa', [RiwayatPeriksaController::class, 'index'])->name('dokter.riwayatPeriksa.index');
});