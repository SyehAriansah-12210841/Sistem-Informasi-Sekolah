<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKelas extends Migration
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
            'tingkat' => [
                'type' =>'TINYINT',
                'constraint' =>3,
                'unsigned' =>true,
            ],
            'kelas' => [
                'type' =>'CHAR',
                'constraint' =>1,
                'null' =>true,
            ],
            'pegawai_id' => [
                'type' =>'INT',
                'constraint' => 10,
                'unsigned' =>true,
            ],
            'tahun_ajaran_id' =>[
                'type' => "INT",
                'constraint' => 11,
                'unsigned' =>true,
            ]
         ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('pegawai_id','Pegawai','id','CASCADE','CASCADE');
        $this->forge->addForeignKey('tahun_ajaran_id','tahun_ajar','id','CASCADE','CASCADE');
        $this->forge->createTable('kelas');
    }

    public function down()
    {
        $this->forge->dropTable('kelas');
    }
}
