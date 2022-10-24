<?php

namespace App\Database\Seeds;

use App\Models\PendidikanGuruModel;
use CodeIgniter\Database\Seeder;

class PendidikanGuruSeeder extends Seeder
{
    public function run()
    {
        $pendidikan_guru = (int)(new PendidikanGuruModel())->insert([
            'pegawai_id' => 1,
            'jenjang' => 'S1',
            'jurusan' => 'Informatika',
            'asal_sekolah' => 'SMA',
            'tahun_lulus' => '2021',
            'nilai_ijasah' => '83',
        ]);
        echo "hasil id = $pendidikan_guru";
    }
}
