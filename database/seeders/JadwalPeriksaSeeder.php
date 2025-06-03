<?php

namespace Database\Seeders;

use App\Models\jadwal_periksa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalPeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokter = User::where('role', 'dokter')->first();

        $jadwals = [
            [
                'id_dokter' => $dokter->id,
                'hari' => 'Senin',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '12:00:00',
                'status' => true,
            ],
             [
                'id_dokter' => $dokter->id,
                'hari' => 'Jumat',
                'jam_mulai' => '14:00:00',
                'jam_selesai' => '17:00:00',
                'status' => false,
            ],
        ];

        foreach ($jadwals as $jadwal) {
            jadwal_periksa::create($jadwal);
        }
    }
}
