<?php 
namespace App\Modules\Frontpage\Controllers;

use App\Controllers\BaseController;
use App\Modules\Frontpage\Models\hubungi_kami;
use CodeIgniter\HTTP\UserAgent;
use CodeIgniter\I18n\Time;

class Frontpage extends BaseController{
    function __construct(){
        helper('form');
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }

    //Beranda
    function index(){
        $agent = $this->request->getUserAgent();

        $arrdata = [
            'title' => 'Beranda',
            'mobile' =>  $agent->isMobile(),
            'daftarGambar' => (new \App\Models\Headers)->where('status', '1')->findAll(),
        ];

        // echo json_encode($arrdata['daftarGambar']); die;

        echo view('App\Modules\Frontpage\Views\beranda', $arrdata);
    }

    //Tentang Kami
    function tentang_kami(){
        $agent = $this->request->getUserAgent();
        $arrdata = [
            'title' => 'Tentang Kami',
            'mobile' =>  $agent->isMobile(),
        ];
        echo view('App\Modules\Frontpage\Views\tentang_kami', $arrdata);
    }

    //Hubungi Kami
    function hubungi_kami(){
        $agent = $this->request->getUserAgent();
        $arrdata = [
            'title' => 'Hubungi Kami',
            'container' => 'fluid-container',
            'mobile' =>  $agent->isMobile(),
        ];

        echo view('App\Modules\Frontpage\Views\hubungi_kami', $arrdata);
    }

    function list_article(){
        $agent = $this->request->getUserAgent();
        $arrdata = [
            'title' => 'Artikel',
            'container' => 'fluid-container',
            'mobile' =>  $agent->isMobile(),
        ];
        $artikelModel = new \App\Models\TmArtikel;
        $form = $this->request->getVar();
        if(!empty($form)){
            $arrdata['var'] = $form;
            $arrdata['list_artikel'] = $artikelModel->like(['judul' => @$form['q']])->orderBy('updated_at', 'desc')->paginate(9, 'btcorona');

        }else{
            $arrdata['list_artikel'] = $artikelModel->orderBy('updated_at', 'desc')->paginate(9, 'btcorona');
        }
        $arrdata['list_artikel_pager']  = $artikelModel->pager;
        echo view('App\Modules\Frontpage\Views\artikel', $arrdata);
    }

    function detail_article($object = '-'){
        $agent = $this->request->getUserAgent();
        $arrdata = [
            'title' => 'Detail Artikel',
            'container' => 'fluid-container',
            'mobile' =>  $agent->isMobile(),
        ];
        $arrdata['content'] = (new \App\Models\TmArtikel)->where('slug', $object)->first();
        $arrdata['artikel_lainnya'] = (new \App\Models\TmArtikel)->where('slug !=', $object)->orderBy('updated_at', 'DESC')->paginate(3);
        echo view('App\Modules\Frontpage\Views\detail_artikel', $arrdata);
    }

    function list_edukasi(){
        $agent = $this->request->getUserAgent();
        $arrdata = [
            'title' => 'Edukasi',
            'container' => 'fluid-container',
            'mobile' =>  $agent->isMobile(),
        ];
        $arrdata['list_bulan'] = (new \App\Models\TmAcara)->monthInd(1);
        $arrdata['list_level'] = (new \App\Models\TmAcara)->levelList(1);
        $arrdata['list_kota'] = (new \App\Models\TmRegion)->where('RIGHT(region_id, 2) !=', '00')->findAll();
        $form = $this->request->getVar();
        if(!empty($form)){
            $form = (object)$form;
            $where = [];
            $whereLike = [];
            if(!empty($form->kota)){
                $this->generateWhereArray($where, 't1.region_id', $form->kota);
            }
            if(!empty($form->bulan)){
                $this->generateWhereArray($where, 'tm_acara.bulan', $form->bulan);
            }
            if(!empty($form->level)){
                $this->generateWhereArray($where, 'tm_acara.level', $form->level);
            }
            if(!empty($form->q)){
                $this->generateWhereArray($whereLike, 'tm_acara.judul', '%'.$form->q.'%');
            }
            $db      = \Config\Database::connect();
            $model = (new \App\Models\TmAcara)->select('tm_acara.*, t1.region_id')->join('tr_acara_kota t1', 'tm_acara.id_acara = t1.ref_id', 'INNER');
            if(count($where) > 0){
                $model = $model->where($where);
            }
            if(count($whereLike) > 0){
                $model = $model->like($whereLike);
            }
            $arrdata['list_acara'] = $model->orderBy('tm_acara.tanggal_acara','desc')->groupBy('tm_acara.id_acara')->paginate(9, 'btcorona');
            $arrdata['pager'] = $model->pager;
            $arrdata['var'] = $form;
        }else{
            $model = new \App\Models\TmAcara;
            $arrdata['list_acara'] = $model->orderBy('tanggal_acara', 'desc')->paginate(9, 'btcorona');
            $arrdata['pager'] = $model->pager;
        }
        
        echo view('App\Modules\Frontpage\Views\edukasi', $arrdata);
    }

    function detail_edukasi($object = '-'){
        $agent = $this->request->getUserAgent();
        $data = [];
        if($object == '-'){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }else{
            $model = (new \App\Models\TmAcara)->where('slug', $object)->first();
            $data = $model;
        }
        $dataLainnya = (new \App\Models\TmAcara)->where('slug !=',$object)->orderBy('updated_at', 'desc')->groupBy('id_acara')->paginate(3);
        $arrdata = [
            'title' => 'Detail Edukasi',
            'container' => 'fluid-container',
            'mobile' =>  $agent->isMobile(),
            'content' => $data,
            'event_lainnya' => $dataLainnya
        ];
        echo view('App\Modules\Frontpage\Views\detail_edukasi', $arrdata);
    }

    function filter_edukasi(){
        $agent = $this->request->getUserAgent();
        
        $arrdata = [
            'title' => 'Cari Edukasi',
            'container' => 'fluid-container',
            'mobile' =>  $agent->isMobile(),
        ];
        $form = $this->request->getVar();
        if(!empty($form)){
            $form = (object)$form;
            $where = [];
            $whereLike = [];
            if(!empty($form->kota)){
                $this->generateWhereArray($where, 't1.region_id', $form->kota);
            }
            if(!empty($form->bulan)){
                $this->generateWhereArray($where, 'tm_acara.bulan', $form->bulan);
            }
            if(!empty($form->level)){
                $this->generateWhereArray($where, 'tm_acara.level', $form->level);
            }
            if(!empty($form->q)){
                $this->generateWhereArray($whereLike, 'tm_acara.judul', '%'.$form->q.'%');
            }
            $db      = \Config\Database::connect();
            $model = (new \App\Models\TmAcara)->select('tm_acara.*, t1.region_id')->join('tr_acara_kota t1', 'tm_acara.id_acara = t1.ref_id', 'INNER');
            if(count($where) > 0){
                $model = $model->where($where);
            }
            if(count($whereLike) > 0){
                $model = $model->like($whereLike);
            }
            $arrdata['list_edukasi'] = $model->orderBy('tm_acara.tanggal_acara','desc')->groupBy('tm_acara.id_acara')->paginate(25);
            $arrdata['list_edukasi_pager'] = $model->pager;
        }else{
            $model = new \App\Models\TmAcara;
            $arrdata['list_edukasi'] = $model->orderBy('tm_acara.tanggal_acara','desc')->groupBy('tm_acara.id_acara')->paginate(25);
            $arrdata['list_edukasi_pager'] = $model->pager;

        }
        echo view('App\Modules\Frontpage\Views\filter_edukasi', $arrdata);
    }
    function generateWhereArray(&$array, $key, $data){
        $array[$key] = $data;
    }

    function list_berita(){
        $agent = $this->request->getUserAgent();
        $beritaModel = new \App\Models\TmBerita;

        $form = $this->request->getVar();
        $var = $form;
        if(!empty($form)){
            $beritaAll = $beritaModel->like(['Headline' => @$form['q']])->orderBy('_Time', 'desc')->paginate(9, 'btcorona');

        }else{
            $beritaAll = $beritaModel->orderBy('_Date', 'desc')->orderBy('_Time', 'desc')->paginate(9, 'btcorona');
        }

        $beritaPager  = $beritaModel->pager;
        // dd($beritaAll);
        $arrdata = [
            'title' => 'Berita',
            'container' => 'fluid-container',
            'beritaAll' => $beritaAll,
            'beritaPager' => $beritaPager,
            'var' => $var,
            'mobile' =>  $agent->isMobile(),
        ];
        echo view('App\Modules\Frontpage\Views\berita', $arrdata);
    }

    function detail_berita($object = '-'){
        $agent = $this->request->getUserAgent();
        $data = [];
        if($object == '-'){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }else{
            $model = (new \App\Models\TmBerita)->where('_ID', $object)->first();
            $data = $model;
        }
        $dataLainnya = (new \App\Models\TmBerita)->where('_ID !=',$object)->orderBy('_Date', 'desc')->orderBy('_Time', 'desc')->paginate(3);

        // dd($data);

        $days = array('Minggu', 'Senin', 'Selasa', 'Rabu','Kamis','Jum\'at', 'Sabtu');
        $date = date('w', strtotime($data['_Date']));

        $arrdata = [
            'title' => 'Detail Berita',
            'container' => 'fluid-container',
            'content' => $data,
            'content_lainnya' => $dataLainnya,
            'hari' => $days[$date],
            'mobile' =>  $agent->isMobile(),
        ];
        echo view('App\Modules\Frontpage\Views\detail_berita_ali', $arrdata);
    }

    function registrasi($referal_id = null){
        $agent = $this->request->getUserAgent();
        $arrdata = [];
        $arrdata['title'] = 'Registrasi';
        $arrdata['mobile'] = $agent->isMobile();
        $arrdata['referal_id'] = '';
        if($referal_id != null){
            $arrdata['referal_id'] = $referal_id;
        }
        
        echo view('App\Modules\Frontpage\Views\registrasi', $arrdata);
    }

    function registrasi_user(){
        $arrdata = [
            'sucess' => false,
        ];
        
        $validation = \Config\Services::validation();
        $validation->setRules([
            'full_name' => ['label' => "Nama", 'rules' => 'trim|required'],
            'email' => ['label' => 'Alamat Email', 'rules' => 'trim|required|valid_email'],
            'no_wa' => ['label' => 'No. Handphone', 'rules' => 'trim|required|max_length[13]'],
            'region_id' => ['label' => 'Kota', 'rules' => 'trim|required']
        ]);
        if($validation->withRequest($this->request)->run() == false){
           $arrdata['error'] = $validation->getErrors();
        }else{
           $form = $this->request->getVar();
           unset($form['cms_token']);
           unset($form['g-recaptcha-response']);
           unset($form['provinsi']);
           if(isset($form['referal_submit'])){
            $data = $form['referal_submit'];
            $getIdReferal = (new \App\Models\Customer)->getReferal($form);
           }
           (new \App\Models\Customer)->generateReferalId($form);
            $form['created_on'] = date('Y-m-d H:i:s');
           $save = $this->db->table('members')->insert($form);
           if($save){
               $arrdata['sucess'] = true;
               $arrdata['msg'] = 'Berhasil Menyimpan Data !';
               $arrdata['returnurl'] = 'https://regcarmel.most.co.id';
           }
        }
        return $this->response->setStatusCode(200)->setJSON($arrdata);
    }

    function save_hubungi(){
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => ['label' => 'Nama', 'rules' => 'trim|required'],
            'email' => ['label' => 'Email', 'rules' => 'trim|required|valid_email'],
            'subjek' => ['label' => 'Subjek', 'rules' => 'trim|required'],
            'pesan' => ['label' => 'Pesan', 'rules' => 'trim|required']
        ]);
        if($validation->withRequest($this->request)->run() == false){
            return $this->response->setStatusCode(200)->setJSON([
                'sucess' => false,
                'error' => $validation->getErrors()
            ]);
        }
        $form = $this->request->getVar();
        unset($form['cms_token']);
        $form['created_at'] = date('Y-m-d H:i:s');
        $hubungi_kami = new hubungi_kami();
        $save = $hubungi_kami->insert($form);
        if($hubungi_kami->affectedRows() < 1){
            return $this->response->setStatusCode(200)->setJSON(['sucess' => false]);
        }
        return $this->response->setStatusCode(200)->setJSON(['sucess' => true, 'msg' => 'Berhasil Mengirim Pesan', 'returnurl' => base_url('hubungi_kami')]);
    }

    function save_subscriber(){
        $validation = \Config\Services::validation();
        $validation->setRules(
            [
                'email' => [
                    'label' => 'Email', 
                    'rules' => 'trim|required|valid_email|unique_subscriber_address[email]'
                ],
            ],
            [
                'email' => [
                    'unique_subscriber_address' => 'Email Sudah Terdaftar Sebagai Subscriber', 
                    'required' => 'Masukan Alamat Email Anda'
                ]
            ]);
        if($validation->withRequest($this->request)->run() == false){
            return $this->response->setStatusCode(200)->setJSON([
                'sucess' => false,
                'error' => 'Email Belum Dimasukan/Email Sudah Terdaftar'
            ]);
        }
        $form = $this->request->getVar();
        $repo = new \App\Entities\Subscriber;
        $model = new \App\Models\Subscriber;
        $repo->fill($form);
        $save = $model->save($repo);
        if($save){
            return $this->response->setStatusCode(200)->setJSON([
                'sucess' => true,
                'error' => '',
                'returnurl' => base_url(),
                'msg' => 'Terima Kasih, Anda Telah Ditambahkan Sebagai Subscriber'
            ]);
        }else{
            return $this->response->setStatusCode(200)->setJSON([
                'sucess' => false,
                'error' => 'Email Sudah Ada',
                'msg' => 'Email Sudah Ada'
            ]);
        }
    }

    function saveRegion(){
        $form = $this->request->getVar();
        $em = new \App\Models\TmRegion;
        $repo = new \App\Entities\TmRegion;
        $repo->fill($form);
        $save = $em->save($repo);
        return $this->response->setStatusCode(200)->setJSON(['mg' => 'aw!', 'save'=>$save]);
    }
}