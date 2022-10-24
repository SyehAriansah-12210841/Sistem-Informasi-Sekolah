<?php

namespace App\Database\Seeds;

use App\Models\BagianModel;
use CodeIgniter\Database\Seeder;

class BagianSeeder extends Seeder
{
    public function run()
    {
        $id = (new BagianModel())->insert([
            'nama' => 'Guru',
            'fungsi' => 'Satuan pendidik sekolah',
            'tugas_pokok' => 'mendidik siswa',
        ]);
        echo "hasil id = $id";

        $id = (new BagianModel())->insert([
            'nama' => 'TU',
            'fungsi' => 'Penata kelola administrasi sekolah',
            'tugas_pokok' => 'mempersiapkan jadwal dan membantu guru'
        ]);
        echo "hasil id = $id";

        $id = (new BagianModel())->insert([
            'nama' => 'BK',
            'fungsi' => 'Konselor Siswa',
            'tugas_pokok' => 'memberikan konsultasi'
        ]);
        echo "hasil id = $id";
    }
}
