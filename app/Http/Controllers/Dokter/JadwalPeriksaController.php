<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\jadwal_periksa;
use Illuminate\Http\Request;

class JadwalPeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $jadwalPeriksas = jadwal_periksa::where('id_dokter', auth()->user()->id)->get();
        return view('dokter.jadwalPeriksa.index')->with([
            'jadwalPeriksas' => $jadwalPeriksas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokter.jadwalPeriksa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_dokter' => 'required|exists:users,id',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'status' => 'required|boolean',
        ]);

        jadwal_periksa::create($validated);

        return redirect()->route('dokter.jadwalPeriksa.index')->with('success', 'Jadwal periksa berhasil ditambahkan.');
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
        $jadwalPeriksa = jadwal_periksa::findOrFail($id);
        return view('dokter.jadwalPeriksa.edit', compact('jadwalPeriksa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validated = $request->validate([
            'id_dokter' => 'required|exists:users,id',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'status' => 'required|boolean',
        ]);

        $jadwalPeriksa = jadwal_periksa::findOrFail($id);
        $jadwalPeriksa->update($validated);

        return redirect()->route('dokter.jadwalPeriksa.index')->with('success', 'Jadwal periksa berhasil diupdate.');
    }

    /**
     * Toggle the status of the specified resource.
     */

    public function toggleStatus($id)
    {
        $jadwalPeriksa = jadwal_periksa::findOrFail($id);
       
        // Jika ingin mengaktifkan jadwal ini
    if (!$jadwalPeriksa->status) {
        // Nonaktifkan semua jadwal lain milik dokter yang sama
        jadwal_periksa::where('id_dokter', $jadwalPeriksa->id_dokter)
            ->where('id', '!=', $jadwalPeriksa->id)
            ->update(['status' => false]);
        // Aktifkan jadwal ini
        $jadwalPeriksa->status = true;
    } else {
        // Jika ingin menonaktifkan jadwal ini
        $jadwalPeriksa->status = false;
    }
    $jadwalPeriksa->save();

    return redirect()->route('dokter.jadwalPeriksa.index')
        ->with('success', 'Status jadwal berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwalPeriksa = jadwal_periksa::findOrFail($id);
        $jadwalPeriksa->delete();

        return redirect()->route('dokter.jadwalPeriksa.index')->with('success', 'Jadwal periksa berhasil dihapus.');
    }
}
