<?php

namespace App\Http\Controllers\pasien;

use Illuminate\Http\Request;
use App\Models\janji_periksa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RiwayatPeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $no_rm = Auth::user()->no_rm;
        $janjiPeriksas = Janji_periksa::where('id_pasien', Auth::user()->id)->get();

        // $janjiPeriksas = janji_periksa::where('id_pasien', $user->id)->get();

        return view('pasien.riwayatPeriksa.index')->with([
            'no_rm' => $no_rm,
            'janji_periksas' => $janjiPeriksas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $janjiPeriksa = janji_periksa::with(['jadwalPeriksa.dokter'])->findOrFail($id);

        return view('pasien.riwayatPeriksa.detail')->with([
            'janji_periksa' => $janjiPeriksa,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function riwayat($id)
    {
        $janjiPeriksa = janji_periksa::with([
            'periksa.detailPeriksas.obat', 
            'jadwalPeriksa.dokter'
        ])->findOrFail($id);
        $riwayat = $janjiPeriksa->periksa;

        return view('pasien.riwayatPeriksa.riwayat')->with([
            'riwayat' => $riwayat,
            'janji_periksa' => $janjiPeriksa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
