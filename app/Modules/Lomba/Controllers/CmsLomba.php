<?php 
namespace App\Modules\Lomba\Controllers;
use App\Controllers\BaseController;
use App\Modules\Lomba\Models\LombaModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CmsLomba extends BaseController{

    public function index(){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [];
        helper('html');
        helper('form');
        if($this->request->isAjax()){
            $arrdata['data'] = [];
            $alldata = (new LombaModel)->findAll();
            foreach($alldata as $k => $v){
                $row = [];
                $row[] = $k + 1;
                $row[] = $v->cabang;
                $row[] = $v->nama;
                // $row[] = $v->email;
                $row[] = $v->total_peserta;
                $row[] = $v->created_at;
                $row[] = number_format($v->total_pembayaran,0,',','.');
                $row[] = $v->status_pembayaran == 0 ? '<span class="badge badge-warning">Belum</span>' : '<span class="badge badge-success">Sudah</span>';
                $row[] = view('App\Modules\Lomba\Views\cms\table_action', ['data' => $v->id]);
                $arrdata['data'][] = $row;
            }
            return $this->response->setStatusCode(200)->setJSON($arrdata);
        }
        $arrdata['pretitle'] = 'Master Data';
        $arrdata['title'] = 'List Pendaftaran Lomba';
        $arrdata['actionbar'] = null;
        $arrdata['table'] = \App\Libraries\Simple_table_builder::run()->generateAjaxTable(
            explode(';', '
                <div style="width:98%;">No</div> ;
                <div style="width:1%;">Cabang</div> ;
                <div style="width:1%;">Nama</div> ;
                <div style="width:1%;">Total Peserta</div> ;
                <div style="width:1%;">Created At</div> ;
                <div style="width:1%;">Total</div> ;
                <div style="width:1%;">Status</div> ;
                <div style="width:1%;" class="text-center">Aksi</div>'
            ), base_url('admin/manage/lomba'));
        echo view('backend/list', $arrdata);
    }


    public function delete($id = null){
        (new LombaModel)->where('id', $id)->delete();
        return $this->response->setStatusCode(200)->setJSON(['msg' => "Data Telah Terhapus", 'sucess' => true, 'error' => '']);
    }

    public function peserta(){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [];
        helper('html');
        helper('form');
        if($this->request->isAjax()){
            $arrdata['data'] = [];
            $alldata = (new LombaModel)->peserta();
            foreach($alldata as $k => $v){
                $row = [];
                $row[] = $k + 1;
                $row[] = $v->cabang;
                $row[] = $v->nama;
                $row[] = $v->email;
                $row[] = $v->client_id;
                $row[] = $v->nasabah;
                $row[] = $v->telepon;
                $row[] = $v->status_pembayaran == 0 ? '<a class="badge badge-warning" href="'.site_url('admin/manage/lomba/detail/'.$v->id_lomba).'">Belum</a>' : '<a href="'.site_url('admin/manage/lomba/detail/'.$v->id_lomba).'" class="badge badge-success">Sudah</a>';
                // $row[] = view('App\Modules\Lomba\Views\cms\table_action', ['data' => $v->id_detail]);
                $arrdata['data'][] = $row;
            }
            return $this->response->setStatusCode(200)->setJSON($arrdata);
        }
        $arrdata['pretitle'] = 'Master Data';
        $arrdata['title'] = 'List Peserta Lomba';
        $arrdata['actionbar'] = null;
        $arrdata['table'] = \App\Libraries\Simple_table_builder::run()->generateAjaxTable(
            explode(';', '
                <div style="width:98%;">No</div> ;
                <div style="width:1%;">Cabang</div> ;
                <div style="width:1%;">Nama</div> ;
                <div style="width:1%;">Email</div> ;
                <div style="width:1%;">Client ID</div> ;
                <div style="width:1%;">Nasabah</div> ;
                <div style="width:1%;">Telepon</div>;
                <div style="width:1%;">Status Pembayaran</div>'
            ), base_url('admin/manage/lomba/peserta'));
        echo view('backend/list', $arrdata);
    }

    function detail($id = null){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [];
        helper('form');
        if($id != null){
            $arrdata['data'] = (new LombaModel)->where('id', $id)->first();
            $arrdata['teman'] = (new LombaModel)->getDetail($id);
        }

        // echo json_encode($arrdata['data']); die;

        $arrdata['pretitle'] = 'Register Lomba';
        $arrdata['title'] = 'List Pendaftaran Lomba';
        echo view('App\Modules\Lomba\Views\cms\detail_register', $arrdata);
        return;
    }

    public function konfirmasi(){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [];
        helper('html');
        helper('form');
        if($this->request->isAjax()){
            $arrdata['data'] = [];
            $alldata = (new LombaModel)->konfirmasi();
            foreach($alldata as $k => $v){
                $row = [];
                $row[] = $k + 1;
                $row[] = $v->nama;
                $row[] = $v->email;
                $row[] = $v->tanggal_pembayaran;
                $row[] = $v->bank;
                $row[] = $v->nama_rekening;
                $row[] = $v->nomor_rekening;
                $row[] = number_format($v->jumlah_bayar,0,',','.');
                $row[] = $v->created_at;
                $row[] = view('App\Modules\Lomba\Views\cms\table_action_konfirmasi', ['data' => $v->id]);
                $arrdata['data'][] = $row;
            }
            return $this->response->setStatusCode(200)->setJSON($arrdata);
        }
        $arrdata['pretitle'] = 'Master Data';
        $arrdata['title'] = 'List Konfirmasi Pendaftaran';
        $arrdata['actionbar'] = null;
        $arrdata['table'] = \App\Libraries\Simple_table_builder::run()->generateAjaxTable(
            explode(';', '
                <div style="width:98%;">No</div> ;
                <div style="width:1%;">Nama</div> ;
                <div style="width:1%;">Email</div> ;
                <div style="width:1%;">Tanggal Pembayaran</div> ;
                <div style="width:1%;">Bank</div> ;
                <div style="width:1%;">Nama Rekening</div> ;
                <div style="width:1%;">Nomor Rekening</div> ;
                <div style="width:1%;">Jumlah Bayar</div> ;
                <div style="width:1%;">Created At</div> ;
                <div style="width:1%;" class="text-center">Aksi</div>'
            ), base_url('admin/manage/lomba/konfirmasi'));
        echo view('backend/list', $arrdata);
    }

    function detail_konfirmasi($id = null){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [];
        helper('form');
        if($id != null){
            $arrdata['data'] = (new LombaModel)->detail_konfirmasi($id);
        }

        // print_r($arrdata['data']);
        // echo json_encode($arrdata['data']); die;

        $arrdata['pretitle'] = 'Register Lomba';
        $arrdata['title'] = 'List Konfirmasi Pendaftaran';
        echo view('App\Modules\Lomba\Views\cms\detail_konfirmasi', $arrdata);
        return;
    }

    public function delete_konfirmasi($id = null){
        (new LombaModel)->delete_konfirmasi($id);
        return $this->response->setStatusCode(200)->setJSON(['msg' => "Data Telah Terhapus", 'sucess' => true, 'error' => '']);
    }

    public function pay($id){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }else{
            (new LombaModel)->confirm_payment($id);
            return redirect()->to(site_url('admin/manage/lomba/detail/'.$id));
            // return $this->response->setStatusCode(200)->setJSON(['msg' => "Data Telah Diubah", 'sucess' => true, 'error' => '']);
        }
        
    }

    public function export_excel(){
        $builder = new LombaModel;
        
        $data = $builder->findAll();
        $chunks = array_chunk($data, 1000);
        $spreadsheet = new Spreadsheet();
        $filename = "Data Lomba per Tanggal ".date('d-m-Y').' Jam  '.date('Hisa').'.xlsx';
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Nomor');
		$sheet->setCellValue('B1', 'Cabang');
		$sheet->setCellValue('C1', 'Nama');
		// $sheet->setCellValue('D1', 'No. HP');
		// $sheet->setCellValue('E1', 'Email');
		// $sheet->setCellValue('F1', 'Nasabah');
        // $sheet->setCellValue('G1', 'Client ID');
        $sheet->setCellValue('D1', 'Bersama Teman');
        $sheet->setCellValue('E1', 'Created On');
        $sheet->setCellValue('F1', 'Total Peserta');
        $sheet->setCellValue('G1', 'Total Pembayaran');
        $sheet->setCellValue('H1', 'Status Pembayaran');
        $rows = 2;
        $inc = 1;
        foreach($chunks as $k => $v){
            foreach($v as $key => $val){
                $sheet->setCellValue('A' . $rows, $inc);
                $sheet->setCellValue('B' . $rows, $val->cabang);
                $sheet->setCellValue('C' . $rows, $val->nama);
                // $sheet->setCellValue('D' . $rows, "'".$val->telepon);
                // $sheet->setCellValue('E' . $rows, $val->email);
                // $sheet->setCellValue('F' . $rows, $val->nasabah);
                // $sheet->setCellValue('G' . $rows, $val->client_id);
                $sheet->setCellValue('D' . $rows, $val->bersama_teman);
                $sheet->setCellValue('E' . $rows, $val->created_at);
                $sheet->setCellValue('F' . $rows, $val->total_peserta);
                $sheet->setCellValue('G' . $rows, $val->total_pembayaran);
                $sheet->setCellValue('H' . $rows, $val->status_pembayaran);

                $rows++;
                $inc++;
            }
        }
        $writer = new Xlsx($spreadsheet);
		$writer->save("export/".$filename);
		header("Content-Type: application/vnd.ms-excel");
		return redirect()->to(base_url('export/'.$filename));
    }

    public function export_peserta(){
        $builder = new LombaModel;
        
        $data = $builder->peserta();
        $chunks = array_chunk($data, 1000);
        $spreadsheet = new Spreadsheet();
        $filename = "Data Peserta per Tanggal ".date('d-m-Y').' Jam  '.date('Hisa').'.xlsx';
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Nomor');
		$sheet->setCellValue('B1', 'Nama');
		$sheet->setCellValue('C1', 'No. HP');
		$sheet->setCellValue('D1', 'Email');
		$sheet->setCellValue('E1', 'Nasabah');
        $sheet->setCellValue('F1', 'Client ID');
        $sheet->setCellValue('G1', 'Cabang');
        $sheet->setCellValue('H1', 'Status Pembayaran');
        $rows = 2;
        $inc = 1;
        foreach($chunks as $k => $v){
            foreach($v as $key => $val){
                $sheet->setCellValue('A' . $rows, $inc);
                $sheet->setCellValue('B' . $rows, $val->nama);
                $sheet->setCellValue('C' . $rows, "'".$val->telepon);
                $sheet->setCellValue('D' . $rows, $val->email);
                $sheet->setCellValue('E' . $rows, $val->nasabah);
                $sheet->setCellValue('F' . $rows, $val->client_id);
                $sheet->setCellValue('G' . $rows, $val->cabang);
                $sheet->setCellValue('H' . $rows, ($val->status_pembayaran == 1) ? "Sudah" : "Belum");

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