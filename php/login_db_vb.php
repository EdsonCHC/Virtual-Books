<?php
include_once('../php/cone.php');
include_once('../php/methods.php');

$obj = new DataBase();
$DBH = $obj->connect();

if (isset($_POST['Send'])) {
    if (strlen($_POST['email']) >= 1 && strlen($_POST['password']) >= 1) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $STH = $DBH->query("SELECT * FROM `user` WHERE `email`='$email' and `password`='$password'");
        if ($STH->rowCount() > 0) {
            $STH->setFetchMode(PDO::FETCH_ASSOC);
            $session = $STH->FETCH();
            session_start();
            $_SESSION['user'] = array();
            $_SESSION['user'][0] = $session['id'];
            $_SESSION['user'][1] = $session['name'];
            echo "<script>
                    alert('A iniciado sesión correctamente');
                        window.location = '../html/index.php';
                    </script>";
        } else {
            echo '<script>
                        alert("Datos incorrectos");
                    window.location = "http://localhost/Virtual-Books/html/login.php";
                </script>';
        }
    } else {
        echo '<script>
                alert("Favor de rellenar todos los campos")
                window.location = "http://localhost/Virtual-Books/html/login.php";
            </script>';
    }
}
;