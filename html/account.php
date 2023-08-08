<?php
require_once("../php/interface.php");
require_once('../php/cone.php');
require_once("../php/functions.php");
require_once("../php/methods.php");
if (isset($_SESSION['user'])) {
    $id = $_SESSION['user']['0'];
    $obj = new MétodosUser();
    $sql = "SELECT `name`, `lastName`, `email`, `password`, `img` FROM `user` WHERE id = ?";
    $stmt = $obj->showData($sql);
    $stmt->execute([$id]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $name = $row['name'];
        $lastName = $row['lastName'];
        $email = $row['email'];
        $pass = $row['password'];
        $img = $row['img'];
    }
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

    <!-- Fonts and Boostrap-->
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
                            <?php
                            $id = $_SESSION['user']['0'];
                            $sql = "SELECT name from user where id = $id";
                            $row = $obj->showData($sql);
                            if ($row->rowCount() > 0) {
                                $row->setFetchMode(PDO::FETCH_ASSOC);
                                while ($info = $row->fetch()) {
                                    ?>
                                    <label>Nombres
                                        <input type="text" class="inputs" value="<?php echo $info["name"];
                                        ; ?>">
                                    </label>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="name">
                            <?php
                            $id = $_SESSION['user']['0'];
                            $sql = "SELECT lastName from user where id = $id";
                            $row = $obj->showData($sql);
                            if ($row->rowCount() > 0) {
                                $row->setFetchMode(PDO::FETCH_ASSOC);
                                while ($info = $row->fetch()) {
                                    ?>
                                    <label>Apellidos
                                        <input type="text" class="inputs" value="<?php echo $info["lastName"]; ?>">
                                    </label>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div>
                        <div class="name">
                            <?php
                            $id = $_SESSION['user']['0'];
                            $sql = "SELECT email from user where id = $id";
                            $row = $obj->showData($sql);
                            if ($row->rowCount() > 0) {
                                $row->setFetchMode(PDO::FETCH_ASSOC);
                                while ($info = $row->fetch()) {
                                    ?>
                                    <label>Correo Electrónico
                                        <input type="text" class="inputs" value="<?php echo $info["email"]; ?>">
                                    </label>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="name">
                            <?php
                            $id = $_SESSION['user']['0'];
                            $sql = "SELECT password from user where id = $id";
                            $row = $obj->showData($sql);
                            if ($row->rowCount() > 0) {
                                $row->setFetchMode(PDO::FETCH_ASSOC);
                                while ($info = $row->fetch()) {
                                    ?>
                                    <label>Contraseña
                                        <input type="password" class="inputs" Value="<?php echo $info["password"]; ?>">
                                    </label>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="img">
                        <label>Imagen de perfil
                            <img src=" <?php echo $img['img']; ?>" alt="user-icon" /></a>
                        </label>
                    </div>
                </div>
                <dialog>
                    <form method="POST" enctype="multipart/form-data" class="form">
                        <h4>Actualiza tu cuenta</h4>
                        <hr>
                        <div class="content_form">
                            <label for="title" class="form_text">Nombres</label>
                            <input type="text" id="name" class="inputs" name="name">
                        </div>
                        <div class="content_form">
                            <label for="autor" class="form_text">Apellidos</label>
                            <input type="text" id="lastName" class="inputs" name="lastName">
                        </div>
                        <div class="content_form">
                            <label for="autor" class="form_text">Correo Electrónico</label>
                            <input type="email" id="email" class="inputs" name="email">
                        </div>
                        <div class="content_form">
                            <label for="autor" class="form_text">Contraseña Actual</label>
                            <input type="password" id="oldPass" class="inputs" name="oldPass" required>
                        </div>
                        <div class="content_form">
                            <label for="autor" class="form_text">Nueva Contraseña</label>
                            <input type="password" id="newPass" class="inputs" name="newPass" required>
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
                            if (isset($_POST['update'])) {
                                $name = $_POST["name"];
                                $lastName = $_POST["lastName"];
                                $email = $_POST["email"];
                                $pass = $_POST["newPass"];
                                $nombreImg = $_FILES['img']['name'];
                                $rutaImg = $_FILES['img']['tmp_name'];
                                $img = "../src/img/" . $nombreImg;

                                $obj = new DataBase();
                                $DBH = $obj->connect();
                                $sql = "UPDATE user SET name='$name', lastName='$lastName', email='$email', password='$pass', img='$img' WHERE id = $id";
                                if ($DBH->query($sql) === TRUE) {
                                    echo "<script>
                                                alert('Datos actualizados 1');
                                                window.location.href = '../html/account.php';
                                            </script>";
                                } else {
                                    #He de mencionar que el que captura es este porque todavia no se pero es por la conección
                                    echo "<script>
                                                alert('Datos actualizados');
                                                window.location.href = '../html/account.php';
                                            </script>";
                                }
                                $DBH = null;
                            }
                        }
                        ?>
                    </form>
                </dialog>
                <dialog id="dialogDelete">
                    <form method="POST" enctype="multipart/form-data" class="form">
                        <h4>Elimina tu cuenta</h4>
                        <hr>
                        <div class="btnPart">
                            <button type="submit" name="delete">Eliminar</button>
                            <button type="button"><a href="../html/account.php">Cancelar</a></button>
                        </div>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST['delete'])) {
                                $obj = new DataBase();
                                $DBH = $obj->connect();
                                $sql = "DELETE FROM user WHERE id = $id";
                                if ($DBH->query($sql) === TRUE) {
                                    session_destroy();
                                    echo "<script>
                                                alert('Cuenta Eliminada');
                                                window.location.href = '../html/index.php';
                                            </script>";
                                    header("Location: ../html/index.php");
                                } else {
                                    session_destroy();
                                    echo "<script>
                                                alert('Cuenta eliminada');
                                                window.location.href = '../html/index.php';
                                            </script>";
                                }
                                $DBH = null;
                            }
                        }
                        ?>
                    </form>
                </dialog>
            </div>
            <div id="part2">
                <h3></h3>
                <div class="dataUser">
                    <div class="userUpdate">
                        <label>
                            <button class="btnUpdate" id="btnUpdate">Actualizar Cuenta</button>
                        </label>
                    </div>
                    <div class="userUpdate">
                        <label>
                            <button class="btnDelete" id="btnDelete">Eliminar Cuenta</button>
                        </label>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        document.querySelector("#btnUpdate").addEventListener("click", () => {
            document.querySelector("dialog").showModal();
        });
        document.querySelector("#btnDelete").addEventListener("click", () => {
            document.querySelector("#dialogDelete").showModal();
        })
    </script>
    <script src="../js/preview.js">
    </script>
</body>

</html>