<?php 
namespace App\Modules\Dashboard\Controllers;
use App\Controllers\BaseController;
use App\Models\{
    User,
    Customer,
    Subscriber,
    TmArtikel,
    TmAcara
};
class Dashboard extends BaseController{
    public function index(){
        if(empty(session('isLogin'))){
            return redirect()->to(base_url('admin/auth'));
        }
        $arrdata = [
            'title' => "Dashboard",
            'pretitle' => 'Home'
        ];
        $arrdata['count_customer'] = (new Customer)->countAll();
        $arrdata['count_subscribers'] = (new Subscriber)->countAll();
        $totalCountArtikel = (new TmArtikel)->countAll();
        $totalCountAcara = (new TmAcara)->countAll();
        $arrdata['count_content'] = $totalCountArtikel + $totalCountAcara;
        echo view('\App\Modules\Dashboard\Views\index', $arrdata);
    }
}