<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\TmRegion;
class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function getRegion(){
        $model = new TmRegion;
        if($this->request->getVar('id_provinsi')){
            $arrdata = [];
            $form = $this->request->getVar('id_provinsi');
            $id_prov = substr($form, 0, 2);
            $arrdata['kota_kabupaten'] = $model->select('kabupaten_kota nama,region_id id')->where(['LEFT(region_id,2)' => $id_prov,'RIGHT(region_id,2) !=' => '00'])->findAll();

        }else{
            $arrdata = ['provinsi' => []];
            $data = $model->select('provinsi nama,region_id id')->where('RIGHT(region_id,2)', '00')->findAll();
            $arrdata['provinsi'] = $data;
        }
        return $this->response->setStatusCode(200)->setJSON($arrdata);
    }
    public function syncDataUsersLama(){
        $this->db = \Config\Database::connect();
        $getDataUsersLama = $this->db->table('users_lama')->get()->getResultArray();
        $counter = 0;
        foreach($getDataUsersLama as $k => $v){
            $model = new \App\Models\Customer;
            $entity = new \App\Entities\Customer;
            $dataInsert = [
                'id' => $v['id'],
                'ip_address' => $v['ip_address'],
                'username' => $v['username'],
                'referal_id' => $v['referal_id'],
                'email' => $v['email'],
                'full_name' => $v['full_name'],
                'no_wa' => $v['no_telp'],
                'referal' => $v['referal'],
                'nama_referal' => $v['nama_referal'],
                'referal_submit' => $v['referal_submit'],
                'additional' => $v['additional']
            ];
            $additionalData = json_decode($v['additional']);
            if(!empty($additionalData)){
                $provinsi = @$additionalData->province_name;
                $kabupaten = @$additionalData->kota;
                $findKota = (new \App\Models\TmRegion)->like(['provinsi' => '%'.$provinsi.'%', 'kabupaten_kota' => '%'.$kabupaten.'%'])->first();
                if(!empty($findKota)){
                   $dataInsert['region_id'] = $findKota->region_id;
                }
               
            } 
            $save = $this->db->table('members')->insert($dataInsert);
            if($save){
                $counter++;
            }
        }
        echo $counter." Data Berhasil diinput";
    }
}
