<?php

namespace App\Http\Controllers\Dokter;

use App\Models\obat;
use App\Models\periksa;
use Illuminate\Http\Request;
use App\Models\janji_periksa;
use App\Http\Controllers\Controller;
use App\Models\detail_periksa;
use Illuminate\Support\Facades\Auth;

class PeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $janji_periksas = janji_periksa::whereHas('jadwalPeriksa', function($query) {
        $query->where('id_dokter', Auth::id());
        })->whereDoesntHave('periksa')
        ->with(['pasien', 'jadwalPeriksa.dokter']) // pastikan relasi
        ->get();

        return view('dokter.periksa.index', compact('janji_periksas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
       $obats = obat::all(); 
       $janji_periksa = janji_periksa::with('pasien', 'jadwalPeriksa.dokter')->findOrFail($id);

        return view('dokter.periksa.create', compact('janji_periksa', 'obats'));
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'id_janji_periksa' => 'required|exists:janji_periksas,id',
        'tgl_periksa' => 'required|date',
        'catatan' => 'required',
        'obats' => 'required|array',
        'obats.*.id' => 'required|exists:obats,id',
        'obats.*.jumlah' => 'required|integer|min:1',
    ]);

    $janji_periksa = janji_periksa::with('jadwalPeriksa')->findOrFail($request->id_janji_periksa);

    // Cek apakah janji milik dokter yang login
    if ($janji_periksa->jadwalPeriksa->id_dokter !== Auth::id()) {
        abort(403, 'Anda tidak berwenang memproses janji ini.');
    }

    // Harga periksa tetap
    $biaya_periksa = 30000;
    $total_obat = 0;

    // Hitung total harga obat
    foreach ($request->obats as $obatData) {
        $obat = Obat::findOrFail($obatData['id']);
        $total_obat += $obat->harga * $obatData['jumlah'];
    }

    $total_semua = $biaya_periksa + $total_obat;

    // Simpan periksa
    $periksa = periksa::create([
        'id_janji_periksa' => $request->id_janji_periksa,
        'tgl_periksa' => $request->tgl_periksa,
        'catatan' => $request->catatan,
        'biaya_periksa' => $total_semua,
    ]);

    // Simpan detail obat
    foreach ($request->obats as $obatData) {
        detail_periksa::create([
            'id_periksa' => $periksa->id,
            'id_obat' => $obatData['id'],
            'jumlah' => $obatData['jumlah'],
        ]);
    }

        return redirect()->route('dokter.periksa.index')->with('success', 'Data pemeriksaan berhasil disimpan.');
    }

}
