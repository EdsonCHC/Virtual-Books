<?php
require_once("../php/interface.php");
require_once('../php/cone.php');
require_once("../php/functions.php");
require_once("../php/methods.php");
session_start();

if ($_SESSION['user']) {
    $id = $_SESSION['user']['0'];
    $obj = new MétodosUser();
    $sql = "SELECT name, lastName, email, password, img FROM user WHERE id = $id";
    $stmt = $obj->showData($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $name = $row['name'];
        $lastName = $row['lastName'];
        $email = $row['email'];
        $pass = $row['password'];
        $img = $row['img'];
    } else {
        die("Ha ocurrido un error");
    }
} else {
    header("Location: ../html/error404.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/Account.css">
    <link rel="stylesheet" href="../css/Rules.css">
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/alertify.css">

    <title>Cuenta</title>
</head>

<body>
    <?php
    require_once("../html/header.php")
        ?>
    <main>
        <?php
        require_once("../html/aside.php");
        ?>
        <div id="content">
            <div id="part1">
                <h3>Información Personal</h3>
                <div class="dataUser">
                    <div>
                        <div class="name">
                            <label>Nombres
                                <input type="text" class="inputs" value="<?php echo $name; ?>" readonly>
                            </label>
                        </div>
                        <div class="name">
                            <label>Apellidos
                                <input type="text" class="inputs" value="<?php echo $lastName; ?>" readonly>
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="name">
                            <label>Correo Electrónico
                                <input type="text" class="inputs" value="<?php echo $email; ?>" readonly>
                            </label>
                        </div>
                        <div class="name">
                            <div class="userUpdate">
                                <label> Actualizar
                                    <button class="btnUpdate" id="btnUpdate">Actualizar Datos</button>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="img">
                        <label>Imagen de perfil
                            <img src="<?php echo $img['img']; ?>" alt="user-icon" />
                        </label>
                    </div>
                </div>
                <dialog>
                    <form method="POST" enctype="multipart/form-data" class="form">
                        <h4>Actualizar tus datos!!</h4>
                        <hr>
                        <div class="content_form">
                            <label for="title" class="form_text">Nombres</label>
                            <input type="text" id="name" class="inputs" name="name" autocomplete="off">
                        </div>
                        <div class="content_form">
                            <label for="autor" class="form_text">Apellidos</label>
                            <input type="text" id="lastName" class="inputs" name="lastName" autocomplete="off">
                        </div>
                        <div class="content_form">
                            <label for="autor" class="form_text">Correo Electrónico</label>
                            <input type="email" id="email" class="inputs" name="email" autocomplete="off">
                        </div>
                        <div class="content_form">
                            <label for="autor" class="form_text">Contraseña Actual</label>
                            <input type="password" id="oldPass" class="inputs" name="oldPass" autocomplete="off">
                        </div>
                        <div class="content_form">
                            <label for="autor" class="form_text">Nueva Contraseña</label>
                            <input type="password" id="newPass" class="inputs" name="newPass" autocomplete="off">
                        </div>
                        <div class="content_form">
                            <label for="imagen" class="src">Imagen</label>
                            <input type="file" id="imagen" accept="Image/*" name="img"
                                onchange="vista_preliminar(event), validar()">
                            <div id="img-container"><img class="grande" src="../src/img/icons8-book-100.png"
                                    alt="user_image" id="img-preview">
                            </div>
                        </div>
                        <div class="btnPart">
                            <button type="submit" name="update">Actualizar</button>
                            <button type="button"><a href="../html/account.php">Cancelar</a></button>
                        </div>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $name = $_POST["name"];
                            $lastName = $_POST["lastName"];
                            $email = $_POST["email"];
                            $oldPass = $_POST["oldPass"];
                            $newPass = $_POST["newPass"];
                            $nombreImg = $_FILES['img']['name'];
                            $rutaImg = $_FILES['img']['tmp_name'];
                            $img = "../src/img/" . $nombreImg;
                            move_uploaded_file($rutaImg, $img);

                            $obj = new DataBase();
                            $DBH = $obj->connect();
                            if ($oldPass === $pass) {
                                $sql = "UPDATE user SET name='$name', lastName='$lastName', email='$email', password='$pass', img='$img' WHERE id = $id";
                                $result = $DBH->query($sql);
                                if ($result) {
                                    echo "<script>
                                            alert('Datos actualizados');
                                            window.location.href = '../html/account.php';
                                        </script>";
                                } else {
                                    echo "<script>
                                            alert('Ha ocurrido un error');
                                            window.location.href = '../html/account.php';
                                        </script>";
                                }
                                $DBH = null;
                            }else{
                                echo "<script>
                                alert('Contraseña incorrecta');
                                window.location.href = '../html/account.php';
                            </script>";
                            }
                        }
                        ?>
                    </form>
                </dialog>
            </div>
        </div>
    </main>
    <script>
        document.querySelector("#btnUpdate").addEventListener("click", () => {
            document.querySelector("dialog").showModal();
        })
    </script>
    <script src="../js/preview.js">
    </script>
</body>

</html>