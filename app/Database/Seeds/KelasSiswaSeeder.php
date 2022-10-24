<?php

namespace App\Database\Seeds;

use App\Models\KelasSiswaModel;
use CodeIgniter\Database\Seeder;

class KelasSiswaSeeder extends Seeder
{
    public function run()
    {
        $kelas_siswa = (int)(new KelasSiswaModel())-> insert([
            'kelas_id' => 1,
            'siswa_id' => 1,
        ]);
        echo "hasil id = $kelas_siswa";
    }
}
