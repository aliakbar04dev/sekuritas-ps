<?php 
namespace App\Libraries;
use App\Controllers\BaseController;
class Simple_table_builder extends BaseController{
    protected $header = [];
    protected $table;
    protected $tableHelper;
    protected $tableClass = "table table-striped";
    protected $filter = false;

    function __construct(){
        $this->db = \Config\Database::connect();
        $this->tableHelper = new \CodeIgniter\View\Table();
    }
    static function run(){
        return new self;
    }
    function setClass($text){
        if(is_array($text)){
            $text = implode(" ", $text);
        }
        $this->tableClass = 'table '.$text;
        return $this;
    }
    function setFilterForm($id = null){
        $this->filter = $id;
        return $this;
    }
    function getFilterForm($id = null){
        return $this->filter;
    }
    function generateFromQuery(String $query = null){
        $template = [
            'table_open' => '<table id="multi-select" class="display dtr-inline '.$this->tableClass.'">'
        ];
        log_message('debug', 'GENERATE TABLE : '.$query);
        $this->tableHelper->setTemplate($template);
        return $this->tableHelper->generate($this->db->query($query));
        
    }
    function generateAjaxTable(Array $heading = null, String $urlData = null): String
    {
        $filterForm = '';
        if($this->getFilterForm() != false){
            $filterForm = "data-filter='".$this->getFilterForm()."'";
        }
        $template = [
            'table_open' => '<table id="" '.$filterForm.' data-url="'.$urlData.'" class="display ajaxTable dtr-inline '.$this->tableClass.'" style="color: #000; width:100%;">'
        ];
        
        $this->tableHelper->setTemplate($template);
        $this->tableHelper->setHeading($heading);
        return $this->tableHelper->generate();
    }
    function generateAjaxCustomTable(Array $heading = null, String $urlData = null): String
    {
        $filterForm = '';
        if($this->getFilterForm() != false){
            $filterForm = "data-filter='".$this->getFilterForm()."'";
        }
        $table = '<table id="" '.$filterForm.' data-url="'.$urlData.'" class="display ajaxTable dtr-inline '.$this->tableClass.'" style="color: #000;">';
        $table .= "<thead>";
        foreach($heading as $k => $v){
            if(!is_array($v)){
                $table .= "<th>$v</th>";
                continue;
            }
            if(empty($v['content'])){
                continue;
            }
            $style = [];
            if(!empty($v['width'])){
                $style[] = "width: ".$v['width']." !important";
            }
            if(!empty($v['text-color'])){
                $style[] = "text-color: red !important";
            }
            $style = implode(';', $style);
            $class = '';
            $id = $v['id'] ?? '';
            if(!empty($v['class'])){
                $class .= $v['class'];
            }
            $content = $v['content'];
            $table .= "<th style='$style' class='$class' id='$id'>$content</th>";
        }
        $table .= "</thead>";
        $table .= "</table>";
        return $table;
    }
}