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
    try {
        $stmt = $obj->showData($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $name = $row['name'];
            $lastName = $row['lastName'];
            $email = $row['email'];
            $pass = $row['password'];
            $img = $row['img'];
        }
    } catch (PDOException $e) {
        die("Ha ocurrido un error" . $e->getMessage());

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
            <div>

            </div>
            <div id="part1">
                <h3 data-section="account" data-value="info">Información Personal</h3>
                <div class="dataUser">
                    <div class="dataInp">
                        <div class="name">
                            <label data-section="account" data-value="names">Nombres
                            </label>
                            <input type="text" class="inputs" value="<?php echo $name; ?>" readonly>
                        </div>
                        <div class="name">
                            <label data-section="account" data-value="Lnames">Apellidos
                            </label>
                            <input type="text" class="inputs" value="<?php echo $lastName; ?>" readonly>
                        </div>
                        <div class="name">
                            <label data-section="account" data-value="email">Correo Electrónico

                            </label>
                            <input type="text" class="inputs" value="<?php echo $email; ?>" readonly id="emailVal">
                        </div>
                    </div>
                    <div class="dataImg">
                        <div class="img">
                            <label data-section="account" data-value="img">Imagen de perfil
                            </label>
                            <img src="<?php echo $img['img']; ?>" alt="user-icon">
                            <input type="hidden" id="imgData" value="<?php echo $img['img']; ?>">
                        </div>
                        <div class="btnPart">
                            <div class="userUpdate">
                                <label>
                                    <button class="btnUpdate" id="btnUpdate">
                                        <i class="fa-solid fa-pen-to-square white_i"></i>
                                        <p data-section="account" data-value="count">Cuenta</p>
                                    </button>
                                </label>
                            </div>
                            <div class="userUpdate">
                                <label>
                                    <button class="btnDelete" id="btnDelete">
                                        <i class="fa-solid fa-trash white_i"></i>
                                        <p data-section="account" data-value="count1">Cuenta</p>
                                    </button>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <dialog id="updateDialog">
                    <form enctype="multipart/form-data" class="form" id="form-diag">
                        <h4 data-section="account" data-value="Upload">Actualiza tu cuenta</h4>
                        <hr>
                        <div class="content_form">
                            <label for="title" class="form_text" data-section="account"
                                data-value="Nombres">Nombres</label>
                            <input type="text" id="name" class="inputs" autocomplete="off">
                        </div>
                        <div class="content_form">
                            <label for="autor" class="form_text" data-section="account"
                                data-value="Apellidos">Apellidos</label>
                            <input type="text" id="lastName" class="inputs" autocomplete="off">
                        </div>
                        <div class="content_form">
                            <label for="autor" class="form_text" data-section="account" data-value="Correo">Correo
                                Electrónico</label>
                            <input type="email" id="email" class="inputs" autocomplete="off">
                        </div>
                        <div class="content_form">
                            <label for="autor" class="form_text" data-section="account" data-value="Contra">Contraseña
                                Actual</label>
                            <input type="password" id="oldPass" class="inputs" autocomplete="off" required>
                        </div>
                        <div class="content_form">
                            <label for="img_i" class="src" data-section="account" data-value="imagen">Imagen</label>
                            <input type="file" id="img_i" accept=".jpg,.png" onchange="vista_preliminar(event), validar()">
                            <div id="img-container"><img class="grande" src="../src/user.png" alt="user_image"
                                    id="img-preview">
                            </div>
                            <div id="warning" style="color: red; font-size: 1.5rem;"></div>
                        </div>
                        <div class="btnPart">
                            <button id="btn-update" data-section="account" data-value="actualizar">Actualizar</button>
                            <button type="button" id="cancel-btn" data-section="account"
                                data-value="cancelar">Cancelar</button>
                        </div>
                    </form>
            </div>
        </div>
    </main>
    <script>
        document.querySelector("#btnUpdate").addEventListener("click", () => {
            document.querySelector("dialog").showModal();
        });

        document.querySelector("#cancel-btn").addEventListener("click", () => {
            document.querySelector("dialog").close();
        });
    </script>
    <?php
    require_once("../html/footer.php");
    ?>
    <script src="../js/preview.js"></script>
    <script src="../js/j_query.js"></script>
    <script src="../js/alertify.js"></script>
    <script src="../js/acc.js"></script>


</body>

</html>