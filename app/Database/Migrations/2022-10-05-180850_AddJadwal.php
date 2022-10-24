<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddJadwal extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
            'type' => 'INT',
            'constraint' => 10,
            'unsigned' =>true,
            'auto_increment' => true,
            ],
            'hari' => [
            'type' => 'INT',
            'constraint' => 10,
            'unsigned' =>true,
            ],
            'kelas_id' => [
            'type' => 'INT',
            'constraint' => 10,
            'null' =>true,
            'unsigned' =>true,
            ],
            'mapel_id' => [
            'type' => 'INT',
            'constraint' => 10,
            'null' =>true,
            'unsigned' =>true,
            ],
            'jam_mulai' => [
            'type' => 'TIME',
            'null' =>true,
            ],
            'jam_selesai' => [
            'type' => 'TIME',
            'null' =>true,
            ],
            'pegawai_id' => [
            'type' => 'INT',
            'constraint' => 10,
            'unsigned' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('kelas_id', 'kelas','id','CASCADE','CASCADE');
        $this->forge->addForeignKey('pegawai_id','Pegawai','id','CASCADE','CASCADE');
        $this->forge->createTable('jadwal');
    }

    public function down()
    {
        $this->forge->dropTable('jadwal');
    }
}
