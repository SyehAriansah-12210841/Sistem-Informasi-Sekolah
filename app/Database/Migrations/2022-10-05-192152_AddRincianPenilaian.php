<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRincianPenilaian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
            'type' =>'INT',
            'constraint' => 10,
            'unsigned' =>true,
            'auto_increment' =>true,
            ],
            'penilaian_id' => [
            'type' =>'INT',
            'constraint' => 11,
            'unsigned' =>true,
            ],
            'nama_nilai' => [
            'type' =>'VARCHAR',
            'constraint' => 50,
            ],
            'nilai_angka' =>[
            'type' => 'DOUBLE',
            'null' =>true,
            ],
            'nilai_deskripsi' =>[
            'type' => 'TEXT',
            'null' =>true,
            ],
        ]);    
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('penilaian_id','penilaian','id','CASCADE','CASCADE');
        $this->forge->createTable('rincian_penilaian');
    }

    public function down()
    {
        $this->forge->dropTable('rincian_penilaian');
    }
}
