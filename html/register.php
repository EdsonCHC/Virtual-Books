<?php
    require_once('../php/conex.php');
    require_once('../php/methods.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Registers.css">
    <link rel="shortcut icon" href="../src/user.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/alertify.css">
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
    <title>Registrarse</title>
</head>

<body>
    <div id="mother-ctn">
        <div id="title-ctn">
            <a href="../html/index.php"><h1>Virtual Books</h1></a>
            <H4>Registro</H4>
        </div>
        <img id="Ovalo_1" src="../src/login.png">
        <div id="form-ctn">
            <form action="../php/register_db_vb.php" method="post" enctype="multipart/form-data">
                <div id="text-ctn">
                    <label for="">
                        <h6>Nombres</h6>
                    </label>
                    <input type="text" name="name" placeholder="Martin Alejandro"  required id="input1">
                    <label for="">
                        <h6>Apellidos</h6>
                    </label>
                    <input type="text" name="lastName" placeholder="Castro Lopez" pattern="[a-zA-Z]+" required id="input2">
                    <label for="">
                        <h6>Correo Electrónico</h6>
                    </label>
                    <input type="email" name="email" placeholder="marin_castro@gmail.com" require id="input3">
                    <label for="">
                        <h6>Contraseña</h6>
                    </label>
                    <input type="password" name="password" placeholder="Contraseña" require id="input4">
                    <div id="eye">
                        <img src="../src/img/icons8-eye-96.png" id="ojo" onclick="eye();"> 
                    </div>
                    <label for="">
                        <h6>Confirmar Contraseña</h6>
                    </label>
                    <input type="password"  placeholder="Confirmar Contraseña" id="inputP" require>
                    <div id="eye">
                        <img src="../src/img/icons8-eye-96.png" id="ojo" onclick="eye();">
                    </div>
                    <div id="aparte">
                        <h6>O Regístrate con...</h6>
                        <button><img src="../src/google.png" alt=""></button>
                    </div>
                </div>
                <div id="img-ctn">
                    <h5>Foto de Perfil</h5>
                    <div id="img-container"><img class="grande" src="../src/user.png" alt="user_image" id="img-preview">
                    </div>
                    <label for="img_i" class="Upload">Subir Imagen
                        <i class="fa-solid fa-cloud-arrow-up white_i"></i>
                        <input type="file" id="img_i" accept=".jpg,.png" name="img" onchange="vista_preliminar(event), validar()">
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

    <!-- No tocar -->
    <?php 
        $obj = new métodosCrud();
        if(isset($_POST['register'])){
            $arr = array(
                $user = $_POST['name'],
                $lastName = $_POST['lastName'],
                $email = $_POST['email'],
                $pass = $_POST['password'],
                $img = $_POST['img']
            );

            $obj->insertData($arr);
        }
    ?>
</body>
<script src="../js/preview.js"></script>
<script src="../js/valPattern.js"></script>
</html>