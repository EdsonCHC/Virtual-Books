<?php

//Poner la conexion real
$conex_VB = new mysqli('localhost', 'root', '', 'virtual-books');

$email = $_POST['email'];
$contraseña = $_POST['contraseña']; 


if (isset($_POST['Send'])) {
    if (strlen($_POST['email']) >= 1 && strlen($_POST['contraseña']) >= 1) {

        $validar_login = mysqli_query($conex_VB, "SELECT * FROM usuario WHERE Email='$email' and Contraseña='$contraseña'");
        if (mysqli_num_rows($validar_login) > 0) {
            // $data = $validar_login->fetch_assoc();
            session_start();
            echo "<script>
            alert('A iniciado sesión correctamente');
            window.location = '../html/index.php';
          </script>";

          exit;
        }
 
            // $validar_meca = mysqli_query($connex, "SELECT * FROM mecánico WHERE correo='$correo' and contra='$contra'");
            // if (mysqli_num_rows($validar_meca) > 0) {
            //     $data = $validar_meca->fetch_assoc();
            //     session_start();
            //     $_SESSION['meca'] = array();
            //     $_SESSION['meca'][0] = $data['id_mecánico'];
            //     $_SESSION['meca'][1] = $data['nombre'];
            //     echo "<script>
            //     alert('A iniciado sesión correctamente');
            //     window.location = '../html/index_mecanico.php';
            //   </script>";
            // }

            // $validar_admin = mysqli_query($connex, "SELECT * FROM admin WHERE correo='$correo' and contra='$contra'");
            // if (mysqli_num_rows($validar_admin) > 0) {
            //     $data = $validar_admin->fetch_assoc();
            //     session_start();
            //     $_SESSION['admin'] = array();
            //     $_SESSION['admin'][0] = $data['id'];
            //     $_SESSION['admin'][1] = $data['nombre'];
            //     echo "<script>
            //     alert('A iniciado sesión correctamente');
            //     window.location = '../html/admin.php';
            //   </script>";
            // }
        
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
