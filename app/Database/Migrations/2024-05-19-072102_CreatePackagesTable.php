<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePackagesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_paket' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_paket' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'durasi' => [
                'type' => 'INT',
            ],
            'harga' => [
                'type' => 'INT'
            ]
        ]);
        $this->forge->addKey('id_paket', true);
        $this->forge->createTable('paket');
    }

    public function down()
    {
        $this->forge->dropTable('paket');
    }
}
