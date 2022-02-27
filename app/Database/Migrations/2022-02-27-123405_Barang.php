<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
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
            'nama_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'harga' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'deskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'kategori_id' => [
                'type' => 'INT',
                'constraint' => '100',
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('barang', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('barang');
    }
}
