<?php
use Google\Service\SecurityCommandCenter\Role;

include_once('../php/cone.php');
require_once('../php/interface.php');
include_once('../php/methods.php');

$obj = new DataBase();
$DBH = $obj->connect();


extract($_POST);
$STH = $DBH->query("SELECT * FROM `user` WHERE `email`='$email' and `password`='$password'");
if ($STH->rowCount() > 0) {
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    $session = $STH->fetch();
    session_start();
    $_SESSION['user'] = array();
    $_SESSION['user'][0] = $session['id'];
    $_SESSION['user'][1] = $session['name'];

    $json = array(
        'name' => $session['name'],
        'rol' => $session['rol']
    );
    
    $json_str = json_encode($json);
    echo $json_str;

} else {
    echo "false";
}



?>