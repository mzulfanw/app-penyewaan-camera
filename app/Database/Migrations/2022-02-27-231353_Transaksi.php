<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
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
                'type' => 'INT',
                'constraint' => 5,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'jumlah' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'total_harga' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'payment_method' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'potoktp' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'pototf' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'tanggal_keluar' => [
                'type' => 'DATE',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('transaksi', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('transaksi');
    }
}
