<?php

namespace App\Models;

use CodeIgniter\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_user', 'title', 'content', 'image', 'created_at', 'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}