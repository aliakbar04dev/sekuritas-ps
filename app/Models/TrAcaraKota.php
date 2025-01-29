<?php

namespace App\Models;

use CodeIgniter\Model;

class TrAcaraKota extends Model
{
    protected $table = 'tr_acara_kota';
    protected $primarykey = 'id';
    protected $allowedFields = [
        'ref_id','region_id','created_at', 'updated_at'
    ];
    protected $returnType = \App\Entities\TrAcaraKota::class;
}
