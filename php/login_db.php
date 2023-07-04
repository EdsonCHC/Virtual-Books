<?php

//Poner la conexion real
$connex = new mysqli("localhost", "root", "", "mecánica_automotriz");

if (isset($_POST['Send'])) {
    if (strlen($_POST['email']) >= 1 && strlen($_POST['password']) >= 1) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $validar_login = mysqli_query($connex, "SELECT * FROM cliente WHERE correo='$correo' and contra='$contra'");
        if (mysqli_num_rows($validar_login) > 0) {
            $data = $validar_login->fetch_assoc();
            session_start();
            $_SESSION['user'] = array();
            $_SESSION['user'][0] = $data['id_cliente'];
            $_SESSION['user'][1] = $data['nombre'];
            echo "<script>
            alert('A iniciado sesión correctamente');
            window.location = '../html/index.php';
          </script>";
        }

        $validar_meca = mysqli_query($connex, "SELECT * FROM mecánico WHERE correo='$correo' and contra='$contra'");
        if (mysqli_num_rows($validar_meca) > 0) {
            $data = $validar_meca->fetch_assoc();
            session_start();
            $_SESSION['meca'] = array();
            $_SESSION['meca'][0] = $data['id_mecánico'];
            $_SESSION['meca'][1] = $data['nombre'];
            echo "<script>
            alert('A iniciado sesión correctamente');
            window.location = '../html/index_mecanico.php';
          </script>";
        }

        $validar_admin = mysqli_query($connex, "SELECT * FROM admin WHERE correo='$correo' and contra='$contra'");
        if (mysqli_num_rows($validar_admin) > 0) {
            $data = $validar_admin->fetch_assoc();
            session_start();
            $_SESSION['admin'] = array();
            $_SESSION['admin'][0] = $data['id'];
            $_SESSION['admin'][1] = $data['nombre'];
            echo "<script>
            alert('A iniciado sesión correctamente');
            window.location = '../html/admin.php';
          </script>";
        }else{
            echo '
            <script>
                alert("Datos incorrectos");
            </script>
            ';
        }

    } else {
        echo '
        <script>
            alert("Aun hay campos sin llenar")
        </script>
        ';
    }
}
