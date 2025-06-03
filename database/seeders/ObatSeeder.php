<?php

namespace Database\Seeders;

use App\Models\obat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obats = [
            [
                'nama_obat' => 'Paracetamol',
                'kemasan' => 'Tablet',
                'harga' => 5000,
            ],
            [
                'nama_obat' => 'Amoxcillin',
                'kemasan' => 'Kapsul',
                'harga' => 10000,
            ],
        ];

        foreach ($obats as $obat) {
            obat::create($obat);
        }

    }
}
