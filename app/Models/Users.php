<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Users;

class Users extends Model
{
    public function getUser($data){
        $user = $this->db->table('users');
        $user->where($data);
        return $user->get()->getResultArray();
    }
}
