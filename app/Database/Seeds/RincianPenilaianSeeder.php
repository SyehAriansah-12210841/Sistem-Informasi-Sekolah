<?php

namespace App\Database\Seeds;

use App\Models\RincianPenilaianModel;
use CodeIgniter\Database\Seeder;

class RincianPenilaianSeeder extends Seeder
{
    public function run()
    {
        $rincian_penilaian = (int)(new RincianPenilaianModel())-> insert([
            'penilaian_id' => 1,
            'nama_nilai' => 'Ulangan Harian 2',
            'nilai_angka' => 79,
            'nilai_deskripsi' => 'Cukup Baik',

        ]);
        echo "hasil insert $rincian_penilaian";
    }
}
