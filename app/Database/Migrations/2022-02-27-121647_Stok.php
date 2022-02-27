<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Stok extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'barang_id' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'stok' => [
                'type' => 'INT',
                'constraint' => '100',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('stok');
    }

    public function down()
    {
        //
        $this->forge->dropTable('stok');
    }
}
