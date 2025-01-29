<?php 
namespace App\Modules\Acara\Controllers;
use App\Controllers\BaseController;
use App\Models\TmAcara;
use App\Models\TmAttachment;
use App\Models\TrAcaraKota;

class Acara extends BaseController{

    function index(){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [];
        helper('html');
        helper('form');
        if($this->request->isAjax()){
            $arrdata['data'] = [];
            $alldata = (new TmAcara)->orderBy('updated_at','DESC')->findAll();
            foreach($alldata as $k => $v){                
                $row = [];
                $row[] = $k + 1;
                $row[] = '<div style="border:none; overflow: hidden; padding: 0;">
                            <img src="'.$v->src_gambar_depan.'" alt="" style="max-height: 70px;">
                        </div>';
                $row[] = '<div class="text-center">'.$v->judul.'</div>';
                $row[] = $v->hari.", ".$v->local_date;

                if (strpos($v->kota_list, 'Kota') !== false) {
                    $row[] = substr($v->kota_list, 5);                
                } elseif (strpos($v->kota_list, 'Kabupaten') !== false) {
                    $row[] = substr($v->kota_list, 10);                
                } else {
                    $row[] = 'error';
                }

                // $row[] = $v->level_text;

                // $row[] = anchor(base_url('detailedukasi/'.$v->slug),'<i class="la la-link"></i>Menuju Link', ['class' => 'btn btn-link', 'target' => '__blank']);
                // $row[] = $v->author;
                $row[] = $v->updated_at->humanize();
                $row[] = view('App\Modules\Acara\Views\table_action', ['id' => $v->id_acara]);
                $arrdata['data'][] = $row;
            }
            return $this->response->setStatusCode(200)->setJSON($arrdata);
        }
        $arrdata['pretitle'] = 'Konten';
        $arrdata['title'] = 'Daftar Edukasi';
        $arrdata['actionbar'] = view('App\Modules\Acara\Views\actionbar');
        $arrdata['table'] = \App\Libraries\Simple_table_builder::run()->generateAjaxTable(explode(';', 'No. ;Cover Edukasi ;<div class="text-center ml-5 mr-5">Judul Edukasi</div> ;Tgl Edukasi ;Kota ;Update Terakhir ;<div class="text-center">Aksi </div>'), base_url('admin/content/acara'));
        echo view('backend/list', $arrdata);
    }


    function form($id = null){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [];
        helper('form');
        $arrdata['kota'] = [];
        if($id != null && $id != '-'){
            $arrdata['data'] = (new TmAcara)->where('id_acara', $id)->first();
            $arrdata['kota'] = (new TrAcaraKota)->where('ref_id', $id)->get()->getResultArray();
            $arrdata['gambar_depan'] = (new TmAttachment)->where(['refid' => $id, 'form' => 'acara_edukasi_0'])->first();
            $arrdata['gambar_detail'] = (new TmAttachment)->where(['refid' => $id, 'form' => 'acara_edukasi_1'])->first();

        }
        $arrdata['listKota'] = (new \App\Models\TmRegion)->where('RIGHT(region_id,2) != ', '00')->findAll();
        $arrdata['pretitle'] = 'Konten';
        $arrdata['title'] = $id == null ? 'Tambah Edukasi' : 'Edit Edukasi';
        $arrdata['form_action'] = base_url('admin/content/acara/saveForm/'.($id ?? '-'));

        echo view('\App\Modules\Acara\Views\form', $arrdata);
    }


    public function saveForm($id = null){
        if(empty(session('isLogin'))){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $validation = \Config\Services::validation();
        // Save Data
        if($id == null || $id == '-'){
            $validation->setRules([
                'form.judul' => 'required',
                'form.slug' => 'required|unique_acara_slug[form.slug]',
                'form.tanggal_acara' => 'required',
                'form.kota.*' => 'required',
                'form.level' => 'required',
                'form.content' => 'required',
                'attachment.path0' => 'required',
                'time.*' => 'required',
                'form.time_type' => 'required'
            ],
            [
                'form.judul' => ['required' => 'Field Judul is Required'],
                'form.tanggal_acara' => ['required' => 'Field Tanggal Acara is Required'],
                'form.level' => ['required' => 'Field Level is Required'],
                'form.content' => ['required' => 'Field Content Acara Edukasi is Required'],
                'form.kota.*' => ['required' => 'Field Kota is Required'],
                'form.slug' => ['unique_acara_slug' => 'Link/Slug Acara Edukasi Sudah Pernah Digunakan!'],

                'attachment.path0' => ['required' => 'Gambar Depan File is Required'],
                'time.*' => ['required' => "Field Tanggal Acara is Required"],
                'form.time_type' => ['required' => 'Field Tanggal Acara is Required']

            ]);
            if(!$validation->withRequest($this->request)->run()){
                return $this->response->setStatusCode(200)->setJSON(['sucess' => false,'error' => 'Ada Input Yang Belum Terisi']);
            }
            $data = $this->request->getVar('form');
            $waktu_acara = $this->request->getVar('time');
            $waktu_acara = implode(':', $waktu_acara);
            $data['tanggal_acara'] = date('Y-m-d H:i',strtotime($data['tanggal_acara'].' '.$waktu_acara));
            $acaraModel = new \App\Models\TmAcara;
            $msg = $data;
            $model = new \App\Entities\TmAcara;
            $model->fill($data);
            $model->tahun = date('Y', strtotime($data['tanggal_acara']));
            $model->bulan = date('m', strtotime($data['tanggal_acara']));
            $model->created_at = date('Y-m-d H:i:s');
            $model->updated_at = date('Y-m-d H:i:s');
            $model->created_by = session('id') ?? '1';
            $sucess = $acaraModel->save($model);
            if($sucess == true){
                $msg = $acaraModel->getInsertID();
                foreach($data['kota'] as $k => $v){
                    $modelKota = new \App\Models\TrAcaraKota;
                    $repoKota = new \App\Entities\TrAcaraKota;
                    $repoKota->region_id = $v;
                    $repoKota->ref_id = $msg;
                    $modelKota->save($repoKota);
                }
                $form = 'acara_edukasi';
                $formData = $this->request->getVar('attachment');
                // for($i = 0; $i <= 1;$i++){
                    $i = 0;
                    $attachmentData = [
                        'file_path' => $formData['path'.$i],
                        'file_name' => $formData['file_name'.$i],
                        'form' => $form.'_'.$i,
                        'uploaded_at' => date('Y-m-d H:i:s'),
                        'uploaded_by' => session('id') ?? '1',
                        'refid' => $msg
                    ]; 
                    $model = new \App\Models\TmAttachment;
                    $em = new \App\Entities\TmAttachment;
                    $em->fill($attachmentData);
                    $model->save($em);
                // }
                $msg = 'Data Telah Terinput';
                $output = ['msg' => @$msg, 'success' => @$sucess, 'returnurl' => base_url('admin/content/acara')];

            }else{
                $error = 'Data Tidak Terinput';
                $output = ['msg' => @$msg, 'error' => @$error, 'success' => @$sucess];

            }

            return $this->response->setStatusCode(200)->setJSON($output);
        }
        $validation->setRules([
            'form.judul' => 'required',
            'form.tanggal_acara' => 'required',
            'form.kota.*' => 'required',
            'form.level' => 'required',
            'form.content' => 'required',
            'attachment.path0' => 'required',
        ],
        [
            'form.judul' => ['required' => 'Field Judul is Required'],
            'form.tanggal_acara' => ['required' => 'Field Tanggal Acara is Required'],
            'form.level' => ['required' => 'Field Level is Required'],
            'form.content' => ['required' => 'Field Content Acara Edukasi is Required'],
            'form.kota.*' => ['required' => 'Field Kota is Required'],
            'form.slug' => ['unique_acara_slug' => 'Link/Slug Acara Edukasi Sudah Pernah Digunakan!'],

            'attachment.path0' => ['required' => 'Gambar Depan File is Required'],

        ]);
        if(!$validation->withRequest($this->request)->run()){
            return $this->response->setStatusCode(200)->setJSON(['sucess' => false,'error' => 'Ada Input Yang Belum Terisi']);
        }
        $data = $this->request->getVar('form');
        $acaraModel = (new \App\Models\TmAcara)->first($id);
        $msg = $data;
        $model = (new \App\Models\TmAcara)->where('id_acara', $id)->first();
        $waktu_acara = $this->request->getVar('time');
        $waktu_acara = implode(':', $waktu_acara);
        $data['tanggal_acara'] = date('Y-m-d H:i',strtotime($data['tanggal_acara'].' '.$waktu_acara));
        unset($data['slug']);
        $model->fill($data);
        $model->tahun = date('Y', strtotime($data['tanggal_acara']));
        $model->bulan = date('m', strtotime($data['tanggal_acara']));
        $model->updated_at = date('Y-m-d H:i:s');

        $sucess = (new TmAcara)->update($id,$model);
        if($sucess == true){
            $msg = $id;
            $modelKota = new \App\Models\TrAcaraKota;
            $modelKota->where('ref_id', $id)->delete();
            foreach($data['kota'] as $k => $v){

                $repoKota = new \App\Entities\TrAcaraKota;
                $repoKota->region_id = $v;
                $repoKota->ref_id = $msg;
                $modelKota->save($repoKota);
            }
            $form = 'acara_edukasi';
            $formData = $this->request->getVar('attachment');
            $model = new \App\Models\TmAttachment;
            $model->where('refid', $id)->like('form', 'acara_edukasi')->delete();
            // for($i = 0; $i <= 1;$i++){
                $i = 0;
                $attachmentData = [
                    'file_path' => $formData['path'.$i],
                    'file_name' => $formData['file_name'.$i],
                    'form' => $form.'_'.$i,
                    'uploaded_at' => date('Y-m-d H:i:s'),
                    'uploaded_by' => session('id') ?? '1',
                    'refid' => $msg
                ]; 
                


                $em = new \App\Entities\TmAttachment;
                $em->fill($attachmentData);
                $model->save($em);
            // }
            $msg = 'Data Telah Terupdate';
            $output = ['msg' => @$msg, 'success' => @$sucess, 'returnurl' => base_url('admin/content/acara')];

        }else{
            $error = 'Data Tidak Terupdate';
            $output = ['msg' => @$msg, 'error' => @$error, 'success' => @$sucess];

        }

        return $this->response->setStatusCode(200)->setJSON($output);
    }


    public function delete($id = null){
        if(empty(session('isLogin'))){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $model = new TmAcara;
        $model->where('id_acara', $id)->delete();

        $modelAttachment = new TmAttachment;
        $modelAttachment = $modelAttachment->where(['refid' => $id])->like('form', 'acara_edukasi_0')->findAll();
        foreach($modelAttachment as $k=>$v){
            (new TmAttachment)->delete($v->id_attachment);
        }

        $output = ['sucess' => true, 'msg' => 'Data Telah Terhapus', 'error' => ''];
        return $this->response->setStatusCode(200)->setJSON($output);

    }
}