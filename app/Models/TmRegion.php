<?php

namespace App\Models;

use CodeIgniter\Model;

class TmRegion extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tm_region';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['provinsi', 'kabupaten_kota', 'region_id'];
    protected $returnType = \App\Entities\TmRegion::class;

    // Dates

}
