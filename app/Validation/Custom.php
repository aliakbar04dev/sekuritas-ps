<?php

namespace App\Validation;
use App\Models\TmAcara;
use App\Models\TmArtikel;

class Custom
{
    // public function custom_rule(): bool
    // {
    //     return true;
    // }
    public function unique_acara_slug(string $str, string $fields, array $data){
        $text = $data['form']['slug'];
        $repo = new TmAcara;
        $repo = $repo->where('slug', $text)->get()->getNumRows();
        if($repo > 0){
            return false;
        }
        return true;
    }
    public function unique_artikel_slug(string $str, string $fields, array $data){
        $text = $data['form']['slug'];
        $repo = new TmArtikel;
        $repo = $repo->where('slug', $text)->get()->getNumRows();
        if($repo > 0){
            return false;
        }
        return true;
    }
    public function unique_subscriber_address(string $str, string $fields, array $data){
        $text = $data['email'];
        $repo = new \App\Models\Subscriber;
        $repo = $repo->where('email', $text)->get()->getNumRows();
        if($repo > 0){
            return false;
        }
        return true;
    }
}
