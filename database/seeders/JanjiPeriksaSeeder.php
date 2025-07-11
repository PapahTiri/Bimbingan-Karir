<?php

namespace Database\Seeders;

use App\Models\jadwal_periksa;
use App\Models\janji_periksa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JanjiPeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pasien = User::where('role', 'pasien')->first();
        $jadwal = jadwal_periksa::first();

        $janjis = [
            [
                'id_pasien' => $pasien->id,
                'id_jadwal_periksa' => $jadwal->id,
                'keluhan' => 'Sakit kepala dan demam',
                'no_antrian' => 1,
            ],

             [
                'id_pasien' => $pasien->id,
                'id_jadwal_periksa' => $jadwal->id,
                'keluhan' => 'Batuk pilek dan kering',
                'no_antrian' => 2,
            ],
        ];

        foreach ($janjis as $janji) {
            janji_periksa::create($janji);
        }
    }
}
