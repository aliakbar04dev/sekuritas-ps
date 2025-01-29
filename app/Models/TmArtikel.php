<?php

namespace App\Models;

use CodeIgniter\Model;

class TmArtikel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tm_artikel';
    protected $primaryKey       = 'id_artikel';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\TmArtikel::class;

    protected $allowedFields    = ['created_by', 'created_at', 'updated_at', 'judul', 'slug', 'content', 'sumber', 'kategori'];

}
