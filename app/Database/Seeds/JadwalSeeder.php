<?php

namespace App\Database\Seeds;

use App\Models\JadwalModel;
use CodeIgniter\Database\Seeder;

class JadwalSeeder extends Seeder
{
    public function run()
    {
        $jadwal = (int)(new JadwalModel())->insert([
            'hari' => 1,
            'kelas_id' => 1,
            'mapel_id' => 1,
            'jam_mulai' => '07:00:00',
            'jam_selesai' => '13:00:00',
            'pegawai_id' => 1,
        ]);
        echo "hasil insert $jadwal";
    }
}
