<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' =>  [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
        ]);
        $this->forge->addkey('id', true);
        $this->forge->createTable('kategori', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('kategori');
    }
}
