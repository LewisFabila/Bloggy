<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_user'=>[
                'type'=>'bigint',
                'constraint'=>20,
                'unsigned'=>true,
                'auto_increment'=>true,
            ],
            'user'=>[
                'type'=>'varchar',
                'constraint'=>'255',
            ],
            'email'=>[
                'type'=>'varchar',
                'constraint'=>'255',
            ],
            'password'=>[
                'type'=>'varchar',
                'constraint'=>'255',
            ],
            'type'=>[
                'type'=>'varchar',
                'constraint'=>'255',
            ],
        ]);

        $this->forge->addkey('id_user',true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        //
        $this->forge->dropTable('users');
    }
}
