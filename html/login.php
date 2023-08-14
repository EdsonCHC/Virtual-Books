<?php
require_once('../php/cone.php');
require_once('../php/interface.php');
require_once('../php/methods.php');
require_once "../js/vendor/autoload.php";
session_start();

$client = new \Google\Client();
$client->setAuthConfig('../js/credentials.json');
$client->setRedirectUri('http://localhost/Virtual-Books/html/account.php');
// $client->addScope('name');
// $client->addScope('lastName');
$client->addScope('email');
// $client->addScope('profile');

$authUrl = $client->createAuthUrl();

if (isset($_SESSION['user'])){
    if($_SESSION['user'][2] === '0'){
        header("Location: ../html/index.php");
    }else{
        header("Location: ../html/index_admin.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/Rules.css" />
    <link rel="stylesheet" href="../css/login.css" />
    <link rel="stylesheet" href="../css/alertify.css">
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>

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
            <form id="form">
                <div class="space_primary_part">
                    <div class="tittle_primary_part">
                        <a href="../html/index.php">
                            <h1>Virtual Books</h1>
                        </a>
                    </div>
                    <div class="subtitle_primary_part">
                        <h3>Inicia Sesión</h3>
                    </div>
                    <div class="form_primary_part">
                        <div class="details_primary_part">
                            <div class="tittle_details_primary_part">
                                <h4><label for="email">Correo Electrónico</label></h4>
                            </div>
                            <input type="text" name="email" id="email" placeholder="username@gmail.com"
                                autocomplete="off">
                            <p class="warnings" id="warnings"></p>
                        </div>
                        <div class="details_primary_part">
                            <div class="tittle_details_primary_part">
                                <h4> <label  data-section="push" data-value="footer" for="email">Contraseña</label></h4>
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
                        <p>¿No tienes cuenta? <a href="../html/register.php"> !Regístrate¡</a></p>
                    </div>
                </div>
            </form>
            <div id="trad" onclick="toggleTrad()">
            <i class="fa-solid fa-globe"></i>
            <p data-section="asideU" data-value="Idiom">Idioma</p>

            <div id="flags" class="trad ">
                <div class="flag-cont" data-language="en">
                    <img src="../src/BanderaIngles.png" alt="en-flag">
                </div>
                <div class="flag-cont" data-language="es">
                    <img src="../src/BanderaEspañol.jpg" alt="es-flag">
                </div>
            </div>
        </div>
        </div>
        <div class="secondary_part">
        </div>
    </div>
    <script src="https://accounts.google.com/gsi/client" async></script>
    <script src="../js/valid/valLogin.js"></script>
    <script src="../js/alertify.js"></script>
    <script src="../js/j_query.js"></script>
    <script src="../js/log.js"></script>
    <script src="../js/trad.js"></script>
    <script src="../js/toggle.js"></script>
</body>

</html>