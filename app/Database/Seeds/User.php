<?php

namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run() // Crea un nuevo usuario en la tabla "users" de la DB, con estos datos:
    {

        $user = "admin";
        $email = "admin@gmail.com";
        $password = password_hash("admin",PASSWORD_DEFAULT);
        $type = "admin";

        $data = [
            'user' => $user,
            'email'    => $email,
            'password' => $password,
            'type' => $type,
        ];

        $this->db->table('users')->insert($data);
    }
}
