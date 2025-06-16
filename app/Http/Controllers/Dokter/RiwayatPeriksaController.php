<?php

namespace App\Http\Controllers\Dokter;

use App\Models\periksa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RiwayatPeriksaController extends Controller
{
    public function index()
    {
        $dokterId = Auth::id();

        // $janjiperiksas = periksa::with(['janjiPeriksas.pasien', 'janjiPeriksas.jadwalPeriksa'])
        //     ->whereHas('janjiPeriksas.jadwalPeriksa', fn($q) => $q->where('id_dokter', $dokterId))
        //     ->orderBy('tgl_periksa', 'desc')
        //     ->get();

        // return view('dokter.riwayatPeriksa.index', compact('janjiperiksas'));

        $janjiperiksas = periksa::with([
        'janjiPeriksas.pasien',
        'janjiPeriksas.jadwalPeriksa'
        ])
        ->whereHas('janjiPeriksas.jadwalPeriksa', function ($query) use ($dokterId) {
            $query->where('id_dokter', $dokterId);
        })
        ->orderBy('tgl_periksa', 'desc')
        ->get();

        return view('dokter.riwayatPeriksa.index', compact('janjiperiksas'));
    }

}
