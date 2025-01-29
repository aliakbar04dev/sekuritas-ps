<?php 
namespace App\Modules\Articles\Controllers;
use App\Controllers\BaseController;
use App\Models\TmArtikel;
use App\Models\TmAttachment;
use App\Entities\TmArtikel as ArtikelRepo;
class Articles extends BaseController{

    function index(){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [];
        helper('html');
        helper('form');
        if($this->request->isAjax()){
            $arrdata['data'] = [];
            $getData = (new TmArtikel)->orderBy('updated_at','desc')->findAll();
            foreach($getData as $k => $v){
                $row = [];
                $row[] = $k +1;
                // $row[] = '<img src="'.$v->src_thumbnail.'" width="100%" alt="">';
                $row[] = '<div style="border:none; overflow: hidden; padding: 0;">
                            <img src="'.$v->src_thumbnail.'" alt="" style="max-height: 70px;">
                        </div>';
                $row[] = $v->judul;
                // $row[] = anchor(base_url('detailartikel/'.$v->slug), '<i class="la la-link"></i>Menuju Link Detail Artikel', ['class' => 'btn btn-sm btn-link']);
                // $row[] = $v->author;
                $row[] = $v->updated_at->humanize();
                $row[] = view('App\Modules\Articles\Views\table_action', ['id' => $v->id_artikel]);
                $arrdata['data'][] = $row;
            }
            return $this->response->setStatusCode(200)->setJSON($arrdata);
        }
        $heading = [
            ['width' => '1%', 'class' => 'text-center', 'content' => 'No.'],
            'Cover Artikel' ,'Judul Artikel' ,'Update Terakhir',
            ['width' => '15%', 'class' => 'text-center', 'content' => 'Aksi']
        ];
        $arrdata['table'] = \App\Libraries\Simple_table_builder::run()->generateAjaxCustomTable($heading, base_url('admin/content/articles'));
        // $arrdata['table'] = \App\Libraries\Simple_table_builder::run()->generateAjaxTable(explode(';', 'No. ;Cover ;Judul Article ;Last Update ;<div class="text-center">Aksi </div>'), base_url('admin/content/articles'));
        $arrdata['pretitle'] = 'Konten';
        $arrdata['title'] = 'Daftar Artikel';
        $arrdata['actionbar'] = view('App\Modules\Articles\Views\actionbar');
        echo view('backend/list', $arrdata);
    }


    function form($id = null){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [];
        helper('form');
        if($id != null){
            $arrdata['data'] = (new TmArtikel)->where('id_artikel', $id)->first();
            $arrdata['attachment'] = (new \App\Models\TmAttachment)->where('refid', $id)->like('form', 'artikel')->first();
        }

        // echo json_encode($arrdata['data']); die;

        $arrdata['pretitle'] = 'Content';
        $arrdata['title'] = $id == null ? 'Tambah Artikel' : 'Edit Artikel';
        echo view('App\Modules\Articles\Views\form', $arrdata);
        return;
    }


    function saveForm($id = '-'){
        if(empty(session('isLogin'))){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $validation = \Config\Services::validation();

        if($id == '-' || $id == null){
            $validation->setRules([
                'form.judul' => 'required',
                'form.slug' => 'required|unique_artikel_slug[form.slug]',
                'form.kategori' => 'required',
                'form.content' => 'required',
                'attachment.path' => 'required',
            ],
            [
                'form.judul' => ['required' => 'Field Judul is Required'],
                'form.kategori' => ['required' => 'Field Kategori is Required'],
                'form.content' => ['required' => 'Field Content Artikel is Required'],
                'form.slug' => ['required' => 'Field Slug is Required','unique_artikel_slug' => 'Link/Slug Artikel Sudah Pernah Digunakan!'],
                'attachment.path' => ['required' => 'Thumbnail File is Required'],

            ]);

            if(!$validation->withRequest($this->request)->run()){
                return $this->response->setStatusCode(200)->setJSON(['sucess' => false,'error' => 'Ada Input Yang Belum Terisi']);
            }

            $data = $this->request->getVar('form');

            // echo json_encode($data); die;

            $model = new TmArtikel();
            $repo = new ArtikelRepo();
            $repo->fill($data);
            $repo->created_at = date('Y-m-d H:i:s');
            $repo->updated_at = date('Y-m-d H:i:s');
            $repo->created_by = session('id') ?? '1';
            $sucess = $model->save($repo);
            if($sucess){
                $idInsert = $model->getInsertID();
                $attachRequest = $this->request->getVar('attachment');

                $attach = [
                    'refid' => $idInsert,
                    'file_path' => $attachRequest['path'],
                    'file_name' => $attachRequest['file_name'], 
                    'form' => 'artikel_0',
                    'uploaded_by' => session('id') ?? '1',
                    'uploaded_at' => date('Y-m-d H:i:s')
                ];
                $model = new \App\Models\TmAttachment;
                $em = new \App\Entities\TmAttachment;
                $em->fill($attach);
                $model->save($em);
                $msg = 'Data Telah Terinput';
                $output = ['msg' => @$msg, 'success' => @$sucess, 'returnurl' => base_url('admin/content/articles')];
            }else{
                $error = 'Data Tidak Terinput';
                $output = ['error' => @$error, 'success' => @$sucess];
            }
            return $this->response->setStatusCode(200)->setJSON($output);

        }

        $validation->setRules([
            'form.judul' => 'required',
            'form.kategori' => 'required',
            'form.content' => 'required',

            'attachment.path' => 'required',
        ],
        [
            'form.judul' => ['required' => 'Field Judul is Required'],
            'form.kategori' => ['required' => 'Field Kategori is Required'],
            'form.content' => ['required' => 'Field Content Artikel is Required'],

            'attachment.path' => ['required' => 'Thumbnail File is Required'],

        ]);
        if(!$validation->withRequest($this->request)->run()){
            return $this->response->setStatusCode(200)->setJSON(['sucess' => false,'error' => 'Ada Input Yang Belum Terisi']);
        }
        $data = $this->request->getVar('form');
        $model = new TmArtikel();
        $repo = new ArtikelRepo();
        unset($data['slug']);
        $repo->fill($data);
        $repo->updated_at = date('Y-m-d H:i:s');
        $sucess = $model->update($id,$repo);
        if($sucess){
            // $id = $model->getInsertID();
            $attachRequest = $this->request->getVar('attachment');
            $del = (new \App\Models\TmAttachment)->where('refid', $id)->like('form', 'artikel')->delete();
            $attach = [
                'refid' => $id,
                'file_path' => $attachRequest['path'],
                'file_name' => $attachRequest['file_name'], 
                'form' => 'artikel_0',
                'uploaded_by' => session('id') ?? '1',
                'uploaded_at' => date('Y-m-d H:i:s')
            ];

            $model = new \App\Models\TmAttachment;
            $em = new \App\Entities\TmAttachment;

            $em->fill($attach);
            $model->save($em);
            $msg = 'Data Telah Terupdate';
            $output = ['msg' => @$msg, 'success' => @$sucess, 'returnurl' => base_url('admin/content/articles')];
        }else{
            $error = 'Data Tidak Terupdate';
            $output = ['error' => @$error, 'success' => @$sucess];
        }
        return $this->response->setStatusCode(200)->setJSON($output);
    }


    function delete($id = null){
        if(empty(session('isLogin'))){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $model = new TmArtikel;
        $model->where('id_artikel', $id)->delete();

        $modelAttachment = new TmAttachment;
        $modelAttachment = $modelAttachment->where(['refid' => $id])->like('form', 'artikel_0')->findAll();
        foreach($modelAttachment as $k=>$v){
            (new TmAttachment)->delete($v->id_attachment);
        }

        $output = ['sucess' => true, 'msg' => 'Data Telah Terhapus', 'error' => ''];
        return $this->response->setStatusCode(200)->setJSON($output);
    }
}