<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKelasSiswa extends Migration
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
            'kelas_id' => [
            'type' =>'INT',
            'constraint' => 10,
            'unsigned' =>true,
            ],
            'siswa_id' => [
            'type' =>'INT',
            'constraint' => 10,
            'unsigned' =>true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('kelas_id','kelas','id','CASCADE','CASCADE');
        $this->forge->addForeignKey('siswa_id','siswa','id','CASCADE','CASCADE');
        $this->forge->createTable('kelas_siswa');
    }

    public function down()
    {
        $this->forge->dropTable('kelas_siswa');
    }
}
