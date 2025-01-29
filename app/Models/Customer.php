<?php

namespace App\Models;

use CodeIgniter\Model;

class Customer extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'members';
    protected $primaryKey       = 'id';
    protected $allowedFields = ['id','kota', 'provinsi', 'full_name', 'referal', 'no_wa', 'email', 'created_on', 'region_id', 'nama_referal', 'referal_submit', 'referal_id', 'additional', 'ip_address', 'username'];
    protected $returnType = \App\Entities\Customer::class;
    public function getReferal(&$form){
        $data = $this->where('referal_id', $form['referal_submit'])->first();
        if(empty($data)){
            $form['referal_id'] = null;
        }else{
            $form['referal'] = $data->id;
        }
    }
    public function generateReferalId(&$form){
        // $generatedDate = date('ymdhis');
        // $countDataNow = $this->get()->getNumRows()+1;
        // $generatedId = sprintf('%05d',$countDataNow);
        // $region = $form['region_id'];
        // $form['referal_id'] = $generatedDate.$region.$generatedId;
        $string = '';
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < 5; $i++) {
            $string .= $characters[rand(0, $charactersLength)];
        }
        $form['referal_id'] = $string;
    }
}
