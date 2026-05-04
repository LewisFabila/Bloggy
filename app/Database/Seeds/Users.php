<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $users = [
            [
                'user' => 'Admin',
                'email'    => 'admin@gmail.com',
                'password' => password_hash('admin',PASSWORD_DEFAULT),
                'type' => 'admin',
            ],
            [
                'user' => 'Mordecai',
                'email'    => 'mordo.slacker8bit@gmail.com',
                'password' => password_hash('123456',PASSWORD_DEFAULT),
                'type' => 'user',
            ],
            [
                'user' => 'Gumball Watterson',
                'email'    => 'gumball.increible.elmore@gmail.com',
                'password' => password_hash('123456',PASSWORD_DEFAULT),
                'type' => 'user',
            ],
            [
                'user' => 'Johnny Bravo',
                'email'    => 'johnny.hoohah.bravo@gmail.com',
                'password' => password_hash('123456',PASSWORD_DEFAULT),
                'type' => 'user',
            ],
        ];

        $this->db->table('users')->insertBatch($users);
    }
}
