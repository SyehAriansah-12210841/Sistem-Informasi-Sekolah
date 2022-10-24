<?php

namespace App\Database\Seeds;

use App\Models\TahunAjarModel;
use CodeIgniter\Database\Seeder;

class TahunAjarSeeder extends Seeder
{
    public function run()
    {
        $id = (int)(new TahunAjarModel())->insert([
            'tahun_ajaran' => '2021/2022',
            'tgl_mulai' => '2021-09-13',
            'tgl_selesai' => '2022-03-08',
            'status_aktif' => 'Y',
        ]);
        echo "hasil id = $id";

        $id = (int)(new TahunAjarModel())->insert([
            'tahun_ajaran' => '2022/2023',
            'tgl_mulai' => '2022-10-15',
            'tgl_selesai' => '2023-05-22',
            'status_aktif' => 'T',
        ]);
        echo "hasil id = $id";
        


    }
}
