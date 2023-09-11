<?php

require 'config/config.php';
require CORE . '/classes/Db.php';
require CORE . '/funcs.php';

$db_config = require CONFIG . '/db.php';
$db = (Db::getInstance())->getConnection($db_config);

$comments = $db ->query("SELECT name, message, date  FROM comments") ->findAll();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $fillable = ['name', 'message'];
    $data = load($fillable);
    $errors = [];

    if(empty($data['name']))
        $errors['name'] = 'Необходимо написать имя';

    if(!preg_match('&^[a-zA-Z-а-я-А-ЯёЁ]+$&u', $data['name'])){
        $errors['name'] = "Имя не может содержать цифры и символы";
    }

    if(strlen($data['name']) > 30){
        $errors['name'] = "Длина имени не должна превышать 30 символов";
    }

    if(empty($data['message']))
        $errors['message'] = 'Необходимо написать текст комментария';

    if(strlen($data['message']) > 255){
        $errors['name'] = "Длина сообщения не может превышать 255 символов";
    }

    if(empty($errors)) {
        if ($db->query("INSERT INTO comments (`name`, `message`, `date`) VALUES (?, ?, CURRENT_DATE())", [$data['name'], $data['message']])) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } else {
            echo "DB_Error";
        }
    }

}
require 'index.tpl.php';