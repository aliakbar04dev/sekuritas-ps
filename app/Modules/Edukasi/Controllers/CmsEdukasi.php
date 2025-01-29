<?php 
namespace App\Modules\Edukasi\Controllers;
use App\Controllers\BaseController;
use App\Modules\Edukasi\Models\EdukasiModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CmsEdukasi extends BaseController{

    public function index(){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [];
        helper('html');
        helper('form');
        if($this->request->isAjax()){
            $arrdata['data'] = [];
            $alldata = (new EdukasiModel)->list_edukasi();
            foreach($alldata as $k => $v){
                $row = [];
                $row[] = $k + 1;
                $row[] = $v->nama_edukasi;
                $row[] = $v->tanggal_edukasi;
                $row[] = $v->waktu_acara;
                $row[] = $v->level_edukasi;
                $row[] = $v->total;
                $row[] = '<a target="_blank" href="'.base_url('edukasi').'/'.$v->kode_edukasi.'">'.base_url('edukasi').'/'.$v->kode_edukasi.'</a>';
                $row[] = view('App\Modules\Edukasi\Views\cms\table_action_edukasi', ['data' => $v->id]);
                $arrdata['data'][] = $row;
            }
            return $this->response->setStatusCode(200)->setJSON($arrdata);
        }
        $arrdata['pretitle'] = 'Master Data';
        $arrdata['title'] = 'Master Edukasi';
        $arrdata['actionbar'] = view('App\Modules\Edukasi\Views\cms\actionbar_edukasi');
        $arrdata['table'] = \App\Libraries\Simple_table_builder::run()->generateAjaxTable(
            explode(';', '
                <div style="width:98%;">No</div> ;
                <div style="width:1%;">Nama</div> ;
                
                <div style="width:1%;">Tanggal Edukasi</div> ;
                <div style="width:1%;">Waktu Acara</div> ;
                <div style="width:1%;">Level</div> ;
                <div style="width:1%;">Total</div> ;
                <div style="width:1%;">Link</div> ;
                <div style="width:1%;" class="text-center">Aksi</div>'
            ), base_url('admin/manage/edukasi'));
        echo view('backend/list', $arrdata);
    }

    function create($id = null){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [];
        helper('form');
        if($id != null && $id != '-'){
            $arrdata['data'] = (new EdukasiModel)->where('id', $id)->first();
        }
        $arrdata['pretitle'] = 'Konten';
        $arrdata['title'] = $id == null ? 'Tambah Form Edukasi' : 'Edit Form Edukasi';
        $arrdata['form_action'] = base_url('admin/manage/edukasi/saveForm/'.($id ?? '-'));

        echo view('\App\Modules\Edukasi\Views\cms\form_create_edukasi', $arrdata);
    }

    function saveForm($id = null){
        $msg = ['sucess' => false, 'msg' => '', 'error' => ''];
        helper('utility_helper');

        $db      = \Config\Database::connect();
        $builder = $db->table('edukasi_master');

        $validated = $this->validate([
            'nama_edukasi' => [
                'rules' => 'required|is_unique[edukasi_master.nama_edukasi,id,{id}]',
                'errors' => [
                    'required' => 'Nama Edukasi Harus diisi',
                    'is_unique' => 'Nama Edukasi Sudah Ada',
                ]
            ],
            'kode_edukasi' => [
                'rules' => 'required|is_unique[edukasi_master.kode_edukasi,id,{id}]',
                'errors' => [
                    'required' => 'Kode Edukasi Harus diisi',
                    'is_unique' => 'Kode Edukasi Sudah Ada',
                ]
            ],
            'tempat_acara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat Acara Harus diisi'
                ]
            ],
            'tanggal_edukasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Edukasi Harus diisi'
                ]
            ],
            'waktu_acara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu Acara Harus diisi'
                ]
            ],
            'pembicara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pembicara Harus diisi'
                ]
            ],
            'level_edukasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level Edukasi Harus diisi'
                ]
            ],
        ]);

        if (!$validated) {
            // $msg['error'] = "Semua Kolom harus di Isi";
            $msg['error_message'] = $this->validator->getErrors();
            $msg['token'] = csrf_hash();
            return $this->response->setStatusCode(200)->setJSON($msg);
        }else{

            $tanggal_edukasi = $this->request->getVar('tanggal_edukasi');
            $date = str_replace('/', '-', $tanggal_edukasi);
            $tanggal_edukasi_date = date('Y-m-d', strtotime($date));

            $data = [
                'nama_edukasi'    => $this->request->getVar('nama_edukasi'),
                'tanggal_edukasi' => $tanggal_edukasi_date,
                'tempat_acara'    => $this->request->getVar('tempat_acara'),
                'waktu_acara'     => $this->request->getVar('waktu_acara'),
                'pembicara'       => $this->request->getVar('pembicara'),
                'level_edukasi'   => $this->request->getVar('level_edukasi'),
                'kode_edukasi'    => strtolower(trim($this->request->getVar('kode_edukasi'))),
                'created_at'      => date('Y-m-d H:i:s'),
            ];
            if($id == '-' || $id == null){
                $builder->insert($data);

                $msg['sucess'] = true;
                $msg['msg'] = 'Data Telah Terinput';
                $msg['token'] = csrf_hash();
                $msg['returnurl'] = base_url('admin/manage/edukasi');

                return $this->response->setStatusCode(200)->setJSON($msg);
            }else{
                $builder->where('id', $id);
                $builder->update($data);

                $msg = 'Data Telah Terupdate';
                $output = ['sucess' => true, 'msg' => @$msg, 'returnurl' => base_url('admin/manage/edukasi'), "token" => csrf_hash()];

                return $this->response->setStatusCode(200)->setJSON($output);
            }
        }
    }

    public function delete_edukasi($id = null){
        (new EdukasiModel)->where('id', $id)->delete();
        return $this->response->setStatusCode(200)->setJSON(['msg' => "Data Telah Terhapus", 'sucess' => true, 'error' => '']);
    }

    // ======================= list peserta ======================
    public function peserta($id){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [];
        helper('form');
        $arrdata['data'] = (new EdukasiModel)->where('id', $id)->first();
        $arrdata['peserta'] = (new EdukasiModel)->list_peserta_edukasi($id);
        $arrdata['pretitle'] = 'Konten';
        $arrdata['title'] = 'Peserta Form Edukasi';
        $arrdata['form_action'] = null;

        echo view('\App\Modules\Edukasi\Views\cms\list_peserta_edukasi', $arrdata);
    }

    public function peserta_all(){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [];
        helper('html');
        helper('form');
        if($this->request->isAjax()){
            $arrdata['data'] = [];
            $alldata = (new EdukasiModel)->peserta_all();
            foreach($alldata as $k => $v){
                $row = [];
                $row[] = $k + 1;
                $row[] = $v->nama;
                $row[] = $v->email;
                $row[] = $v->handphone;
                $row[] = $v->client_id;
                $row[] = $v->kode_referal;
                $row[] = $v->nama_edukasi;
                $row[] = $v->tanggal_edukasi;
                // $row[] = $v->waktu_acara;
                // $row[] = $v->level_edukasi;
                // $row[] = view('App\Modules\Edukasi\Views\cms\table_action_peserta_all', ['data' => $v->id]);
                $arrdata['data'][] = $row;
            }
            return $this->response->setStatusCode(200)->setJSON($arrdata);
        }
        $arrdata['pretitle'] = 'Master Data';
        $arrdata['title'] = 'List All Peserta Edukasi';
        $arrdata['actionbar'] = view('App\Modules\Edukasi\Views\cms\actionbar_peserta_all');
        $arrdata['table'] = \App\Libraries\Simple_table_builder::run()->generateAjaxTable(
            explode(';', '
                <div style="width:98%;">No</div> ;
                <div style="width:1%;">Nama</div> ;
                <div style="width:1%;">Email</div> ;
                <div style="width:1%;">Handphone</div> ;
                <div style="width:1%;">Client ID</div> ;
                <div style="width:1%;">Kode Referal</div> ;
                <div style="width:1%;">Nama Edukasi</div> ;
                
                <div style="width:1%;">Tanggal Edukasi</div> '
            ), base_url('admin/manage/edukasi/peserta_all'));
        echo view('backend/list', $arrdata);
    }
    // ======================= list peserta ======================

    public function peserta_all_export(){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $builder = new EdukasiModel;
        
        $data = $builder->peserta_all();
        $chunks = array_chunk($data, 1000);
        $spreadsheet = new Spreadsheet();
        $filename = "Data Peserta Edukasi per ".date('d-m-Y').' Jam  '.date('Hisa').'.xlsx';
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Nomor');
		$sheet->setCellValue('B1', 'Nama');
		$sheet->setCellValue('C1', 'Alamat Email');
		$sheet->setCellValue('D1', 'No Handphone');
		$sheet->setCellValue('E1', 'Client ID');
        $sheet->setCellValue('F1', 'Kode Referal');
        $sheet->setCellValue('G1', 'Nama Edukasi');
        $sheet->setCellValue('H1', 'Tanggal Edukasi');
        $sheet->setCellValue('I1', 'Tempat Acara');
        $sheet->setCellValue('J1', 'Waktu Acara');
        $sheet->setCellValue('K1', 'Pembicara');
        $sheet->setCellValue('L1', 'Level Edukasi');
        $rows = 2;
        $inc = 1;
        foreach($chunks as $k => $v){
            foreach($v as $key => $val){
                $sheet->setCellValue('A' . $rows, $inc);
                $sheet->setCellValue('B' . $rows, $val->nama);
                $sheet->setCellValue('C' . $rows, $val->email);
                $sheet->setCellValue('D' . $rows, "'".$val->handphone);
                $sheet->setCellValue('E' . $rows, $val->client_id);
                $sheet->setCellValue('F' . $rows, $val->kode_referal);
                $sheet->setCellValue('G' . $rows, $val->nama_edukasi);
                $sheet->setCellValue('H' . $rows, $val->tanggal_edukasi);
                $sheet->setCellValue('I' . $rows, $val->tempat_acara);
                $sheet->setCellValue('J' . $rows, $val->waktu_acara);
                $sheet->setCellValue('K' . $rows, $val->pembicara);
                $sheet->setCellValue('L' . $rows, $val->level_edukasi);

                $rows++;
                $inc++;
            }
        }
        $writer = new Xlsx($spreadsheet);
		$writer->save("export/".$filename);
		header("Content-Type: application/vnd.ms-excel");
		return redirect()->to(base_url('export/'.$filename));
    }

    function peserta_delete(){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }

        $id = $this->request->getVar('id');
        (new EdukasiModel)->delete_peserta($id);
        return $this->response->setStatusCode(200)->setJSON(['msg' => "Data Telah Terhapus", 'sucess' => true, 'error' => '', "token" => csrf_hash()]);
    }
}