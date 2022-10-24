<?php

namespace App\Database\Seeds;

use App\Models\SiswaModel;
use CodeIgniter\Database\Seeder;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        $siswa = (int)(new SiswaModel())-> insert([
            'nisn' => 11122,
            'nis' => '1110983',
            'status_masuk' => 'A',
            'thn_masuk' => 2021,
            'nama_depan' => 'Mino',
            'nama_belakang' => 'Fernando',
            'nik' => '1179405',
            'no_kk' => '74839345',
            'gender' => 'L',
            'tgl_lahir' => '2002-10-22',
            'tempat_lahir' => 'Seoul',
            'alamat' => 'Komp.BorneoStars',
            'kota' => 'Busan',
            'skr_kelas_id' => 1,
            'no_telp_rumah' => '08627489574',
            'no_hp_ibu' => '08926475842',
            'no_hp_ayah' => '082647127483',
            'nm_ayah' => 'Fendi',
            'nm_ibu' => 'Sisil',
            'nm_wali' => 'Siska',
            'foto' => 'profil',
        ]);
        echo "hasil insert $siswa";
    }
}
