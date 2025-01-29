<?php 
    namespace App\Modules\Authentication\Controllers;
    use Config\Services;
    use App\Controllers\BaseController;
    use App\Modules\Users\Models\Users_model;

    class Authentication extends BaseController{
        public function __construct(){
            $this->model = new Users_model();
            $this->request = \Config\Services::request();
        }

        public function index(){
            helper('form');
            $agent = $this->request->getUserAgent();
            $arrdata = [
                'title' => 'Masuk',
                'mobile' =>  $agent->isMobile(),
            ];
            echo view('App\Modules\Authentication\Views\login', $arrdata);
            return;
        }

        public function login_attempt(){
            $validator = Services::validation();
            $validator->setRules([
                'username' => ['rules' => 'required|trim','label' => 'username'],
                'password' => ['rules' => 'required|trim', 'label' => 'password']
            ]);
            $validation = $validator->withRequest($this->request)->run();
            $msg = ['sucess' => false];
            if($validation){
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');
                $query = $this->model->where('username', $username)->orWhere('email', $username)->get();
                if($query->getNumRows() > 0){
                    $user = $query->getRowArray();
                    if(password_verify($password, $user['password'])){
                        $loginData['login_key'] = md5(time().$user['id']);
                        $tz = new \DateTimeZone('Asia/Jakarta');
                        $date = new \DateTime(null,$tz);
                        $date->modify('+8 hours');
                        $loginData['login_expired'] = $date->format('Y-m-d H:i:s');
                        $this->model->update($user['id'], $loginData);
                        $msg['sucess'] = 'Selamat, Kamu Berhasil Masuk';
                        session()->set('isLogin', true);
                        session()->set($user);
                        $msg['returnurl'] = base_url('admin/dashboard');
                    }else{
                        $msg['error'] = 'Password Salah';
                    }
                }else{
                    $msg['error'] = 'Username Salah';
                }
            }else{
                $msg['error'] = 'Tidak Boleh Kosong';
            }
            return $this->response->setStatusCode(200)->setJSON($msg);
        }
        public function logout_attempt(){
            session()->destroy();
            return redirect()->to(base_url('admin/auth'));
        }
    }