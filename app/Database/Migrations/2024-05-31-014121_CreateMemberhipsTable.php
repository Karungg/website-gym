<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMemberhipsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_membership' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint' => '14'
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => '12'
            ],
            'tgl_lahir' => [
                'type' => 'date',
            ],
            'no_ktp' => [
                'type' => 'VARCHAR',
                'constraint' => '16'
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'foto_diri' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'foto_ktp' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ],
            'id_paket' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id_membership', true);
        $this->forge->createTable('memberships');
    }

    public function down()
    {
        $this->forge->dropTable('memberships');
    }
}
