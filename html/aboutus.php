<?php
require_once("../php/interface.php");
require_once("../php/cone.php");
require_once("../php/methods.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Rules.css" />
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/aboutus.css">
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
        <div class="wrapper">
            <div class="row">
                <div class="image-section">
                    <img src="../src/about.jpg">
                </div>
                <div class="content">
                    <h1>Sobre Nosotros</h1>
                    <h2>Virtual Books</h2>
                    <p>
                        Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem
                        Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un
                        impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de
                        textos y los mezcló
                    </p>

                </div>
            </div>
            <div class="row">
                <div class="content">
                    <h2> Mision</h2>
                    <p>
                        Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem
                        Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un
                        impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de
                        textos y los mezcló
                    </p>

                    <h2> vision</h2>
                    <p>
                        Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem
                        Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un
                        impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de
                        textos y los mezcló
                    </p>
                </div>
                <div class="image-section">
                    <img src="../src/mision.png">
                </div>
            </div>

        </div>
    </main>
    <?php
    require_once("../html/footer.php");
    ?>

</body>