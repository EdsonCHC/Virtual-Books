<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spectral:wght@200&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../css/Registers.css">
    <title>Register</title>
</head>
    <body>

        <div id="mother-ctn">
            <div id="title-ctn">
                <h1>Virtual Books</h1>
                <H6>Register</H6>
            </div>

            <img  id="Ovalo_1" src="../src/login.png">

            <div id="flex-lines">            
                <div id="line"></div>
            </div>




            <div id="form-ctn">
                    <form action="" method="post" enctype="multipart/form-data"> 
                        <div id="text-ctn">
                            <label for=""><h6>First Name</h6></label>
                            <input type="text" name="nombres" placeholder="Narendra Singh">
                            <label for=""><h6>Last Name</h6></label>
                            <input type="text" name="apellidos" placeholder="Narendra Singh" >
                            <label for=""><h6>E-mail</h6></label>
                            <input type="email" name="email" placeholder="Username@gmail.com">
                            <label for=""><h6>Password</h6></label>
                            <input type="password" name="contraseña" placeholder="Password">
                            <label for=""><h6>Confirm Password </h6></label>
                            <input type="password" name="contraseña_C" placeholder="Password Confirm" id="input2">
                            <div id="eye"> <!-- boton-->
                            <img  src="../src/img/icons8-eye-96.png" width="32px" id="ojo" >
                            </div>
                            <div id="aparte">
                                <h6>Or continue with</h6>
                                <button><img src="../src/google.png" alt=""></button>
                            </div>
                        
                        </div>
                        <div id="img-ctn">
                            <h5>Profile Picture</h5>
                            <div><img grande src="../src/user.png" alt=""><br>
                            </div>
                            <!-- <div>
                                <span>Upload image <img src="../src/img/icons8-upload-to-cloud-96.png"></span>
                            <input Upload></input>
                            </div> -->
                            <button Upload>Upload image <img src="../src/img/icons8-upload-to-cloud-96.png" alt=""></button>
                            <h5 primo>Select Avatar</h5>
                            <img class="img_chiqitas" src="../src/user.png" alt="">
                            <img class="img_chiqitas" src="../src/user.png" alt="">
                            <img class="img_chiqitas" src="../src/user.png" alt="">
                            <img class="img_chiqitas" src="../src/user.png" alt="">
                        </div>

                    
                        <button onclick="register()" id="boton" name="register" type="submit"><h6>Register</h6></button>
                    </form>

                    <?php
                     include("../php/register_db_vb.php");
                     ?>

            </div>
            <img id="Ovalo_2" src="../src/login.png">
        </div>

        <!-- <button onclick="mostrar()">MOSTRAR</button> -->

    </body>


<Script>
        var ojo =document.getElementById('ojo');
        var input =document.getElementById('input2');
        ojo.addEventListener("click", function(){
            if(input.type == "password"){
            input.type = "text"
            ojo.style.opacity = 0.2


        }else{
            input.type = "password"
            ojo.style.opacity = 0.8

        }
        })


</Script>

    <!-- <script type="text/javascript">
        function register(){}
            swal('Realizado', 'registrado','success');
    </script> -->







    
</html>

