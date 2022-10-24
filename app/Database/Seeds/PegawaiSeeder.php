<?php

namespace App\Database\Seeds;

use App\Models\PegawaiModel;
use CodeIgniter\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $pegawai = (int)(new PegawaiModel())-> insert([
            'nip' => '123457890',
            'nama_depan' => 'Fatimah',
            'nama_belakang' => 'Soimah',
            'gelar_depan' => 'Dr',
            'gelar_belakang' => 'A.Ma',
            'gender' => 'P',
            'no_telpon' => '085738706898',
            'no_wa' => '086738917343',
            'email' => 'fatimahsoim@gmail.com',
            'bagian_id' => 1,
            'alamat' => 'Jl.Sulawesi Blok A',
            'kota' => 'Bandung',
            'tgl_lahir' => '1999-03-02',
            'tempat_lahir' => 'Jakarta',
            'foto' => 'profil',
            'sandi' => password_hash('12345', PASSWORD_BCRYPT),
            'token_reset' => 'qwerty',
        ]);
        echo "hasil id = $pegawai";
    }
}
