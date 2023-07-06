<?php
$conex_VB = new mysqli('localhost', 'root', '', 'vb');
//  $email = trim($_POST['email']);

//     if (buscarRepetido($email) == 1) {
//         echo "<script> alert('El Correo ingresado ya existe, por favor ingresa otro...');
//         window.location.href='../html/register.php';
//         </script>";

//     }else{
    if (isset($_POST['register'])) {     
        if (
            strlen($_POST['nombres']) >= 1 && strlen($_POST['apellidos']) >= 1 && strlen($_POST['email']) >= 1 &&
            strlen($_POST['contraseña']) >= 1 && strlen($_POST['contraseña_C']) >= 1
        ) {
            $nombres = trim($_POST['nombres']);
            $apellidos = trim($_POST['apellidos']);
            $email = trim($_POST['email']);
            $contraseña = trim($_POST['contraseña']);
            $contraseña_C = trim($_POST['contraseña_C']);


    
            $consulta = "INSERT INTO `usuario` (`Nombres`, `Apellidos`, `Email`, `Contraseña`, `contraseña_Confirm`) VALUES ('$nombres','$apellidos','$email','$contraseña','$contraseña_C')";
            $verificacionCorreo = mysqli_query($conex_VB, "SELECT * FROM `usuario` WHERE Email = '$email'" );
            $verificacionPasswords = $contraseña != $contraseña_C;


            if(mysqli_num_rows($verificacionCorreo) > 0){
                echo'
                    <script>
                        alert("Este correo ya existe, por favor elija otro");
                        window.location = "../html/register.php"
                    </script>
                '; 
                exit();
            }

            if($verificacionPasswords){
                echo'
                    <script>
                        alert("Las contraseña no coinciden");
                        window.location = "../html/register.php"
                    </script>
                '; 
                exit();
            }


            $resultado = mysqli_query($conex_VB, $consulta);

             if($resultado) {
                    ?>
                      <script>
                        window.location.href = '../html/login.php';

                        </script>



                    <?php
                } else {
                    ?>
                     <script>
                        alert("Ocurrio un error");
                     </script>
                    <?php
                }
            }else{
                ?>
                <script>
                  alert("Aun hay campos sin llenar");

                  </script>
              <?php
            }

            mysqli_close($conex_VB);

        }
        
    //}


// function buscarRepetido($email)
// {
//     $conex_VB = new mysqli('localhost', 'root', '', 'virtual-books');
//     $search = $conex_VB->prepare("SELECT * FROM usuario WHERE Email= ?");
//     $search->bind_param("s", $email);
//     $search->execute();
//     $result = $search->get_result();

//     if ($result->num_rows > 0) {
//         return 1;
//     } else {
//         return 0;
//     }

// }

?>