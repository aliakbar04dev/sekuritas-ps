<?php 
namespace App\Modules\Users\Controllers;
use App\Controllers\BaseController;
use App\Modules\Users\Models\Users_model;
class Users extends BaseController{
    function __construct(){
        helper('form');
        $this->model = new Users_model;
    }
    public function index(){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [];
        if($this->request->isAjax()){
            $arrdata['data'] = [];
            $getData = $this->model->findAll();
            
            foreach($getData as $k => $v){
                $row = [];
                $row[] = (int)$k + 1;
                $row[] = $v['username'];
                $row[] = $v['email'];
                $row[] = view('App\Modules\Users\Views\datatable_helper\user_detail', $v);
                $row[] = view('App\Modules\Users\Views\datatable_helper\datatable_action', $v);
                $arrdata['data'][] = $row;
            }
            return $this->response->setStatusCode(200)->setJSON($arrdata);
        }
        $heading = [
            ['width' => '1%', 'class' => 'text-center', 'content' => 'No.'],
            'Username', 'Email', 'Detail', 
            ['width' => '15%', 'class' => 'text-center', 'content' => 'Aksi']
        ];
        $arrdata['table'] = \App\Libraries\Simple_table_builder::run()->generateAjaxCustomTable($heading, base_url('admin/manage/users'));
        $arrdata['title'] = "Daftar User Admin";
        $arrdata['pretitle'] = "Master Data";
        $arrdata['actionbar'] = view('App\Modules\Users\Views\actionbar_listview');
        echo view('backend/list', $arrdata);
    }


    public function form(string $id = null){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [];
        $arrdata['roles'] = $this->model->getRole(1);
        if($id == null){
            $arrdata['title'] = 'Tambah User Admin';
            $arrdata['pretitle'] = 'Master Data';
            // $arrdata['actionbar'] = view('App\Modules\Users\Views\tombol_back');
            $arrdata['actionbar'] = null;
            echo view('App\Modules\Users\Views\form', $arrdata);
            return ;
        }

        $arrdata = $this->model->find($id);
        $arrdata['roles'] = $this->model->getRole(1);

        $arrdata['pretitle'] = 'Master Data';
        $arrdata['title'] = 'Edit User Admin';
        $arrdata['actionbar'] = null;
        echo view('App\Modules\Users\Views\form', $arrdata);
        return ;
    }


    public function save($id = '-'){
        if(empty(session('isLogin'))){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data = $this->request->getPostGet('form');
        $validation = \Config\Services::validation();
        $msg = '';
        $error = '';
        if($id != '-'){
            $input = $validation->setRules([
                'form.username' => ['label' => 'username', 'rules' => 'trim|required|min_length[5]'],
                'form.password' => ['label' => 'password', 'rules' => 'trim'],
                'form.email' => ['label' => 'email', 'rules' => 'trim|required|valid_email'],
                'form.name' => ['label' => 'name', 'rules' => 'trim|required'],
                'form.confirm_password' => ['label' => 'confirm password', 'rules' => 'trim|matches[form.password]'],
                'form.tempat_lahir' => ['label' => 'tempat lahir', 'rules' => 'trim|required'],
                'form.tanggal_lahir' => ['label' => 'tanggal lahir', 'rules' => 'trim|required|valid_date[Y-m-d]'],
                'form.alamat' => ['label' => 'alamat', 'rules' => 'trim|required'],
                'form.status' => ['label' => 'name', 'rules' => 'trim|required'],
                'form.jenis_kelamin' => ['label' => 'jenis kelamin', 'rules' => 'trim|required'],
    
            ]);
            if($validation->withRequest($this->request)->run() == false){
                $data = [
                    'sucess' => false,
                    'error' => $validation->getErrors(),
                    'msg' => ''
                ];
            }else{
                $form =  $this->request->getVar('form');
                if(!empty($form['password'])){
                    $form['password'] = password_hash($form['password'], PASSWORD_BCRYPT);
                }else{
                    unset($form['password']);
                }
                $save = $this->model->update($id,$form);
                
                if($save){
                    $save = true;
                    $msg = "Data Berhasil diupdate";
                    $returnurl = base_url('admin/manage/users');
                }else{
                    $save = false;
                    $error = "Data Gagal diupdate";
                    $returnurl = '';
                }
                $data = [
                    'sucess' => $save,
                    'error' => $error,
                    'msg' => $msg,
                    'returnurl' => $returnurl
                ];
                return $this->response->setStatusCode(200)->setJSON($data);
            }
        }
        $input = $validation->setRules([
            'form.username' => ['label' => 'username', 'rules' => 'trim|required|min_length[5]'],
            'form.password' => ['label' => 'password', 'rules' => 'trim|required|min_length[5]'],
            'form.email' => ['label' => 'email', 'rules' => 'trim|required|valid_email'],
            'form.name' => ['label' => 'name', 'rules' => 'trim|required'],
            'form.confirm_password' => ['label' => 'confirm password', 'rules' => 'trim|required|matches[form.password]'],
            'form.tempat_lahir' => ['label' => 'tempat lahir', 'rules' => 'trim|required'],
            'form.tanggal_lahir' => ['label' => 'tanggal lahir', 'rules' => 'trim|required|valid_date[Y-m-d]'],
            'form.alamat' => ['label' => 'alamat', 'rules' => 'trim|required'],
            'form.status' => ['label' => 'name', 'rules' => 'trim|required'],
            'form.jenis_kelamin' => ['label' => 'jenis kelamin', 'rules' => 'trim|required'],

        ]);
        if($validation->withRequest($this->request)->run() == false){
            $data = [
                'sucess' => false,
                'error' => $validation->getErrors(),
                'msg' => ''
            ];
        }else{
            $form =  $this->request->getVar('form');
            $form['password'] = password_hash($form['password'], PASSWORD_BCRYPT);
            $form['created_date'] = date('Y-m-d H:i:s');
            $count = $this->model->where('username', $form['username'])->get()->getNumRows();
            if($count > 0){
                return $this->response->setStatusCode(200)->setJSON(['sucess' => false, 'error' => (object)['form.username' => 'Username Already Used By Another User!']]);
            }
            $count = $this->model->where('email', $form['email'])->get()->getNumRows();
            if($count > 0){
                return $this->response->setStatusCode(200)->setJSON(['sucess' => false, 'error' => (object)['form.email' => 'Email Already Used By Another User!']]);
            }
            $save = $this->model->insert($form);
            
            if($this->model->affectedRows() > 0){
                $save = true;
                $msg = "Data Telah Terinput";
                $returnurl = base_url('admin/manage/users');
            }else{
                $save = false;
                $error = 'Gagal Save Data ke Database';
                $returnurl = '';
            }
            $data = [
                'sucess' => $save,
                'error' => $error,
                'msg' => $msg,
                'returnurl' => $returnurl
            ];
        }
        return $this->response->setStatusCode(200)->setJSON($data);
    }


    public function index_role(){
        $arrdata = [];
        if($this->request->isAjax()){
            $arrdata['data'] = [];
            return $this->response->setStatusCode(200)->setJSON($arrdata);
        }
        $arrdata['table'] = \App\Libraries\Simple_table_builder::run()->generateAjaxTable(explode('#', 'No.#Nama Role#Aksi'),base_url('admin/manage/roles'));
        $arrdata['title'] = "Roles";
        $arrdata['pretitle'] = "Master Data";
        $arrdata['actionbar'] = view('App\Modules\Users\Views\actionbar_role_listview');
        echo view('backend/list', $arrdata);
    }

    
    public function role_form(string $id = null){
        $arrdata = [];
        if($id == null){
            $arrdata['pretitle'] = 'Tambah Data';
            $arrdata['title'] = 'Master Role';
            echo view('App\Modules\Users\Views\form_role', $arrdata);
            return ;
        }
    }


    public function delete_user(){
        if(empty(session('isLogin'))){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $form = $this->request->getVar('form');
        $save = $this->model->where('id', $form['id'])->delete();
        if($save){
            return $this->response->setStatusCode(200)->setJSON(['sucess' => true, 'msg' => "Berhasil Melakukan Hapus Data !"]);
        }else{
            return $this->response->setStatusCode(200)->setJSON(['sucess' => false, 'error' => "Gagal Melakukan Hapus Data !"]);
        }
    }
}