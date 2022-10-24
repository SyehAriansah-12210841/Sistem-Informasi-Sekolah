<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegawai1 extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' =>'INT',
                'constraint' =>10,
                'unsigned' => true,
                'auto_increment' =>true,
                'unique' => true,
            ],
            'nip' => [
                'type' =>'VARCHAR',
                'constraint' =>10,
            ],
           'nama_depan' => [
                'type' =>'VARCHAR',
                'constraint' =>50,
            ],
            'nama_belakang' => [
                'type' =>'VARCHAR',
                'constraint' =>50,
                'null' => true,
            ],
            'gelar_depan' => [
                'type' =>'VARCHAR',
                'constraint' =>10,
                'null' => true,
            ],
            'gelar_belakang' => [
                'type' =>'VARCHAR',
                'constraint' =>10,
                'null' => true,
            ],
            'gender' => [
                'type' =>'ENUM("L","P")',
                'null' => true,
            ],
            'no_telpon' => [
                'type' =>'VARCHAR',
                'constraint' =>17,
                'null' => true,
            ],
            'no_wa' => [
                'type' =>'VARCHAR',
                'constraint' =>17,
                'null' => true,
            ],
            'email' => [
                'type' =>'VARCHAR',
                'constraint' =>128,
                'null' => true,
            ],
            'bagian_id' => [
                'type' =>'INT',
                'constraint' =>10,
                'unsigned' => true,
            ],
            'alamat' => [
                'type' =>'VARCHAR',
                'constraint' =>255,
                'null' => true,
            ],
            'kota' => [
                'type' =>'VARCHAR',
                'constraint' =>30,
                'null' => true,
            ],
            'tgl_lahir' => [
                'type' =>'DATE',
                'null' => true,
            ],
            'tempat_lahir' => [
                'type' =>'VARCHAR',
                'constraint' =>80,
                'null' => true,
            ],
            'foto' => [
                'type' =>'VARCHAR',
                'constraint' =>255,
                'null' => true,
            ],
            'sandi' => [
                'type' =>'VARCHAR',
                'constraint' =>60,
                'null' => true,
            ],
            'token_reset' => [
                'type' =>'VARCHAR',
                'constraint' =>10,
                'null' => true,
            ],
            'created_at' => [
                'type' =>'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' =>'DATETIME',
                'null' => true,
            ],
         ]);
        $this->forge->addPrimaryKey('nip');
        // $this->forge->addKey('id');
        $this->forge->addForeignKey('bagian_id','bagian','id','CASCADE','CASCADE');
        $this->forge->createTable('Pegawai');
    }

    public function down()
    {
        $this->forge->dropTable('Pegawai');
    }
}
