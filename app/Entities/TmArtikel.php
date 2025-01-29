<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use \App\Modules\Users\Models\Users_model;
use CodeIgniter\I18n\Time;
class TmArtikel extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
    function getAuthor(){
        $model = new Users_model();
        $outdata = $model->first($this->created_by);
        return ($outdata['name'] ?? 'deleted user');
    }
    function getLocalDate(){
        $date = Time::parse($this->created_at, 'Asia/Jakarta', 'id_ID');
        return $date->toLocalizedString('d MMMM yyyy');
    }
    function getSrcThumbnail(){
        $src = $this->id_artikel;
        $modelGambar = (new \App\Models\TmAttachment)->where(['refid' => $src, 'form' => 'artikel_0'])->first();
        if(empty($modelGambar)){
            return base_url().'/assets_frontend/img/artikel.png';
        }
        return base_url('open_attachment?path=').$modelGambar->file_path;
    }
}
