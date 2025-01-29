<?php 
namespace App\Entities;
use CodeIgniter\Entity\Entity;
use \App\Modules\Users\Models\Users_model;
use CodeIgniter\I18n\Time;
class TmAcara extends Entity{
    function getAuthor(){
        $model = new Users_model();
        $outdata = $model->first($this->created_by);
        return ($outdata['name'] ?? 'deleted user');
    }
    function getKotaList(){
        $ref = $this->id_acara;
        $kotaList = (new \App\Models\TrAcaraKota)->where('ref_id', $ref)->findAll();
        if(empty($kotaList)){
            return '-';
        }
        $output = [];
        foreach($kotaList as $k => $v){
            $modelKota = (new \App\Models\TmRegion)->where('region_id', $v->region_id)->first();
            $output[] = $modelKota->kabupaten_kota ?? '-';
        }
        return implode(', ', $output);
    }
    function getLevelText(){
        $level = $this->level;
        $levelArr = ['1' => 'Beginner', '2' => 'Intermediate', '3' => 'Advance', '4' => 'Expert'];
        return $levelArr[$level] ?? '-';
    }
    function getBulanText(){
        $month = ['' => '', '1' => 'Januari', '2' => 'Februari', '3' => 'Maret', '4' => 'April', '5' => 'Mei', '6' => 'Juni', '7' => 'Juli', '8' => 'Agustus', '9' =>'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'];
        return $month[$this->bulan] ?? '-';
    }
    function getSrcGambarDetail(){
        $src = $this->id_acara;
        $modelGambar = (new \App\Models\TmAttachment)->where(['refid' => $src, 'form' => 'acara_edukasi_1'])->first();
        if(empty($modelGambar)){
            return '-';
        }
        return base_url('open_attachment?path=').$modelGambar->file_path;
    }
    function getSrcGambarDepan(){
        $src = $this->id_acara;
        $modelGambar = (new \App\Models\TmAttachment)->where(['refid' => $src, 'form' => 'acara_edukasi_0'])->first();
        if(empty($modelGambar)){
            return base_url().'/assets_frontend/img/artikel.png';
        }
        return base_url('open_attachment?path=').$modelGambar->file_path;
    }
    function getLocalDate(){
        $date = Time::parse($this->tanggal_acara, 'Asia/Jakarta', 'id_ID');
        return $date->toLocalizedString('d MMMM yyyy');
    }
    function getJam(){
        return date('H', strtotime($this->tanggal_acara));
    }
    function getMenit(){
        return date('i', strtotime($this->tanggal_acara));
    }
    function getWaktuBagian(){
        return strtoupper($this->time_type);
    }
    function getHari(){
        $days = array('Minggu', 'Senin', 'Selasa', 'Rabu','Kamis','Jum\'at', 'Sabtu');
        $date = date('w', strtotime($this->tanggal_acara));
        return $days[$date] ?? '-';
    }
    function getTanggalAcaraForm(){
        $date = date('Y-m-d', strtotime($this->tanggal_acara));
        return $date ?? 'WIB';
    }
}