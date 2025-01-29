<?php 
namespace App\Modules\Edukasi\Controllers;

use App\Controllers\BaseController;
use App\Modules\Edukasi\Models\EdukasiModel;
use CodeIgniter\HTTP\UserAgent;
use CodeIgniter\I18n\Time;

class Edukasi extends BaseController{
    function __construct(){
        helper('form');
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }

    function index($kode_edukasi, $referal = null){

        $edukasiModel = new EdukasiModel();
        $edukasi = $edukasiModel->where('kode_edukasi', $kode_edukasi)->first();

        //redirect if code not found
        if(!$edukasi) return redirect()->to(site_url());

        $agent = $this->request->getUserAgent();

        $arrdata = [
            'title' => 'Formulir Registrasi',
            'mobile' =>  $agent->isMobile(),
            'referal' =>  $referal,
            'edukasi' =>  $edukasi,
        ];

        echo view('App\Modules\Edukasi\Views\register_edukasi.php', $arrdata);
    }

    function save(){
        helper('utility_helper');

        $db      = \Config\Database::connect();
        $builder = $db->table('edukasi_pendaftaran');

        $data = [
            'id_edukasi'   => $this->request->getVar('id_edukasi'),
            'nama'         => $this->request->getVar('nama'),
            'email'        => $this->request->getVar('email'),
            'handphone'    => $this->request->getVar('handphone'),
            'client_id'    => $this->request->getVar('client_id'),
            'kode_referal' => $this->request->getVar('kode_referal'),
            'created_at'   => date('Y-m-d H:i:s'),
        ];
        
        $builder->insert($data);

        $edukasi = (new EdukasiModel)->where('id', $this->request->getVar('id_edukasi'))->first();

        $no_telp = $this->request->getVar('handphone');
        // $subst_phone = substr($no_telp,0,1);
        // if($subst_phone == 0){
        //     $no_wa = substr_replace($no_telp,"62",0,1);
        // }else{
        //     $no_wa = substr_replace($no_telp,"",0,1);
        // }
        $no_wa = substr_replace($no_telp,"",0,1);

        $date = date_create($edukasi->tanggal_edukasi);
        $tanggal_edukasi = date_format($date,"d F Y");

        $message = 'Selamat '.$this->request->getVar('nama').', anda telah berhasil mengisi daftar hadir pada acara Edukasi '.$edukasi->nama_edukasi.' pada tanggal '.$tanggal_edukasi.' Pukul '.$edukasi->waktu_acara.'.';

        send_wa($no_wa, $message);

        $agent = $this->request->getUserAgent();

        $arrdata = [
            'title' => 'Formulir Registrasi',
            'mobile' =>  $agent->isMobile(),
            'edukasi' =>  $edukasi,
        ];

        // return redirect()->to($this->request->getVar('edukasi_finish/').);
        echo view('App\Modules\Edukasi\Views\register_edukasi_thankyou.php', $arrdata);
    }
}