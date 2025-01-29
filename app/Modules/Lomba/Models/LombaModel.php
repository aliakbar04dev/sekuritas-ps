<?php
namespace App\Modules\Lomba\Models;

use CodeIgniter\Model;

class LombaModel extends Model
{
    protected $table      = 'daftar_lomba';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 
        'cabang', 
        'nama', 
        'telepon', 
        'email', 
        'nasabah', 
        'client_id',
        'bersama_teman', 
        'created_at', 
        'total_peserta', 
        'total_pembayaran', 
    ];

    public function getDetail($id){
        $db      = \Config\Database::connect();
        $builder = $db->table('daftar_lomba_detail')
                    // ->join('daftar_lomba_detail', 'daftar_lomba_detail.id_lomba = daftar_lomba.id')
                    ->where('daftar_lomba_detail.id_lomba', $id)
                    ->get();
        // return $builder;
        return $builder->getResult();
    }

    public function peserta(){
        $db      = \Config\Database::connect();
        $builder = $db->table('daftar_lomba')
                    ->select('daftar_lomba.cabang, status_pembayaran, daftar_lomba_detail.*')
                    ->join('daftar_lomba_detail', 'daftar_lomba_detail.id_lomba = daftar_lomba.id')
                    ->get();
        // return $builder;
        return $builder->getResult();
    }

    public function konfirmasi(){
        $db      = \Config\Database::connect();
        $builder = $db->table('daftar_lomba_konfirm')
                    ->get();
        return $builder->getResult();
    }

    public function detail_konfirmasi($id){
        $db      = \Config\Database::connect();
        $builder = $db->table('daftar_lomba_konfirm')
                    ->where('id', $id)
                    ->get();
        return $builder->getRow();
    }

    public function delete_konfirmasi($id){
        $db      = \Config\Database::connect();
        $builder = $db->table('daftar_lomba_konfirm')->where('id', $id);
        return $builder->delete();
    }
    public function confirm_payment($id){
        $db      = \Config\Database::connect();
        $builder = $db->table('daftar_lomba')->set('status_pembayaran', 1)->where('id', $id);
        return $builder->update();
    }

}