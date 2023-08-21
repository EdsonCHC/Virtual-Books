<?php
require_once("../php/interface.php");
require_once("../php/cone.php");
require_once("../php/methods.php");
session_start();
$obj = new métodosUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Rules.css" />
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/help.css">
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/alertify.css">

    <title>Ayuda</title>
</head>

<body>
    <?php
    require_once("../html/header.php");
    ?>
    <main>
        <?php
        require_once("../html/aside.php");
        ?>
        <div class="flex">
            <div class="img">
                <img src="../src/logo.png" alt="fondo" id="fondo" />
            </div>
            <div class="container">
                <h1>Preguntas Frecuentes</h1>
                <div class="tab">
                    <input type="radio" name="acc" id="acc1">
                    <label for="acc1">
                        <h2>01</h2>
                        <h3>Pregunta 1 </h3>
                    </label>
                    <div class="content">
                        <p>
                            Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem
                            Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un
                            impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de
                            textos y los mezcló
                        </p>
                    </div>
                </div>
                <div class="tab">
                    <input type="radio" name="acc" id="acc2">
                    <label for="acc2">
                        <h2>02</h2>
                        <h3>Pregunta  2</h3>
                    </label>
                    <div class="content">
                        <p>
                            Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem
                            Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un
                            impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de
                            textos y los mezcló
                        </p>
                    </div>
                </div>
                <div class="tab">
                    <input type="radio" name="acc" id="acc3">
                    <label for="acc3">
                        <h2>03</h2>
                        <h3>Pregunta  3</h3>
                    </label>
                    <div class="content">
                        <p>
                            Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem
                            Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un
                            impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de
                            textos y los mezcló
                        </p>
                    </div>
                </div>
                <div class="tab">
                    <input type="radio" name="acc" id="acc4">
                    <label for="acc4">
                        <h2>04</h2>
                        <h3>Pregunta 4 </h3>
                    </label>
                    <div class="content">
                        <p>
                            Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem
                            Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un
                            impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de
                            textos y los mezcló
                        </p>
                    </div>
                </div>
            </div>

        </div>










    </main>
    <?php
    require_once("../html/footer.php");
    ?>

</body>