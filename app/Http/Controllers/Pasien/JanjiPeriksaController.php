<?php

namespace App\Http\Controllers\Pasien;

use App\Models\User;
use App\Models\periksa;
use Illuminate\Http\Request;
use App\Models\janji_periksa;
use App\Http\Controllers\Controller;
use App\Models\jadwal_periksa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class JanjiPeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $no_rm = Auth::user()->no_rm;
        $dokters = User::with([
            'jadwalPeriksas' => function ($query) {
                $query->where('status', true);
            },
        ])
            ->where('role', 'dokter')
            ->get();

        return view('pasien.janjiPeriksa.index')->with([
            'no_rm' => $no_rm,
            'dokters' => $dokters,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => 'required|exists:users,id',
            'keluhan' => 'required',
        ]);

        $jadwalPeriksa = jadwal_periksa::where('id_dokter', $request->id_dokter)
            ->where('status', true)
            ->first();

        $jumlahJanji = janji_periksa::where('id_jadwal_periksa', $jadwalPeriksa->id)->count();
        $noAntrian = $jumlahJanji + 1;

        janji_periksa::create([
            'id_pasien' => Auth::user()->id,
            'id_jadwal_periksa' => $jadwalPeriksa->id,
            'keluhan' => $request->keluhan,
            'no_antrian' => $noAntrian,
        ]);

        return Redirect::route('pasien.janjiPeriksa.index')->with('status', 'janji-periksa-created');
    }

}
