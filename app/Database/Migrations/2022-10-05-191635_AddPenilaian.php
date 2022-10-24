<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPenilaian extends Migration
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
            'mapel_id' => [
            'type' =>'INT',
            'constraint' => 10,
            'unsigned' =>true,
            ],
            'siswa_id' => [
            'type' =>'INT',
            'constraint' => 10,
            'unsigned' =>true,
            ],
            'total_kehadiran' =>[
            'type' => 'DOUBLE',
            'null' =>true,
            ],
            'deskripsi_nilai' =>[
            'type' => 'TEXT',
            'null' =>true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('mapel_id','mapel','id','CASCADE','CASCADE');
        $this->forge->addForeignKey('siswa_id','siswa','id','CASCADE','CASCADE');
        $this->forge->createTable('penilaian');

    }

    public function down()
    {
        $this->forge->dropTable('penilaian');
    }
}
