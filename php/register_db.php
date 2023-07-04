<?php
$conex_VB = new mysqli('localhost', 'root', '', 'virtual-books');

    // $email = trim($_POST['email']);

    // if (buscarRepetido($email) == 1) {
    //     echo "<script> alert('El Correo ingresado ya existe, por favor ingresa otro...');
    //     window.location.href='../html/register.php';
    //     </script>";
    // }else{
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
    
            $resultado = mysqli_query($conex_VB, $consulta);
    
            if ($resultado) {
                ?>
                    <script>
                        alert("Te registraste correctamente");
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
        }
    }
//}

// function buscarRepetido($correo)
// {
//     $connex = new mysqli("localhost", "root", "", "virtual-books");
//     $search = $connex->prepare("SELECT * FROM cliente WHERE correo= ?");
//     $search->bind_param("s", $correo);
//     $search->execute();
//     $result = $search->get_result();

//     if ($result->num_rows > 0) {
//         return 1;
//     } else {
//         return 0;
//     }

// }

?>