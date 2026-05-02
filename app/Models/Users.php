<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user', 'email', 'password'];

    public function getUser($data)
    {
        return $this->where($data)->findAll();
    }
}