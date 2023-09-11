<?php


// Обертка
function h ($text){
    return htmlspecialchars($text, ENT_QUOTES);
}

function load($fillable = []){
    $data = [];
    foreach ($_POST as $k => $v){
        if(in_array($k, $fillable))
            $data[$k] = trim($v);
    }
    return $data;
}

function old($fieldName){
    return isset($_POST[$fieldName]) ? h($_POST[$fieldName]) : '';
}



