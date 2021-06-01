<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SiswaMapel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_siswa' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_mapel' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('siswa_mapel');
    }

    public function down()
    {
        $this->forge->dropTable('siswa_mapel');
    }
}
