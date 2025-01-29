<?php

namespace App\Models;

use CodeIgniter\Model;

class Subscriber extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'subscriber';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\Subscriber::class;

    protected $allowedFields    = ['email'];

    // Dates

}
