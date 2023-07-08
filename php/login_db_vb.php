<?php
//Poner la conexion real
include_once("../php/conex.php");

// 
$clienteID = '876116753741-dqgfl8304shbnihnp4o6udsqpb2armg3.apps.googleusercontent.com';
$clientSecret = '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';
$redirecUrl = 'http://localhost/Virtual-Books/html/login.php';

// Se solicita la cuenta del cliente de google
$client = new Google_Client();
$client->setClientId($clienteID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUrl);
$client->addScope('profile');
$client->addScope('email');

if (isset($_GET[''])) {
    $token = $client->FetchAccesTokenWithAuthCode($_GET['code']);
    $client->setAccesToken($token);

    // Obteniendo el perfil del usuario
    $gauth = new Google_Service_Oauth2($client);
    $google_info = $gauth->userInfo->get();
    $email = $google_info->email;
    $name = $google_info->name;
    echo "Welcome user". $name. "listo para esto";
} else {
    echo "<a href='".$client->createAutUri()."'>Login with google</a>";
}

if(isset($_POST['Send'])){

$conex = $conex_VB;
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];     


if (isset($_POST['Send'])) {
    if (strlen($_POST['email']) >= 1 && strlen($_POST['contraseña']) >= 1) {

        $validar_login = mysqli_query($conex, "SELECT * FROM usuario WHERE Email='$email' and Contraseña='$contraseña'");
        if (mysqli_num_rows($validar_login) > 0) {
            // $data = $validar_login->fetch_assoc();
            session_start();
            echo "<script>
            alert('A iniciado sesión correctamente');
            window.location = '../html/index.php';
             </script>";
          exit;
        }
        else{
            echo '
            <script>
                alert("Datos incorrectos");
                window.location = "../html/login.php";

            </script>
            ';
            exit;
        }

    } else {
        echo '
        <script>
            alert("Aun hay campos sin llenar")
        </script>
        ';
    }
}
}
