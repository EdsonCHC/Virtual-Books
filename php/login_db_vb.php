<?php

//Conección
include_once('../php/conex.php');
include_once('../php/methods.php');

$obj = new DataBase();
$DBH = $obj->connect();

if (isset($_POST['Send'])) {
    if (strlen($_POST['email']) >= 1 && strlen($_POST['password']) >= 1) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        // Login User
        // $STH = $DBH->prepare("INSERT INTO user (`name`,`lastName`,`email`,`password`,`img`) 
        $validar_login = mysqli_query($conex, "SELECT * FROM `user` WHERE `email`='$email' and `password`='$password'");
        if (mysqli_num_rows($validar_login) > 0) {

            // $_SESSION['user'] = array();
            // $_SESSION['user'][0] = $data['id'];
            // $_SESSION['user'][1] = $data['name'];
            echo "<script>
                    alert('A iniciado sesión correctamente');
                        window.location = 'http://localhost/Virtual-Books/html/index.php';
                    </script>";
            session_start();
        } else {
            echo '<script>
                        alert("Datos incorrectos");
                    window.location = "http://localhost/Virtual-Books/html/login.php";
                </script>';
        }

        //Login Admin
        // $validar_admin = mysqli_query($conex, "SELECT * FROM `user` WHERE `email`='$email' and `password`='$password'");
        // if (mysqli_num_rows($validar_admin) > 0) {
        //     $data = $validar_admin->fetch_assoc();
        //     session_start();
        //     $_SESSION['admin'] = array();
        //     $_SESSION['admin'][0] = $data['id'];
        //     $_SESSION['admin'][1] = $data['nombre'];
        //     echo "<script>
        //             alert('A iniciado sesión correctamente');
        //                 window.location = '../html/index_admin.php';
        //             </script>";

        // } else {
        //     echo '<script>
        //             alert("Datos incorrectos");
        //             window.location = "http://localhost/Virtual-Books/html/login.php";
        //         </script>';
        // }
    } else {
        echo '<script>
                alert("Favor de rellenar todos los campos")
                window.location = "http://localhost/Virtual-Books/html/login.php";
            </script>';

    }
}
;