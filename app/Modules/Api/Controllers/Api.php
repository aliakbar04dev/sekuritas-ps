<?php
 
namespace App\Modules\Api\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\Customer;
 
class Api extends ResourceController
{
    use ResponseTrait;

    public function index() {
        $model = new Customer();
        $data = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

    public function referalId($id) {
        $model = new Customer();
        $this->pssi = \Config\Database::connect();
        $this->cac = \Config\Database::connect('tests');

        $res1 = $this->pssi->table('members')
                           ->select(['full_name', 'email', 'no_wa', 'nama_referal', 'created_on'])
                           ->where('referal_submit', $id)
                           ->get()
                           ->getResultArray();
        
        $outData = [];
        foreach($res1 as $value){
            if(empty($value['email'])){
                continue;
            }

            $res2 = $this->cac->table('account')
                              ->select(['account.email', 'account.opening_date', 'account.status_nasabah', 'trans_daily_upload.total_trans', 'trans_daily_upload.date_upload'])
                              ->join('trans_daily_upload', 'account.client_id = trans_daily_upload.cliend_id', 'left')
                              ->where('account.email', $value['email'])
                              ->orderBy('trans_daily_upload.date_upload', 'DESC')
                              ->get()
                              ->getRowArray();   
            if(empty($res2)){
                $outData[] = [
                    'full_name' => $value['full_name'],
                    'email' => $value['email'],
                    'no_wa' => $value['no_wa'],
                    'nama_referal' => $value['nama_referal'],
                    'created_on' => $value['created_on'],
                    'opening_date' => null,
                    'status_nasabah' => null,
                    'date_upload' => null,
                    'total_trans' => null,
                ];
            } else {
                $outData[] = [
                    'full_name' => $value['full_name'],
                    'email' => $value['email'],
                    'no_wa' => $value['no_wa'],
                    'nama_referal' => $value['nama_referal'],
                    'created_on' => $value['created_on'],
                    'opening_date' => $res2['opening_date'] ? date('Y-m-d', strtotime($res2['opening_date'])) : null,
                    'status_nasabah' => $res2['status_nasabah'],
                    'date_upload' => $res2['date_upload'] ? date('Y-m-d', strtotime($res2['date_upload'])) : null,
                    'total_trans' => $res2['total_trans'],
                ];
            }

            // $res3 = $this->cac->table('account')
            //                 ->select(['email', 'opening_date', 'status_nasabah'])
            //                 ->join('trans_daily_upload', 'account.id = blogs.id', 'left')
            //                 ->where('email', $value['email'])
            //                 ->get()
            //                 ->getRowArray();   
            // if(empty($res3)){
            //     continue;
            // }
             


        }

        // echo json_encode($outData); die;

        // $pssi = $model->select(['email'])->where('referal_submit', $id)->findAll();
        // echo json_encode($pssi); die; 

        // $cac = $this->cac->table('account')->select(['email'])->get()->getResultArray();    
        // echo json_encode($cac); die; 

        if ($outData) {
            return $this->respond($outData);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}