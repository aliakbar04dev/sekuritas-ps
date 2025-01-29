<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $allowedFields    = ['username' ,'password', 'email', 'jenis_kelamin', 'status', 'alamat', 'name', 'tanggal_lahir', 'login_expired', 'login_key'];

}
