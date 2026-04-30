<?php

namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {

        $user = "admin";
        $email = "jlfabilaceballos137@gmail.com";
        $password = password_hash("default123",PASSWORD_DEFAULT);
        $type = "admin";

        $data = [
            'user' => $user,
            'email'    => $email,
            'password' => $password,
            'type' => $type,
        ];

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
