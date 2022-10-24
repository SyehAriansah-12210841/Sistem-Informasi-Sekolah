<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKehadiranSiswa extends Migration
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
            'kehadiran_guru_id' => [
            'type' =>'INT',
            'constraint' => 10,
            'unsigned' =>true,
            ],
            'siswa_id' => [
            'type' =>'INT',
            'constraint' => 10,
            'unsigned' =>true,
            ],
            'status_hadir' =>[
            'type' => 'ENUM("Y","T")',
            'default' =>'Y',
            'null' =>true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('kehadiran_guru_id','kehadiran_guru','id','CASCADE','CASCADE');
        $this->forge->addForeignKey('siswa_id','siswa','id','CASCADE','CASCADE');
        $this->forge->createTable('kehadiran_siswa');
    }

    public function down()
    {
        $this->forge->dropTable('kehadiran_siswa');
    }
}
