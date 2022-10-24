<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKehadiranGuru extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' =>'INT',
                'constraint' =>10,
                'unsigned' => true,
                'auto_increment' =>true,
            ],
            'waktu_masuk' => [
                'type' =>'DATETIME',
                'null' =>true,
            ],
            'waktu_keluar' => [
                'type' =>'DATETIME',
                'null' =>true,
            ],
            'pertemuan' => [
                'type' =>'TINYINT',
                'constraint' => 3,
                'null' =>true,
            ],
            'pegawai_id' => [
                'type' =>'INT',
                'constraint' =>10,
                'unsigned' => true,
            ],
            'jadwal_id' => [
                'type' =>'INT',
                'constraint' =>10,
                'unsigned' => true,
            ],
            'berita_acara' => [
                'type' =>'TEXT',
                'null' =>true,
            ],
         ]);    
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('pegawai_id','Pegawai','id','CASCADE','CASCADE');
        $this->forge->addForeignKey('jadwal_id','jadwal','id','CASCADE','CASCADE');
        $this->forge->createTable('kehadiran_guru');
    }

    public function down()
    {
        $this->forge->dropTable('kehadiran_guru');
    }
}
