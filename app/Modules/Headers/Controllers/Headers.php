<?php
namespace App\Modules\Headers\Controllers;
use App\Controllers\BaseController;
class Headers extends BaseController{

    public function index(){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        helper('form');
        // $arrdata['actionbar'] = view('App\Modules\Acara\Views\actionbar');
        if($this->request->isAjax()){
            $arrdata['data'] = [];
            $model = (new \App\Models\Headers)->where('status', '1')->findAll();
            foreach($model as $k => $v){
                $row = [];
                $row[] = $k+ 1;

                $row[] = '<div style="border:none; overflow: hidden; padding: 0;">
                            <img src="'.$v->src_headers_image.'" alt="" style="max-height: 70px;">
                        </div>';

                $row[] = $v->title;
                $row[] = $v->subtitle;
                $row[] = $v->updated_at->humanize();
                $row[] = view('\App\Modules\Headers\Views\tbl_act', ['id' => $v->id_header]);
                $arrdata['data'][] = $row;
            }
            return $this->response->setStatusCode(200)->setJSON($arrdata);
        }
        $arrdata['pretitle'] = 'Konten';
        $arrdata['title'] = 'Daftar Wallpaper Beranda';
        $arrdata['actionbar'] = view('\App\Modules\Headers\Views\actionbar');

        $heading = [
            ['width' => '1%', 'class' => 'text-center', 'content' => 'No.'],
            ['width' => '20%', 'class' => 'text-left', 'content' => 'Gambar'],
            'Judul', 'Sub Judul', 'Update Terakhir',
            ['width' => '15%', 'class' => 'text-center', 'content' => 'Aksi']
        ];
        $arrdata['table'] = \App\Libraries\Simple_table_builder::run()->generateAjaxCustomTable($heading, base_url('admin/content/headers'));

        // $arrdata['table'] = \App\Libraries\Simple_table_builder::run()->generateAjaxTable(explode(';', 'No. ;Image ;Judul ;Subtitle ;Aksi'), base_url('admin/content/headers'));
        echo view('backend/list', $arrdata);
    }


    public function form($id = null){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [];
        helper('form');
        helper('html');

        $arrdata['pretitle'] = 'Konten';
        $arrdata['title'] = $id == null ? 'Tambah Wallpaper Beranda' : 'Edit Wallpaper Beranda';

        if($id != null){
            $arrdata['data'] = (new \App\Models\Headers)->where('id_header', $id)->first();
            $arrdata['attachment'] = (new \App\Models\TmAttachment)->where(['refid' => $id, 'form' => 'content_headers'])->first();
        }

        // echo json_encode($arrdata['data']); die;

        echo view('\App\Modules\Headers\Views\form', $arrdata);
    }


    public function saveForm($id = '-'){
        $msg = ['sucess' => false, 'msg' => '', 'error' => ''];
        $validation = \Config\Services::validation();

        if($id == '-' || $id == null){
            $validation->setRules([
                'form.status' => 'required',
                'attachment.path' => 'required'
            ],[
                'form.status' => ['required' => 'FIeld Status is Required'],
                'attachment.path' => ['required' => 'Gambar Belum di Upload']
            ]);
            if($validation->withRequest($this->request)->run() == false){
                $msg['error'] = $validation->getErrors();
                return $this->response->setStatusCode(200)->setJSON($msg);
            }
            $repo = new \App\Entities\Headers;
            $em = new \App\Models\Headers;
            $form = $this->request->getVar('form');
            $repo->fill($form);
            $repo->updated_at = date('Y-m-d H:i:s');
            $repo->created_at = date('Y-m-d H:i:s');
            $repo->created_by = session('id') ?? '1';
            $save = $em->save($repo);
            if($save){
                $msg['sucess'] = true;
                $ref = $em->getInsertID();
                $attachment = $this->request->getVar('attachment');
                $data = [
                    'refid' => $ref,
                    'form' => 'content_headers',
                    'file_path' => $attachment['path'],
                    'file_name' => $attachment['file_name'],
                    'uploaded_by' => session('id') ?? '1',
                    'uploaded_at' => date('Y-m-d H:i:s')
                ];
                $attachRepo = new \App\Entities\TmAttachment();
                $attachModel = new \App\Models\TmAttachment();
                $attachRepo->fill($data);
                $attachModel->save($attachRepo);
                $msg['msg'] = 'Data Telah Terinput';
                $msg['returnurl'] = base_url('admin/content/headers');
            }else{
                $msg['error'] = 'Data Tidak Terinput';
            }
            
            return $this->response->setStatusCode(200)->setJSON($msg);
        }


        $validation->setRules([
            'form.status' => 'required',
            'attachment.path' => 'required'
        ],[
            'form.status' => ['required' => 'Field Status is Required'],
            'attachment.path' => ['required' => 'Gambar Belum di Upload']
        ]);

        if($validation->withRequest($this->request)->run() == false){
            $msg['error'] = $validation->getErrors();
            return $this->response->setStatusCode(200)->setJSON($msg);
        }

        $form = $this->request->getVar('form');
        $repo = new \App\Entities\Headers;
        $em = new \App\Models\Headers;
        $repo->fill($form);
        $repo->updated_at = date('Y-m-d H:i:s');
        $save = $em->update($id,$repo);
        if($save){
            $msg['sucess'] = true;
            $attachment = $this->request->getVar('attachment');
            $del = (new \App\Models\TmAttachment)->where('refid', $id)->like('form', 'content_headers')->delete();
            $data = [
                'refid' => $id,
                'form' => 'content_headers',
                'file_path' => $attachment['path'],
                'file_name' => $attachment['file_name'],
                'uploaded_by' => session('id') ?? '1',
                'uploaded_at' => date('Y-m-d H:i:s')
            ];

            $model = new \App\Models\TmAttachment;
            $em = new \App\Entities\TmAttachment;

            $em->fill($data);
            $model->save($em);
            $msg = 'Data Telah Terupdate';
            $output = ['msg' => @$msg, 'success' => @$save, 'returnurl' => base_url('admin/content/headers')];
        }else{
            $error = 'Data Tidak Terupdate';
            $output = ['error' => @$error, 'success' => @$save];       
         }
        return $this->response->setStatusCode(200)->setJSON($output);
    }


    public function delete($id = null){
        (new \App\Models\Headers)->delete($id);
        (new \App\Models\TmAttachment)->where(['refid' => $id, 'form' => 'content_headers'])->delete();
        return $this->response->setStatusCode(200)->setJSON(['sucess' => 'true', 'error' => '', 'msg' => 'Data Telah Terhapus']);
    }
}
