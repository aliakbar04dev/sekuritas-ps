<?php 
namespace App\Models;
use CodeIgniter\Model;
class TmAcara extends Model{
    protected $table = 'tm_acara';
    protected $primaryKey = 'id_acara';
    protected $allowedFields = [
        'created_by', 'updated_by', 'view', 'judul', 'slug', 'content', 'tahun', 'bulan', 'tanggal_acara', 'level', 'created_at', 'updated_at', 'time_type'
    ];
    protected $returnType = \App\Entities\TmAcara::class;
    public function monthInd($obj = 1, $montArr = null){
        $month = ['1' => 'Januari', '2' => 'Februari', '3' => 'Maret', '4' => 'April', '5' => 'Mei', '6' => 'Juni', '7' => 'Juli', '8' => 'Agustus', '9' =>'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'];
        switch($obj){
            case 2:
                $output = $month[$montArr];
            break;
            default:
                $output = $month;
        }
        return $output;
    }
    public function levelList($obj = 1, $levelArr = null){
        $level = ['1' => 'Beginner', '2' => 'Intermediate', '3' => 'Advance', '4' => 'Expert'];
        switch($obj){
            case 2:
                $output = $level[$levelArr];
            break;
            default:
                $output = $level;
        }
        return $output;
    }
    public function getOptionJam($selected = null){
        $option = "<option value=''>Pilih Jam</option>";
        for($i = 0; $i <= 23; $i++){
            $time = sprintf('%02d', $i);
            if($selected == $time){
                $option .= "<option selected value='$time'>$time</option>";
            }else{
                $option .= "<option value='$time'>$time</option>";

            }
        }
        return $option;
    }
    public function getOptionMenit($selected = null){
        $option = "<option value=''>Pilih Menit</option>";
        for($i = 0; $i <= 59; $i++){
            $time = sprintf('%02d', $i);
            if($selected == $time){
                $option .= "<option selected value='$time'>$time</option>";
            }else{
                $option .= "<option value='$time'>$time</option>";

            }
        }
        return $option;
    }
    public function getOptionTimeType($selected = null){
        $option = "<option value=''>Pilih Waktu Bagian</option>";
        $array = ['wib' => 'WIB', 'wita' => 'WITA', 'wit' => "WIT"];
        foreach($array as $key => $v){
            if($selected == $key){
                $option .= "<option selected value='$key'>$v</option>";
            }else{
                $option .= "<option value='$key'>$v</option>";

            }
        }
        return $option;
    }
}