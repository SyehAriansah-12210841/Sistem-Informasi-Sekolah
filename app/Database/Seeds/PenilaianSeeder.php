<?php

namespace App\Database\Seeds;

use App\Models\PenilaianModel;
use CodeIgniter\Database\Seeder;

class PenilaianSeeder extends Seeder
{
    public function run()
    {
        $penilaian = (int)(new PenilaianModel())-> insert([
            'mapel_id' => 1,
            'siswa_id' => 1,
            'total_kehadiran' => 14,
            'deskripsi_nilai' => 'Sangat Baik',

        ]);
        echo "hasil insert $penilaian";
    }
}
