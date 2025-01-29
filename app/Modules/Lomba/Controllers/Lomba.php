<?php 
namespace App\Modules\Lomba\Controllers;

use App\Controllers\BaseController;
use App\Modules\Lomba\Models\LombaModel;
use CodeIgniter\HTTP\UserAgent;
use CodeIgniter\I18n\Time;

class Lomba extends BaseController{
    function __construct(){
        helper('form');
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }

    function index(){
        $agent = $this->request->getUserAgent();

        $session = session();

        $step = ($session->step) ? $session->step : '2';

        $arrdata = [
            'title' => 'PanenSaham Online Trading Competition 2022',
            'mobile' =>  $agent->isMobile(),
            'step' =>  $step,
        ];

        echo view('App\Modules\Lomba\Views\register_lomba.php', $arrdata);
    }

    function cekid(){
        $id = $this->request->getVar('client_id');
        $url = "https://cac-advisory.com/api/cek_komunitas";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
        "Content-Type: application/x-www-form-urlencoded",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $data = "client_id=".$id;

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        // var_dump($resp);

        return json_encode(array(
			"data" => json_decode($resp),
			"token" => csrf_hash(),
		));
    }

    function cek_harga(){
        $data = $this->request->getVar();

        $currentDate = date('Y-m-d');
        $currentDate = date('Y-m-d', strtotime($currentDate));
        
        $startDate = date('Y-m-d', strtotime("10/17/2022"));
        $endDate = date('Y-m-d', strtotime("12/26/2022"));

        $nsb = $data['client_id'];
        $bt = $data['bersama_teman'];
        
        $cart = array();
        $total = 0;
        $uniq = sprintf('%03d', rand(0,999));
        
        if (($currentDate >= $startDate) && ($currentDate <= $endDate)){

            if($nsb == '' && $bt == 'Tidak'){
                $total += 100000;
                array_push($cart,"Early Bird - Rp. 100.000");
            }
            else if($nsb == '' && $bt == 'Ya'){
                $total += 90000;
                array_push($cart,"Early Bird - Rp. 90.000");
            }
            else if($nsb != '' && $bt == 'Tidak'){
                $total += 50000;
                array_push($cart,"Early Bird - Rp. 50.000");
            }
            else if($nsb != '' && $bt == 'Ya'){
                $total += 40000;
                array_push($cart,"Early Bird - Rp. 40.000");
            }

            if($bt == 'Ya'){
                foreach ($data['teman'] as $teman) {
                    if($teman['nasabah'] == 'Ya' && $teman['client_id'] != ''){
                        $total += 40000;
                        array_push($cart,"Early Bird - Rp. 40.000");
                    }
                    else if($teman['nasabah'] == 'Tidak'){
                        $total += 90000;
                        array_push($cart,"Early Bird - Rp. 90.000");
                    } 
                }
            }
            
        }else{
            if($nsb == '' && $bt == 'Tidak'){
                $total += 150000;
                array_push($cart,"Reguler - Rp. 150.000");
            }
            else if($nsb == '' && $bt == 'Ya'){
                $total += 135000;
                array_push($cart,"Reguler - Rp. 135.000");
            }
            else if($nsb != '' && $bt == 'Tidak'){
                $total += 75000;
                array_push($cart,"Reguler - Rp. 75.000");
            }
            else if($nsb != '' && $bt == 'Ya'){
                $total += 60000;
                array_push($cart,"Reguler - Rp. 60.000");
            }

            if($bt == 'Ya'){
                foreach ($data['teman'] as $teman) {
                    if($teman['nasabah'] == 'Ya' && $teman['client_id'] != ''){
                        $total += 60000;
                        array_push($cart,"Reguler - Rp. 60.000");
                    }
                    else if($teman['nasabah'] == 'Tidak'){
                        $total += 135000;
                        array_push($cart,"Reguler - Rp. 135.000");
                    } 
                }
            }
        }

        return json_encode(array(
			"data" => $data,
			"cart" => $cart,
			"total" => $total,
			"grand" => $total+$uniq,
			"grand_text" => "Rp " . number_format($total+$uniq,0,',','.'),
			"token" => csrf_hash(),
		));
    }

    function save(){
        // print_r($_POST);

        $lombaModel = new LombaModel();

        $teman = $this->request->getVar('teman');
        $bersama_teman = $this->request->getVar('bersama_teman');

        $total_peserta =  ($bersama_teman == 'Ya') ? count($teman) + 1 : 1;

        $lombaModel->insert([
            'cabang'           => $this->request->getVar('cabang'),
            'nama'             => $this->request->getVar('nama'),
            // 'telepon'          => $this->request->getVar('telepon'),
            // 'email'            => $this->request->getVar('email'),
            // 'nasabah'          => $this->request->getVar('nasabah'),
            // 'client_id'        => $this->request->getVar('client_id'),
            'bersama_teman'    => $this->request->getVar('bersama_teman'),
            'total_peserta'    => $total_peserta,
            'total_pembayaran' => $this->request->getVar('total_value'),
            'created_at'       => date('Y-m-d H:i:s'),
        ]);

        $id_lomba = $lombaModel->getInsertID();

        //save detail
        $db      = \Config\Database::connect();
        $builder = $db->table('daftar_lomba_detail');

        $data = [
            'id_lomba'  => $id_lomba,
            'nama'      => $this->request->getVar('nama'),
            'email'     => $this->request->getVar('email'),
            'client_id' => $this->request->getVar('client_id'),
            'nasabah'   => $this->request->getVar('nasabah'),
            'telepon'   => $this->request->getVar('telepon'),
        ];
        $builder->insert($data);

        //save teman
        if($bersama_teman == 'Ya'){
            //insert detail
            $db      = \Config\Database::connect();
            $builder = $db->table('daftar_lomba_detail');

            foreach ($teman as $tm) {
                $data_teman = [
                    'id_lomba'  => $id_lomba,
                    'nama'      => $tm['nama'],
                    'email'     => $tm['email'],
                    'client_id' => $tm['client_id'],
                    'nasabah'   => $tm['nasabah'],
                    'telepon'   => $tm['telepon'],
                ];
                
                $builder->insert($data_teman);
            }
        }

        //create session
        $data_save = [
            'grand_text'      => "Rp " . number_format($this->request->getVar('total_value'),0,',','.'),
        ];
        $session = session();
        $session->set($data_save);

        return redirect()->to('/lomba/selamat');
    }

    function selamat(){
        $agent = $this->request->getUserAgent();

        $session = session();

        $arrdata = [
            'title' => 'PanenSaham Online Trading Competition 2022',
            'mobile' =>  $agent->isMobile(),
            'grand_text'   => $session->get('grand_text'),
        ];

        echo view('App\Modules\Lomba\Views\selamat.php', $arrdata);
    }

    function konfirmasi(){
        $agent = $this->request->getUserAgent();

        $session = session();

        $arrdata = [
            'title' => 'PanenSaham Online Trading Competition 2022',
            'mobile' =>  $agent->isMobile(),
        ];

        echo view('App\Modules\Lomba\Views\konfirmasi.php', $arrdata);
    }

    function konfirm_save(){
        // print_r($_POST);

        helper('utility_helper');

        $db      = \Config\Database::connect();
        $builder = $db->table('daftar_lomba_konfirm');

        // $validated = $this->validate([
        //     'bukti_pembayaran' => [
        //         'uploaded[bukti_pembayaran]',
        //         'is_image[bukti_pembayaran]',
        //         'max_size[bukti_pembayaran,1500]'
        //     ],
        // ]);
        $validated = true;

        if (!$validated) {
            session()->setFlashdata('error', "Bukti Pembayaran harus jpeg/jpg/png dan ukuran max 1MB");
            return redirect()->back()->withInput();
        }else{

            $userIp=$this->request->getIPAddress();
            // $captcha = check_recaptcha($userIp, trim($this->request->getVar('g-recaptcha-response')));
            $captcha = 1;

            if($captcha){
                $path = "/uploads/konfirmasi"; 
                $writePath = WRITEPATH.$path;

                $image = $this->request->getFile('bukti_pembayaran');
                // print_r($image);

                if(!empty($_FILES['bukti_pembayaran']['name'])){
                    $image->move($writePath);
                    $bukti_pembayaran = $image->getName();
                }else{
                    $bukti_pembayaran = "";
                }
                
        
                // $info = \Config\Services::image()
                //     ->withFile($writePath.'/'.$bukti_pembayaran)
                //     ->getFile()
                //     ->getProperties(true);
        
                // if($info['width'] > 1920 || $info['height'] > 1080){
                //     \Config\Services::image()
                //     ->withFile($writePath.'/'.$bukti_pembayaran)
                //     ->resize(1920, 1080, true, 'width')
                //     ->save($writePath.'/'.$bukti_pembayaran, 95);
                // }
        
                $data = [
                    'nama'               => $this->request->getVar('nama'),
                    'email'              => $this->request->getVar('email'),
                    'tanggal_pembayaran' => $this->request->getVar('tanggal_pembayaran'),
                    'bank'               => $this->request->getVar('bank'),
                    'nama_rekening'      => $this->request->getVar('nama_rekening'),
                    'nomor_rekening'     => $this->request->getVar('nomor_rekening'),
                    'jumlah_bayar'       => $this->request->getVar('jumlah_bayar'),
                    'bukti_pembayaran'   => $bukti_pembayaran,
                    'created_at'         => date('Y-m-d H:i:s'),
                ];
                
                $builder->insert($data);

                $session = session();
                $session->set($data);
    
                return redirect()->to('/lomba/finish');
            }else{
                session()->setFlashdata('error', 'Google Recaptcha tidak Valid');
                return redirect()->back()->withInput();
            }
        }
    }

    function finish(){
        $agent = $this->request->getUserAgent();

        $session = session();

        $arrdata = [
            'title'  => 'PanenSaham Online Trading Competition 2022',
            'mobile' => $agent->isMobile(),
            'data'   => $session->get(),
        ];

        echo view('App\Modules\Lomba\Views\finish.php', $arrdata);
    }
}