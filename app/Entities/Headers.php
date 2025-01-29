<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Headers extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
    function getSrcHeadersImage(){
        $ref = $this->id_header;
        $model = (new \App\Models\TmAttachment)->where(['refid' => $ref, 'form' => 'content_headers'])->first();
        if(empty($model)){
            return '-'.$this->id_header.'.svg';
        }
        return base_url('open_attachment?path=').$model->file_path;
    }
}
