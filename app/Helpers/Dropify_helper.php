<?php 
if(!function_exists('dropify')){
    function dropify(String $name,Array $rules, $value = ''){
        helper('form');
        $output = '';
        $rules['class'] = 'dropify';
        $output .= form_upload($name, $value, $rules);
        $output .= form_hidden("$name"."[FILENAME]");
        $output .= form_hidden("$name"."[FILEPATH]");
        $output .= form_hidden("$name"."[SIZE]");
        $output .= form_hidden("$name"."[MIME]");
        return $output;
    }
}