<?php 
namespace App\Modules\Customers\Controllers;
use App\Controllers\BaseController;
use App\Models\Customer;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
class Customers extends BaseController{

    public function index(){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [];
        helper('html');
        helper('form');
        // if($this->request->isAjax()){
        //     ini_set('max_execution_time', 180);
        //     $arrdata['data'] = [];
        //     $alldata = (new Customer)->findAll();
        //     foreach($alldata as $k => $v){
        //         $row = [];
        //         $row[] = '<div style="color: black;">'.$v->id.'</div>';
        //         $row[] = '<div class="text-center" style="color: black;">'.$v->full_name.'</div>';
        //         $row[] = '<div style="color: black; font-size:12px;">'.$v->email.' <br> '.$v->no_wa.'</div>';
        //         $row[] = '<div style="color: black;"><a href="'.base_url('admin/manage/members/detail_referal/'.$v->referal_id).'">'.$v->referal_id.'</a></div>';
                
        //         if ($v->referal == null) {
        //             $row[] = '<div style="color: black;">'.$v->referal_submit.'</div>';
        //         } else {
        //             $row[] = '<div style="color: black;"><a href="'.base_url().'/admin/manage/members/detail/'.$v->referal.'">'.$v->referal_submit.'</a></div>';
        //         }
                
        //         $row[] = '<div style="color: black;">'.$v->nama_referal.'</div>';

        //         if ($v->created_on == null || $v->created_on == '') {
        //             $createon = ' ';
        //         } else {
        //             $createon = '<div style="color: black;">'.date('d/m/Y H:i:s', strtotime($v->created_on)).'</div>';
        //         }

        //         $row[] = $createon;
        //         $row[] = view('App\Modules\Customers\Views\table_action', ['data' => $v->id]);
        //         $arrdata['data'][] = $row;
        //     }
        //     return $this->response->setStatusCode(200)->setJSON($arrdata);
        // }
        $arrdata['pretitle'] = "Master Data";
        $arrdata['title'] = 'Daftar Member';
        $arrdata['actionbar'] = null;
        $userModel = new Customer;
        $page = $this->request->getVar('page_referal') ?? '1';
        $q = $this->request->getVar('q');
        if(!empty($q)){
            $arrdata['data'] = $userModel->like('CONCAT_WS("_",id,full_name, no_wa, email, referal_id, referal_submit, nama_referal)', $q)->paginate(10, 'referal');
            $arrdata['countData'] = $userModel->like('CONCAT_WS("_",id,full_name, no_wa, email, referal_id, referal_submit, nama_referal)', $q)->get()->getNumRows();
            $arrdata['countNow'] = $page > 1 ? count($arrdata['data'])+(($page-1)*10) : count($arrdata['data']);
        }else{
            $arrdata['data'] = $userModel->paginate(10, 'referal');
            $arrdata['countData'] = $userModel->get()->getNumRows();
            $arrdata['countNow'] = $page > 1 ? count($arrdata['data'])+(($page-1)*10) : count($arrdata['data']);

        }
        $arrdata['q'] = @$q;
        $arrdata['data_pager'] = $userModel->pager;

        // $arrdata['actionbar'] = view('App\Modules\Customers\Views\actionbar');
        // $arrdata['table'] = \App\Libraries\Simple_table_builder::run()->generateAjaxTable(explode(';', 'ID ;<div class="text-center ml-5 mr-5">Nama Lengkap</div> ;Kontak ;Referal ID ; Kode Referal ;Nama Referal ;Created On ;<div class="text-center ml-4 mr-4">Aksi </div>'), base_url('admin/manage/members'));
        // $heading = [
        //     ['width' => '1%', 'class' => 'text-center', 'content' => 'ID'],
        //     ['width' => '20%', 'class' => 'text-center', 'content' => 'Nama Lengkap'],
        //     ['width' => '10%', 'class' => 'text-left', 'content' => 'Email'],
        //     ['width' => '10%', 'class' => 'text-center', 'content' => 'No Handphone'],
        //     ['width' => '10%', 'class' => 'text-center', 'content' => 'Referal ID'],
        //     ['width' => '10%', 'class' => 'text-center', 'content' => 'Kode Referal'],
        //     ['width' => '10%', 'class' => 'text-center', 'content' => 'Nama Referal'],
        //     ['width' => '10%', 'class' => 'text-center', 'content' => 'Aksi']
        //     // ['width' => '90%', 'class' => 'text-center', 'content' => 'Aksi'],
        // ];
        // $arrdata['table'] = \App\Libraries\Simple_table_builder::run()->generateAjaxCustomTable($heading, base_url('admin/manage/members'));
        
        echo view('App\Modules\Customers\Views\index', $arrdata);
    }


    public function detail($id){
        $db = \Config\Database::connect();
        $builder = $db->table('members');
        $query = $builder->getWhere(['id' => $id]);
        $dataDetail = $query->getRowArray();
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        // echo json_encode($dataDetail); die;

        $arrdata = [
            'pretitle' => 'Master Data',
            'title' => 'Detail Member',
            'dataDetail' => $dataDetail,
        ];
        echo view('App\Modules\Customers\Views\detail', $arrdata);
    }
    public function detail_referal($refid = null){
        $model = new Customer();
        helper('form');
        helper('html');
        $refDetail = $model->where('referal_id', $refid)->first();
        // $modelReferal = new Customer();
        // $page = $this->request->getVar('page_referal') ?? '1';
        // $q = $this->request->getVar('q');
        // if(!empty($q)){
        //     $countData = $modelReferal->where('referal', $ref->id)->like('CONCAT_WS("_",id,full_name, no_wa, email, referal_id, referal_submit, nama_referal)', $q)->get()->getNumRows();

        //     $data = $modelReferal->where('referal', $ref->id)->like('CONCAT_WS("_",id,full_name, no_wa, email, referal_id, referal_submit, nama_referal)', $q)->paginate(10, 'referal');
        //     $countNow = $page > 1 ? count($data)+(($page-1)*10) : count($data);
        // }else{
        //     $countData = $modelReferal->where('referal', $ref->id)->get()->getNumRows();

        //     $data = $modelReferal->where('referal', $ref->id)->paginate(10, 'referal');
        //     $countNow = $page > 1 ? count($data)+(($page-1)*10) : count($data);
        // }

        $ref = $model->where('referal_submit', $refid)->first();
        $modelReferal = new Customer();
        $page = $this->request->getVar('page_referal') ?? '1';
        $q = $this->request->getVar('q');
        if(!empty($q)){
            $countData = $modelReferal->where('referal_submit', $ref->referal_submit)->like('CONCAT_WS("_",id,full_name, no_wa, email, referal_id, referal_submit, nama_referal)', $q)->get()->getNumRows();
            $data = $modelReferal->where('referal_submit', $ref->referal_submit)->like('CONCAT_WS("_",id,full_name, no_wa, email, referal_id, referal_submit, nama_referal)', $q)->paginate(10, 'referal');
            $countNow = $page > 1 ? count($data)+(($page-1)*10) : count($data);
        }else{
            if (empty($ref->referal_submit)) {
                $countData = "";
                $data = "";
                $countNow = "";
            } else {
                $countData = $modelReferal->where('referal_submit', $ref->referal_submit)->get()->getNumRows();
                $data = $modelReferal->where('referal_submit', $ref->referal_submit)->paginate(10, 'referal');
                $countNow = $page > 1 ? count($data)+(($page-1)*10) : count($data);
            }
            
        }

        // echo json_encode($data); die;

        $pager = $modelReferal->pager;
        $arrdata = [
            'pretitle' => 'Master Data',
            'title' => 'Detail Member Yang Mereferensikan',
            'data' => $data,
            'dataDetail' => $refDetail->toArray(),
            'referal_pager' => $pager,
            'page' => $page,
            'count' => $countData,
            'countNow' => $countNow,
            'q' => $q
        ];
        echo view('App\Modules\Customers\Views\detail_referal', $arrdata);

    }
    public function form($id = null){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata['action'] = base_url('register_user');
        helper('form');
        if($id == null){
            $arrdata['title'] = 'Tambah Member';
            $arrdata['pretitle'] = 'Master Data';
        }else{
            $arrdata['title'] = 'Edit Member';
            $arrdata['pretitle'] = 'Master Data';
            $arrdata['action'] = base_url('admin/manage/members/save/'.$id);
            $arrdata['data'] = (new Customer)->where('id', $id)->first();
        }
        echo view('App\Modules\Customers\Views\form', $arrdata);
    }


    public function save($id = null){
        $validation = \Config\Services::validation();
        $validation->setRules([
            'full_name' => ['label' => "Nama", 'rules' => 'trim|required'],
            'email' => ['label' => 'Alamat Email', 'rules' => 'trim|required|valid_email'],
            'no_wa' => ['label' => 'No. Handphone', 'rules' => 'trim|required|max_length[13]'],
            'region_id' => ['label' => 'Kota', 'rules' => 'trim|required']
        ]);
        if($validation->withRequest($this->request)->run() == false){
            $arrdata['error'] = $validation->getErrors();
            $arrdata['sucess'] = false;
            $arrdata['msg'] = 'Ada Input Yang Belum Terisi';
            return $this->response->setStatusCode(200)->setJSON($arrdata);
         }
         $form = $this->request->getVar();
         $model = new Customer;
         $entity = new \App\Entities\Customer;
         unset($form['provinsi']);
         $entity->fill($form);
         $status = $model->update($id, $entity);
         if($status){
            $arrdata['sucess'] = true;
            $arrdata['error'] = '';
            $arrdata['msg'] = 'Data Telah Terupdate';
            $arrdata['returnurl'] = base_url('admin/manage/members');
         }else{
            $arrdata['sucess'] = false;
            $arrdata['error'] = '';
            $arrdata['msg'] = 'Data Gagal Di update';
         }
         return $this->response->setStatusCode(200)->setJSON($arrdata);
    }

    
    public function delete($id = null){
        (new Customer)->where('id', $id)->delete();
        return $this->response->setStatusCode(200)->setJSON(['msg' => "Data Telah Terhapus", 'sucess' => true, 'error' => '']);
    }
    public function export_excel(){
        $q = $this->request->getVar('q');

        $model = new Customer;
        if(!empty($q)){
            $builder = $model->like('CONCAT_WS("_",id,full_name, no_wa, email, referal_id, referal_submit, nama_referal, created_on)', $q);
        }else{
            $builder = $model;
        }
        $data = $builder->findAll();
        $chunks = array_chunk($data, 1000);
        $spreadsheet = new Spreadsheet();
        $filename = "Data Member per Tanggal ".date('d-m-Y').' Jam  '.date('Hisa').'.xlsx';
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Nomor');
		$sheet->setCellValue('B1', 'Nama Lengkap');
		$sheet->setCellValue('C1', 'Email');
		$sheet->setCellValue('D1', 'No. HP');
		$sheet->setCellValue('E1', 'Ref. ID');
		$sheet->setCellValue('F1', 'Kode Ref');
        $sheet->setCellValue('G1', 'Nama Ref');
        $sheet->setCellValue('H1', 'Created On');
        $rows = 2;
        $inc = 1;
        foreach($chunks as $k => $v){
            foreach($v as $key => $val){
                $sheet->setCellValue('A' . $rows, $inc);
                $sheet->setCellValue('B' . $rows, $val->full_name);
                $sheet->setCellValue('C' . $rows, $val->email);
                $sheet->setCellValue('D' . $rows, "'".$val->no_wa);
                $sheet->setCellValue('E' . $rows, $val->referal_id);
                $sheet->setCellValue('F' . $rows, $val->referal_submit);
                $sheet->setCellValue('G' . $rows, $val->nama_referal);
                $sheet->setCellValue('H' . $rows, $val->created_on ? date('d/m/Y', strtotime($val->created_on)) : '');

                $rows++;
                $inc++;
            }
        }
        $writer = new Xlsx($spreadsheet);
		$writer->save("export/".$filename);
		header("Content-Type: application/vnd.ms-excel");
		return redirect()->to(base_url('export/'.$filename));
    }
}