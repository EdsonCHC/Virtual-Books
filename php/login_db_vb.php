<?php
use Google\Service\SecurityCommandCenter\Role;

include_once('../php/cone.php');
require_once('../php/interface.php');
include_once('../php/methods.php');

$obj = new DataBase();
$DBH = $obj->connect();

extract($_POST);

try {
    $sql = "SELECT * FROM `user` WHERE `email` = :email AND `password` = :password";
    $STH = $DBH->prepare($sql);
    $STH->bindParam(':email', $email);
    $STH->bindParam(':password', $password);
    $STH->execute();

    if ($STH->rowCount() > 0) {
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $session = $STH->fetch();
        if ($session['rol'] === "0") {
            session_start();
            $_SESSION['user'] = array();
            $_SESSION['user'][0] = $session['id'];
            $_SESSION['user'][1] = $session['name'];
            $_SESSION['user'][2] = $session['rol'];
        }

        if ($session['rol'] === "1") {
            session_start();
            $_SESSION['admin'] = array();
            $_SESSION['admin'][0] = $session['id'];
            $_SESSION['admin'][1] = $session['name'];
            $_SESSION['admin'][2] = $session['rol'];
        }

        $json = array(
            'name' => $session['name'],
            'rol' => $session['rol']
        );

        $json_str = json_encode($json);
        echo $json_str;
    } else {
        echo "false";
    }
} catch (PDOException $e) {
    die("Error " . $e->getMessage());
}
?>