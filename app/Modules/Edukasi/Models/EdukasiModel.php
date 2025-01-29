<?php
namespace App\Modules\Edukasi\Models;

use CodeIgniter\Model;

class EdukasiModel extends Model
{
    protected $table      = 'edukasi_master';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 
        'nama_edukasi',
        'tanggal_edukasi',
        'tempat_acara',
        'waktu_acara',
        'waktu_acara',
        'pembicara',
        'level_edukasi',
        'kode_edukasi',
        'created_at',
    ];

    public function list_edukasi(){
        $db      = \Config\Database::connect();
        $builder = $db->table('edukasi_master')
                    ->select('edukasi_master.*, COUNT(edukasi_pendaftaran.id) AS total')
                    ->join('edukasi_pendaftaran', 'edukasi_pendaftaran.id_edukasi = edukasi_master.id', 'left')
                    ->groupBy('edukasi_master.id')
                    ->get();
        // return $builder;
        return $builder->getResult();
    }

    public function list_peserta_edukasi($id){
        $db      = \Config\Database::connect();
        $builder = $db->table('edukasi_pendaftaran')
                    ->select('*')
                    ->where('id_edukasi', $id)
                    ->get();
        // return $builder;
        return $builder->getResult();
    }
    
    public function peserta_all(){
        $db      = \Config\Database::connect();
        $builder = $db->table('edukasi_pendaftaran')
                    ->select('*')
                    ->join('edukasi_master', 'edukasi_pendaftaran.id_edukasi = edukasi_master.id')
                    ->get();
        // return $builder;
        return $builder->getResult();
    }

    public function delete_peserta($id){
        $db      = \Config\Database::connect();
        $builder = $db->table('edukasi_pendaftaran')->where('id', $id);
        return $builder->delete();
    }
}