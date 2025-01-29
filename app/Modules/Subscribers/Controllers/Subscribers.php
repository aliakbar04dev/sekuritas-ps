<?php 
namespace App\Modules\Subscribers\Controllers;
use App\Controllers\BaseController;
use App\Models\Subscriber;
class Subscribers extends BaseController{

    public function index(){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [];
        helper('html');
        helper('form');
        if($this->request->isAjax()){
            $arrdata['data'] = [];
            $alldata = (new Subscriber)->findAll();
            foreach($alldata as $k => $v){
                $row = [];
                $row[] = $k + 1;
                $row[] = $v->email;
                $row[] = view('App\Modules\Subscribers\Views\table_action', ['data' => $v->id]);
                $arrdata['data'][] = $row;
            }
            return $this->response->setStatusCode(200)->setJSON($arrdata);
        }
        $arrdata['pretitle'] = 'Master Data';
        $arrdata['title'] = 'Daftar Email Subscriber';
        $arrdata['actionbar'] = null;
        $arrdata['table'] = \App\Libraries\Simple_table_builder::run()->generateAjaxTable(explode(';', '<div style="width:98%;">No</div> ;<div style="width:1%;">Email Subscriber</div> ;<div style="width:1%;" class="text-center">Aksi</div>'), base_url('admin/manage/subscribers'));
        echo view('backend/list', $arrdata);
    }


    public function delete($id = null){
        (new Subscriber)->where('id', $id)->delete();
        return $this->response->setStatusCode(200)->setJSON(['msg' => "Data Telah Terhapus", 'sucess' => true, 'error' => '']);
    }
}