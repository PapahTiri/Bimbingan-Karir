<?php

namespace Database\Seeders;

use App\Models\detail_periksa;
use App\Models\obat;
use App\Models\periksa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailPeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $periksa = periksa::first();
        $obat = obat::first();

        $detail = [
            'id_periksa' => $periksa->id,
            'id_obat' => $obat->id,
        ];

        detail_periksa::create($detail);
    }
}
