<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Customer extends Entity
{

    public function getNamaProvinsi(){
        $regionId = $this->region_id;
        $data = (new \App\Models\TmRegion)->where('region_id', $this->region_id)->first();
        if(!isset($data)){
            return '-';
        }
        return $data->provinsi;
    }
    public function getNamaKota(){
        $regionId = $this->region_id;
        $data = (new \App\Models\TmRegion)->where('region_id', $this->region_id)->first();
        if(!isset($data)){
            return '-';
        }
        return $data->kabupaten_kota;
    }
}
