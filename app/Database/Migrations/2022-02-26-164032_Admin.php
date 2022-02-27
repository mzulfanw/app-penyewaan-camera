<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'roles' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('admin', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('admin', true);
    }
}
