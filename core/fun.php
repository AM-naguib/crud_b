<?php

function sanitaization($input){
    return trim(htmlentities(htmlspecialchars($input)));
}

function require_input($input){
    if(empty($input)){
        return true;
    }
    return false;
}


function min_len($input,$len){
    if(strlen($input) < $len){
        return true;
    }
    return false;
}



function max_len($input,$len){
    if(strlen($input) > $len){
        return true;
    }
    return false;
}



function get_data($path){
    $data = file_get_contents($path);
    $data = json_decode($data,true);
    return $data;
}



function remove_item($path,$item){
    $data =get_data($path);
    foreach($data as $key => $value){
        if($key == $item){
            unset($data[$key]);
        }
    }
    return $data;

}


function check_category($id,$file){
    foreach($file as $key => $value){
        if($key == $id){
            return true;
        }
    }
    return false;
}
