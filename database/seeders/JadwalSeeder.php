<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jadwal::create([
            'hari' => 'Senin',
            'waktu_buka' => '08:00',
            'waktu_tutup' => '24:00',
            'status' => '0'
        ]);

        Jadwal::create([
            'hari' => 'Selasa',
            'waktu_buka' => '08:00',
            'waktu_tutup' => '24:00',
            'status' => '0'
        ]);

        Jadwal::create([
            'hari' => 'Rabu',
            'waktu_buka' => '08:00',
            'waktu_tutup' => '24:00',
            'status' => '0'
        ]);

        Jadwal::create([
            'hari' => 'Kamis',
            'waktu_buka' => '08:00',
            'waktu_tutup' => '24:00',
            'status' => '0'
        ]);

        Jadwal::create([
            'hari' => 'Jumat',
            'waktu_buka' => '08:00',
            'waktu_tutup' => '24:00',
            'status' => '0'
        ]);

        Jadwal::create([
            'hari' => 'Sabtu',
            'waktu_buka' => '08:00',
            'waktu_tutup' => '24:00',
            'status' => '0'
        ]);

        Jadwal::create([
            'hari' => 'Minggu',
            'waktu_buka' => '08:00',
            'waktu_tutup' => '24:00',
            'status' => '0'
        ]);
    }
}
