<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Registers.css">
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/alertify.css">
    <link rel="stylesheet" href="../css/alert/themes/bootstrap.css">
    <title>Registrarse</title>
</head>

<body>
    <div id="mother-ctn">
        <div id="title-ctn">
            <h1>Virtual Books</h1>
            <H6>Register</H6>
        </div>
        <img id="Ovalo_1" src="../src/login.png">
        <div id="form-ctn">
            <form action="" method="post" enctype="multipart/form-data">
                <div id="text-ctn">
                    <label for="">
                        <h6>First Name</h6>
                    </label>
                    <input type="text" name="nombres" placeholder="Narendra Singh">
                    <label for="">
                        <h6>Last Name</h6>
                    </label>
                    <input type="text" name="apellidos" placeholder="Narendra Singh">
                    <label for="">
                        <h6>E-mail</h6>
                    </label>
                    <input type="email" name="email" placeholder="Username@gmail.com">
                    <label for="">
                        <h6>Password</h6>
                    </label>
                    <input type="password" name="contraseña" placeholder="Password">
                    <label for="">
                        <h6>Confirm Password </h6>
                    </label>
                    <input type="password" name="contraseña_C" placeholder="Password Confirm" id="input2">
                    <div id="eye">
                        <img src="../src/img/icons8-eye-96.png" id="ojo" onclick="eye();">
                    </div>
                    <div id="aparte">
                        <h6>Or continue with</h6>
                        <button><img src="../src/google.png" alt=""></button>
                    </div>

                </div>
                <div id="img-ctn">
                    <h5>Profile Picture</h5>
                    <div id="img-container"><img class="grande" src="../src/user.png" alt="user_image" id="img-preview">
                    </div>
                    <label for="img_i" class="Upload">Upload image
                        <i class="fa-solid fa-cloud-arrow-up white_i"></i>
                        <input type="file" id="img_i" accept=".jpg,.png" name="image"  onchange="vista_preliminar(event), validar()">
                    </label>
                    <div id="warning"></div>
                    <div id="flex-lines">
                        <div class="line"></div>
                        <p>O</p>
                        <div class="line"></div>
                    </div>
                    <h5 class="primo">Select Avatar</h5>
                    <img class="img_chiqitas" src="../src/user.png" alt="">
                    <img class="img_chiqitas" src="../src/user.png" alt="">
                    <img class="img_chiqitas" src="../src/user.png" alt="">
                    <img class="img_chiqitas" src="../src/user.png" alt="">
                </div>


                <button onclick="register()" id="boton" name="register" type="submit">
                    <h6>Register</h6>
                </button>
            </form>

            <?php
            include("../php/register_db_vb.php");
            ?>
        </div>
        <img id="Ovalo_2" src="../src/login.png">
    </div>
</body>
<script src="../js/preview.js"></script>
</html>