<?php

namespace App\Models;

use CodeIgniter\Model;

class TmBerita extends Model
{
    protected $DBGroup          = 'berita';
    protected $table            = 'news';
    protected $primaryKey       = '_ID';
    protected $useAutoIncrement = true;

    protected $allowedFields    = ['_ID', '_Date', '_Time', 'Category', 'Subject', 'Headline', 'Content', 'Source'];

}
