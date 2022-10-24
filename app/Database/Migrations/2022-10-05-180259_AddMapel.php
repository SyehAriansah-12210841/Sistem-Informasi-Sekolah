<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMapel extends Migration
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
            'mapel' => [
                'type' =>'VARCHAR',
                'constraint' =>50,
            ],
            'kelompok' => [
                'type' =>'ENUM("A","B")',
                'null' =>true,
            ],
            'keterangan' => [
                'type' =>'TEXT',
                'null' =>true,
            ],
            'tingkat' => [
                'type' =>'TINYINT',
                'constraint' =>4,
                'null' =>true,
            ],
            'kkm' => [
                'type' =>'TINYINT',
                'constraint' =>4,
                'null' =>true,
            ],
         ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('mapel');
    }

    public function down()
    {
        $this->forge->dropTable('mapel');
    }
}
