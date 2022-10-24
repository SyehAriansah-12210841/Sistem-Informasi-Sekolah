<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTahunAjar extends Migration
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
            'tahun_ajaran' => [
                'type' => 'VARCHAR',
                'constraint' =>9,
            ],
            'tgl_mulai' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'tgl_selesai' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'status_aktif' => [
                'type' => 'ENUM("Y","T")',
                'default' =>'T',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tahun_ajar');
    }

    public function down()
    {
        $this->forge->dropTable('tahun_ajar');
    }
}
