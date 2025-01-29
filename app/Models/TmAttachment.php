<?php

namespace App\Models;

use CodeIgniter\Model;

class TmAttachment extends Model
{
    protected $table            = 'tm_attachment';
    protected $primaryKey       = 'id_attachment';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\TmAttachment::class;
    protected $allowedFields    = [
        'refid', 'form', 'file_name', 'file_path', 'file_extension', 'uploaded_at', 'uploaded_by'
    ];

}
