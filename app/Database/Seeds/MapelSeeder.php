<?php

namespace App\Database\Seeds;

use App\Models\MapelModel;
use CodeIgniter\Database\Seeder;

class MapelSeeder extends Seeder
{
    public function run()
    {
        $mapel = (int)(new MapelModel())->insert([
            'mapel' => 'Ilmu Pengetahuan Teknologi',
            'kelompok' => 'B',
            'keterangan' => 'materi dari daerah local',
            'tingkat'  => 2,
            'kkm' => 75,

        ]);
        echo "hasil insert $mapel";
    }
}
