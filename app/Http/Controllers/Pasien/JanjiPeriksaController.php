<?php

namespace App\Http\Controllers\Pasien;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\janji_periksa;
use App\Http\Controllers\Controller;
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
        $validatedData = $request->validate([
            'id_jadwal_periksa' => 'required|exists:jadwal_periksas,id',
            'keluhan' => 'required',
        ]);

        $jumlahJanji = janji_periksa::where('id_jadwal_periksa', $validatedData['id_jadwal_periksa'])->count();
        $noAntrian = $jumlahJanji + 1;

        janji_periksa::create([
            'id_pasien' => Auth::user()->id,
            'id_jadwal_periksa' => $validatedData['id_jadwal_periksa'],
            'keluhan' => $request->keluhan,
            'no_antrian' => $noAntrian,
        ]);

        return Redirect::route('pasien.janjiPeriksa.index')->with('status', 'janji-periksa-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
