<?php 
namespace App\Modules\Berita\Controllers;
use App\Controllers\BaseController;
class Berita extends BaseController{
    function index(){
        $arrdata = [];
        if($this->request->isAjax()){
            $arrdata['data'] = [];
            return $this->response->setStatusCode(200)->setJSON($arrdata);
        }
        $arrdata['pretitle'] = 'Konten';
        $arrdata['title'] = 'Daftar Berita';
        // $arrdata['actionbar'] = view('App\Modules\Berita\Views\actionbar');

        $arrdata['table'] = \App\Libraries\Simple_table_builder::run()->generateAjaxTable(explode(';', 'No. ;Cover Berita ;Judul Berita ;Update Terakhir ;Aksi'), base_url('admin/content/berita'));
        echo view('backend/list', $arrdata);
    }
}