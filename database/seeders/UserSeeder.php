<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'nama' => 'Dr. Andi',
                'email' => 'andiDokter@gmail.com',
                'password' => Hash::make('dokter123'),
                'role' => 'dokter',
                'alamat' => 'Jl. nakula 1',
                'no_ktp' => '4060222020210114',
                'no_hp' => '089129590920',
                'no_rm' => null,
                'poli' => 'Umum',
            ],
              [
                'nama' => 'Patir',
                'email' => 'PatirPasien@gmail.com',
                'password' => Hash::make('pasien123'),
                'role' => 'pasien',
                'alamat' => 'Jl. Sadewa 1',
                'no_ktp' => '4060222020200112',
                'no_hp' => '089129510102',
                'no_rm' => 'RM001',
                'poli' => null,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}