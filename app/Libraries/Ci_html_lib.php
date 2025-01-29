<?php 
namespace App\Libraries;
use App\Controllers\BaseController;
class Ci_html_lib extends BaseController{
    protected $button = '';
    function generateActionBar(Array $actionBarList){
        foreach($actionBarList as $key => $value){
            helper('form');
            helper('url');
            helper('html');
            $js = null;
            $title = null;
            $type = null;
            $attributes = [];
            $color = '';
            $textColor = '';
            $icon = '';
            foreach($value as $k => $v){
                switch($k){
                    case 0:
                        $type = $v;
                    break;
                    case 1:
                        $title = $v;
                        if(is_array($v)){
                            $attributes = $v;
                            $title = null;
                        }
                    break;
                    case 2:
                        $attributes = $v;
                    break;
                }
            }
            switch($type){
                case 'link':
                    $attributes['onclick'] = "window.location.href = $(this).attr('data-link')";
                break;
                case 'new_tab_link':
                    $attributes['onclick'] = "window.open($(this).attr('data-link'), '__blank')";
                break;
                case 'button':
                    $attributes['onclick'] = $attributes['data-action'];
                    unset($attributes['data-action']);
                break;
                case 'redirect_back_link':
                default:
                $attributes['onclick'] = "window.history.go(-1)";
            }
            if(isset($attributes['color'])){
                $color = $attributes['color'];
                unset($attributes['color']);
            }
            if(isset($attributes['text-color'])){
                $textColor = $attributes['text-color'];
                unset($attributes['text-color']);
            }
            if(isset($attributes['icon'])){
                $attributes['content'] = "<i class='material-icons left'>".$attributes['icon']."</i>".$attributes['content'];
                unset($attributes['icon']);
            }
            $class = 'btn-small';
            if(isset($attributes['btnClass'])){
                $class = $attributes['btnClass'];
                unset($attributes['btnClass']);
            }
            $attributes['class'] = "$class waves-effect $color $textColor";
            $this->button .= form_button($attributes);
        }
        return $this->button;
    }
    static function library(){
        return new self;
    }
    function generateTableAction(Array $buttonList, $dataId = null){
        $output = '';
        $idAction = $this->generateTableActionId(md5(date('s')));
        foreach($buttonList as $k => $v){
            if(!is_array($v)){
                $output .= anchor($k, $v, ['id' => $idAction, 'onclick' => 'event.preventDefault();window.open($(this).attr(\"href\"), \"__blank\")']);
            }else{
                if(!isset($v['data-link'])){
                    $v['data-link'] = $k;
                }
                if(!isset($v['title'])){
                    $v['title'] = $v['content'];
                }
                if(!isset($v['click'])){
                    $v['click'] = 'event.preventDefault();window.open($(this).attr("href"), "_blank")';
                }
                $output .= anchor($k, $v['content'], ['id' => $idAction, 'data-link' => $v['data-link'],'onclick' => $v['click'], 'class' => 'tooltipped', 'alert-title' => ($v['alert'] ?? ''),'data-tooltip' => $v['title'], 'data-position' => 'top']);

            }
        }
        return $output;
    }
    function generateTableActionId($helper = null){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        $n = 10;
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            if($i % 4 == 0 && $i != 0){
                $randomString .= "-";
            }
            $randomString .= $characters[$index];
        }
    
        return $randomString."-$helper";
    }
}