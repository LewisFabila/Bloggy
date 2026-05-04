<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'int',
                'unsigned' => true,
            ],
            'title' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'content' => [
                'type' => 'text',
            ],
            'image' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey(
            'id_user',     // Columna local
            'users',       // Tabla
            'id_user',     // Columna referenciada
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('posts');
    }

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}
