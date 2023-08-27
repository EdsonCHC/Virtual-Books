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
$client->addScope('profile');
$authUrl = $client->createAuthUrl();


if (isset($_SESSION['user'])) {
    if ($_SESSION['user'][2] === '0') {
        header("Location: ../html/index.php");
    } else {
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
    <title data-section="register" data-value="title">Registrarse</title>
    <link rel="stylesheet" href="../css/Registers.css">
    <link rel="shortcut icon" href="../src/user.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/alertify.css">
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="mother-ctn">
        <div id="title-ctn">
            <a href="../html/index.php">
                <h1>Virtual Books</h1>
            </a>
            <H4 data-section="register" data-value="title">Registro</H4>
        </div>
        <img id="Ovalo_1" src="../src/login.png">
        <div id="form-ctn">
            <form id="form" enctype="multipart/form-data">
                <div id="text-ctn">
                    <label for="">
                        <h6 data-section="register" data-value="name">Nombres</h6>
                    </label>
                    <input type="text" name="name" placeholder="Martin Alejandro" id="name" autocomplete="off" >
                    <p class="warnings" id="warnings"></p>
                    <label for="">
                        <h6 data-section="register" data-value="lastname">Apellidos</h6>
                    </label>
                    <input type="text" name="lastName" placeholder="Castro Lopez"  id="lastName"
                        autocomplete="off">
                    <p class="warnings" id="warnings2"></p>
                    <label for="">
                        <h6 data-section="login" data-value="mail">Correo Electrónico</h6>
                    </label>
                    <input type="email" name="email" placeholder="ejemplo@gmail.com" id="email" autocomplete="off">
                    <p class="warnings" id="warnings3"></p>
                    <label for="">
                        <h6 data-section="login" data-value="pass">Contraseña</h6>
                        <p class="warnings" id="warnings"></p>
                    </label>
                    <input type="password" name="password" placeholder="*******" id="pass" autocomplete="off">
                    <div id="eye">
                        <img src="../src/img/icons8-eye-96.png" id="ojo" onclick="eye();">
                    </div>
                    <label for="">
                        <h6 data-section="register" data-value="pass-con">Confirmar Contraseña</h6>
                        <p class="warnings" id="warnings"></p>
                    </label>
                    <input type="password" id="passConfirm" placeholder="*******" autocomplete="off">

                    <div id="aparte">
                        <!-- Registro con google-->
                        <!--<a href="<?php echo $client->createAuthUrl(); ?>>">
                            <h6>O Regístrate con...</h6>
                        </a>
                        <a href="<?php echo $client->createAuthUrl(); ?>">
                            <div>
                                <img src="../src/google.png" alt="">
                            </div>
                        </a>-->
                    </div>
                    <div class="login_part" data-section="register" data-value="log-acc">
                        <p>¿Ya tienes cuenta? <a href="../html/login.php"> !Inicia Sesión¡</a></p>
                    </div>
                </div>
                <div id="img-ctn">
                    <h5>Foto de Perfil</h5>
                    <div id="img-container"><img class="grande" src="../src/user.png" alt="user_image" id="img-preview">
                    </div>
                    <label for="img_i" class="Upload">
                        <i class="fa-solid fa-cloud-arrow-up white_i"></i>
                        <input type="file" id="img_i" accept=".jpg,.png" name="file"
                            onchange="vista_preliminar(event), validar()">
                    </label>
                    <div id="warning"></div>
                    <div id="flex-lines">
                        <div class="line"></div>
                        <p>O</p>
                        <div class="line"></div>
                    </div>
                    <h5 class="primo" data-section="register" data-value="avatar">Selecciona un avatar predeterminado
                    </h5>
                    <label for="user-icon-1" class="l-icon"><img class="img_chiquitas" src="../src/user/user-man-1.png"
                            alt="">
                        <input type="radio" name="user-pic" class="icons-user" value="user-man-1.png" id="user-icon-1"
                            checked></label>
                    <label for="user-icon-2" class="l-icon"><img class="img_chiquitas"
                            src="../src/user/user-woman-1.png" alt="">
                        <input type="radio" name="user-pic" class="icons-user" value="/user-woman-1.png"
                            id="user-icon-2"></label>
                    <label for="user-icon-3" class="l-icon"><img class="img_chiquitas" src="../src/user/user-man-2.png"
                            alt="">
                        <input type="radio" name="user-pic" class="icons-user" value="user-man-2.png" id="user-icon-3">
                    </label>
                    <label for="user-icon-4" class="l-icon"><img class="img_chiquitas"
                            src="../src/user/user-woman-2.png" alt="">
                        <input type="radio" name="user-pic" class="icons-user" value="user-woman-2.png"
                            id="user-icon-4">
                    </label>
                </div>
                <button onclick="" id="botón" name="register" type="submit">
                    <h6>Registrarse</h6>
                </button>
            </form>
        </div>
        <img id="Ovalo_2" src="../src/login.png">
    </div>
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
</body>
<script src="../js/alertify.js"></script>
<script src="../js/j_query.js"></script>
<script src="../js/preview.js"></script>
<script src="../js/reg.js"></script>
<script src="../js/toggle.js"></script>
<script src="../js/trad.js"></script>
<script src="../js/valid/valRegister.js"></script>

</html>