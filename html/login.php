<?php
require_once('../php/cone.php');
require_once('../php/interface.php');
require_once('../php/methods.php');
require_once "../js/vendor/autoload.php";

$client = new \Google\Client();
$client->setAuthConfig('../js/credentials.json');
$client->setRedirectUri('http://localhost/Virtual-Books/html/account.php');
// $client->addScope('name');
// $client->addScope('lastName');
$client->addScope('email');
// $client->addScope('profile');

$authUrl = $client->createAuthUrl();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Rules.css" />
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/login.css" />

    <!-- Fonts and Boostrap-->
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/alertify.css">

    <title>Iniciar Sesión</title>
</head>

<body>
    <div class="img_part">
        <img src="../src/login.png" class="img1_part">
        <img src="../src/login.png" class="img2_part">
        <img src="../src/login.png" class="img3_part">
    </div>
    <div class="general_part">
        <div class="primary_part">
            <form action="../php/login_db_vb.php" method="POST" id="form">
                <div class="space_primary_part">
                    <div class="tittle_primary_part">
                        <h1>Virtual Books</h1>
                    </div>
                    <div class="subtittle_primary_part">
                        <h3>Inicia Sesión</h3>
                    </div>
                    <div class="form_primary_part">
                        <div class="details_primary_part">
                            <div class="tittle_details_primary_part">
                                <h4><label for="email">Correo Electronico</label></h4>
                            </div>
                            <input type="text" name="email" id="email" placeholder="username@gmail.com"
                                autocomplete="off">
                            <p class="warnings" id="warnings"></p>
                        </div>
                        <div class="details_primary_part">
                            <div class="tittle_details_primary_part">
                                <h4> <label for="email">Contraseña</label></h4>

                            </div>
                            <input type="password" name="password" id="password" placeholder="Contraseña"
                                autocomplete="off">
                            <p class="warnings" id="warnings_2"></p>
                        </div>
                    </div>
                    <div class="submit_primary_part">
                        <input type="submit" value="Iniciar Sesión" name="Send">
                    </div>
                </div>
                <div class="google_space_primary_part">
                    <div class="google_primary_part">
                        <!-- Login con google-->
                        <!--<p>O Inicia Sesión con...</p>
                        <a href="<?php echo $authUrl; ?>">
                            <img src="../src/google.png" alt="google_logo" id="">
                        </a>-->
                    </div>
                    <div class="register_primary_part">
                        <p>¿No tienes cuenta?<a href="../html/register.php">!Regístrate¡</a></p>
                    </div>
                </div>
            </form>
        </div>
        <div class="secundary_part">
        </div>
    </div>
    <?php
    require_once("../php/login_db_vb.php");
    ?>
    <script src="https://accounts.google.com/gsi/client" async></script>
    <!--Problemas con preventDeault()-->
    <script src="../js/valid/valLogin.js"></script>
</body>

</html>