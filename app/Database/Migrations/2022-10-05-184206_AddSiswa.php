<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSiswa extends Migration
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
            'nisn' => [
                'type' =>'VARCHAR',
                'constraint' =>10,
            ],
           'nis' => [
                'type' =>'VARCHAR',
                'constraint' =>5,
                'unique' =>true,
            ],
            'status_masuk' => [
                'type' =>'ENUM("A","P")',
                'null' => true,
            ],
            'thn_masuk' => [
                'type' =>'YEAR',
                'constraint' =>4,
                'unique' =>true,
            ],
            'nama_depan' => [
                'type' =>'VARCHAR',
                'constraint' =>50,
                'null' => true,
            ],
            'nama_belakang' => [
                'type' =>'VARCHAR',
                'constraint' =>50,
                'null' => true,
            ],
            'nik' => [
                'type' =>'VARCHAR',
                'constraint' =>16,
                'null' => true,
            ],
            'no_kk' => [
                'type' =>'VARCHAR',
                'constraint' =>16,
                'null' => true,
            ],
            'gender' => [
                'type' =>'ENUM("L","P")',
                'null' => true,
            ],
            'tgl_lahir' => [
                'type' =>'DATE',
                'null' =>true,
            ],
            'tempat_lahir' => [
                'type' =>'VARCHAR',
                'constraint' =>50,
                'null' => true,
            ],
            'alamat' => [
                'type' =>'VARCHAR',
                'constraint' =>255,
                'null' => true,
            ],
            'kota' => [
                'type' =>'VARCHAR',
                'constraint' =>50,
                'null' => true,
            ],
            'skr_kelas_id' => [
                'type' =>'INT',
                'constraint' =>10,
                'unsigned' =>true,
            ],
            'no_telp_rumah' => [
                'type' =>'VARCHAR',
                'constraint' =>15,
                'null' => true,
            ],
            'no_hp_ibu' => [
                'type' =>'VARCHAR',
                'constraint' =>15,
                'null' => true,
            ],
            'no_hp_ayah' => [
                'type' =>'varbinary',
                'constraint' =>17,
                'null' => true,
            ],
            'nm_ayah' => [
                'type' =>'VARCHAR',
                'constraint' =>30,
                'null' => true,
            ],
            'nm_ibu' => [
                'type' =>'VARCHAR',
                'constraint' =>30,
                'null' => true,
            ],
            'nm_wali' => [
                'type' =>'VARCHAR',
                'constraint' =>30,
                'null' => true,
            ],
            'foto' => [
                'type' =>'varbinary',
                'constraint' =>255,
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
            'deleted_at' => [
                'type' =>'DATETIME',
                'null' => true,
            ],
         ]);
         $this->forge->addPrimaryKey('nisn');
         $this->forge->addForeignKey('skr_kelas_id','kelas','id','CASCADE','CASCADE');
         $this->forge->createTable('siswa');
    }

    public function down()
    {
        $this->forge->dropTable('siswa');
    }
}
