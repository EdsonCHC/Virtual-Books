<?php
include_once("../php/conexion.php");
if (isset($_POST['register'])) {
    $conex = $conex_VB;
    if (
        strlen($_POST['nombres']) >= 1 && strlen($_POST['apellidos']) >= 1 && strlen($_POST['email']) >= 1 &&
        strlen($_POST['contraseña']) >= 1 && strlen($_POST['contraseña_C']) >= 1
    ) {
        $nombres = trim($_POST['nombres']);
        $apellidos = trim($_POST['apellidos']);
        $email = trim($_POST['email']);
        $contraseña = trim($_POST['contraseña']);
        $img = addslashes(file_get_contents($_FILES['image']['tmp_name']));


        $consulta = "INSERT INTO `user` (`name`,`lastName`,`email`,`password`, `img`) VALUES ($nombres,$apellidos,$email,$contraseña,$img)";
        $verificacionCorreo = mysqli_query($conex, "SELECT * FROM `usuario` WHERE Email = '$email'");
        $verificacionPasswords = $contraseña != $contraseña_C;


        if (mysqli_num_rows($verificacionCorreo) > 0) {
            echo '
                    <script>
                        alert("Este correo ya existe, por favor elija otro");
                        window.location = "../html/register.php"
                    </script>
                ';
            exit();
        }
        if ($verificacionPasswords) {
            echo '
                    <script>
                        alert("Las contraseña no coinciden");
                        window.location = "../html/register.php"
                    </script>
                ';
            exit("Las contraseña no coinciden");
        }


        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
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
    } else {
        ?>
        <script>
            alert("Aun hay campos sin llenar");
        </script>
    <?php
    }

    mysqli_close($conex);
}
?>