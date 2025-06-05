<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pasien\JanjiPeriksaController;

     Route::resource('janjiPeriksa', JanjiPeriksaController::class)
        ->names('pasien.janjiPeriksa');