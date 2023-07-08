<?php
require_once('../php/conex.php');
require_once('../php/methods.php');
require_once "../js/vendor/autoload.php";

$client = new \Google\Client();
$client->setAuthConfig('../js/credentials.json');
$client->setRedirectUri('http://localhost/Virtual-Books/html/account.php');
// $client->addScope('name');
// $client->addScope('lastName');
$client->addScope('email');
$client->addScope('profile');

$authUrl = $client->createAuthUrl();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Estilos-->
    <link rel="stylesheet" href="../css/Registers.css">

    <!-- Boostrap-->
    <link rel="shortcut icon" href="../src/user.png" type="image/x-icon">

    <!-- Fonts-->
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>

    <!-- Boostrap-->
    <link rel="stylesheet" href="../css/alertify.css">
    <link rel="stylesheet" href="../css/alert/themes/bootstrap.css">
    <title>Registrarse</title>
</head>

<body>
    <div id="mother-ctn">
        <div id="title-ctn">
            <a href="../html/index.php">
                <h1>Virtual Books</h1>
            </a>
            <H4>Registro</H4>
        </div>
        <img id="Ovalo_1" src="../src/login.png">
        <div id="form-ctn">
            <form action="../php/register_db_vb.php" method="post" enctype="multipart/form-data">
                <div id="text-ctn">
                    <label for="">
                        <h6>Nombres</h6>
                    </label>
                    <input type="text" name="name" placeholder="Martin Alejandro" >
                    <label for="">
                        <h6>Apellidos</h6>
                    </label>
                    <input type="text" name="lastName" placeholder="Castro Lopez">
                    <label for="">
                        <h6>Correo Electronico</h6>
                    </label>
                    <input type="email" name="email" placeholder="marin_castro@gmail.com">
                    <label for="">
                        <h6>Contraseña</h6>
                    </label>
                    <input type="password" name="password" placeholder="Contraseña">
                    <div id="eye">
                        <img src="../src/img/icons8-eye-96.png" id="ojo" onclick="eye();">
                    </div>
                    <label for="">
                        <h6>Confirmar Contraseña</h6>
                    </label>
                    <input type="password" name="password_c" placeholder="Confirmar Contraseña" id="input2">
                    <div id="eye">
                        <img src="../src/img/icons8-eye-96.png" id="ojo" onclick="eye();">
                    </div>
                    <div id="aparte">
                        <!-- Registro con google-->
                        <a href="<?php echo $client->createAuthUrl(); ?>>">
                            <h6>O Registrate con...</h6>
                        </a>
                        <button>
                            <a href="<?php echo $client->createAuthUrl(); ?>"><img src="../src/google.png" alt=""></a>
                        </button>
                    </div>
                </div>
                <div id="img-ctn">
                    <h5>Foto de Perfil</h5>
                    <div id="img-container"><img class="grande" src="../src/user.png" alt="user_image" id="img-preview">
                    </div>
                    <label for="img_i" class="Upload">Subir IMG
                        <i class="fa-solid fa-cloud-arrow-up white_i"></i>
                        <input type="file" id="img_i" accept=".jpg,.png" name="img"
                            onchange="vista_preliminar(event), validar()">
                    </label>
                    <div id="warning"></div>
                    <div id="flex-lines">
                        <div class="line"></div>
                        <p>O</p>
                        <div class="line"></div>
                    </div>
                    <h5 class="primo">Selecciona un avatar</h5>
                    <img class="img_chiqitas" src="../src/user.png" alt="">
                    <img class="img_chiqitas" src="../src/user.png" alt="">
                    <img class="img_chiqitas" src="../src/user.png" alt="">
                    <img class="img_chiqitas" src="../src/user.png" alt="">
                </div>
                <button onclick="register()" id="boton" name="register" type="submit">
                    <h6>Registrar</h6>
                </button>
            </form>
        </div>
        <img id="Ovalo_2" src="../src/login.png">
    </div>
</body>
<script src="../js/preview.js"></script>

</html>