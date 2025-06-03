<?php

namespace Database\Seeders;

use App\Models\janji_periksa;
use App\Models\periksa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $janji = janji_periksa::first();

        $data = [
            [
                'id_janji_periksa' => $janji->id,
                'tgl_periksa' => now(),
                'catatan' => 'Pasien mengalami demam ringan, disarankan jangan minum es terus dan diberi obat penurun panas',
                'biaya_periksa' => 75000,
            ],
        ];

        foreach ($data as $item) {
            periksa::create($item);
        }
    }
}
