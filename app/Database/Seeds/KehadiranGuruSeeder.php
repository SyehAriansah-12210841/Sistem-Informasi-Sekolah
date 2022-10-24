<?php

namespace App\Database\Seeds;

use App\Models\KehadiranGuruModel;
use CodeIgniter\Database\Seeder;

class KehadiranGuruSeeder extends Seeder
{
    public function run()
    {
        $kehadiran_guru = (int)(new KehadiranGuruModel())->insert([
            'waktu_masuk' => '2021-09-17 06:30:00',
            'waktu_keluar' => '2021-09-17 14.00:00',
            'pertemuan' => 1,
            'pegawai_id' => 1,
            'jadwal_id' => 1,
            'berita_acara' => 'mendidik siswa',
        ]);
        echo "hasil insert $kehadiran_guru";
    }
}
