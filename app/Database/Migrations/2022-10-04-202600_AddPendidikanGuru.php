<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPendidikanGuru extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' =>10,
                'unsigned' => true,
                'auto_increment' =>true,
            ],
            'pegawai_id' => [
                'type' => 'INT',
                'constraint' =>10,
                'unsigned' =>true,
            ],
            'jenjang' => [
                'type' => 'VARCHAR',
                'constraint' =>25,
            ],
            'jurusan' => [
                'type' => 'VARCHAR',
                'constraint' =>70,
                'null' =>true,
            ],
            'asal_sekolah' => [
                'type' => 'VARCHAR',
                'constraint' =>100,
                'null' =>true,
            ],
            'tahun_lulus' => [
                'type' => 'YEAR',
                'constraint' =>4,
                'null' =>true,
            ],
            'nilai_ijasah' => [
                'type' => 'DOUBLE',
                'null' =>true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('pegawai_id','Pegawai','id','CASCADE','CASCADE');
        $this->forge->createTable('pendidikan_guru');
    }

    public function down()
    {
        $this->forge->dropTable('pendidikan_guru');
    }
}
