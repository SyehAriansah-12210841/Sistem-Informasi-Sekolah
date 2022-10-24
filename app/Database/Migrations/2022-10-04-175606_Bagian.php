<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bagian extends Migration
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
            'nama' => [
                'type' =>'VARCHAR',
                'constraint' =>60,
            ],
            'fungsi' => [
                'type' =>'TEXT',
                'null' =>true,
            ],
            'tugas_pokok' => [
                'type' =>'TEXT',
                'null' =>true,
            ],
         ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('bagian');
    }

    public function down()
    {
        $this->forge->dropTable('bagian');
    }
}
