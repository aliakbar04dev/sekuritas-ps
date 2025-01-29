<?php

namespace App\Models;

use CodeIgniter\Model;

class Headers extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'headers';
    protected $primaryKey       = 'id_header';

    protected $returnType       = \App\Entities\Headers::class;
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['title', 'subtitle', 'use_button', 'text_button', 'link', 'status', 'created_at', 'updated_at'];

}
