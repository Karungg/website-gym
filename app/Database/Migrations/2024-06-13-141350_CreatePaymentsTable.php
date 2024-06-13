<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_payment' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tgl_bayar' => [
                'type'       => 'date',
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'metode_pembayaran' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'total' => [
                'type' => 'INT',
            ],
            'id_membership' => [
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
        $this->forge->addKey('id_payment', true);
        $this->forge->createTable('payments');
    }

    public function down()
    {
        $this->forge->dropTable('payments');
    }
}
