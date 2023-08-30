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
    <link rel="stylesheet" href="../css/alertify.css">
    <link rel="stylesheet" href="../css/styleab.css">
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">



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
        <div id="ctn">
            <div id="title">
                <h1 data-section="About" data-value="Ab">Sobre Nosotros </h1>
            </div>

            <div id="vb-ctn">
                <div class="text">
                    <h2 data-section="About" data-value="vb">
                        Virtual Books
                    </h2>
                    <p data-section="About" data-value="vbS">
                        Virtual Books es un sitio web mediente el cual se le es posible a los usuarios
                        poder obtener libros, revistas, tesis, etc. De manera rápida y sencilla, permitiendo
                        asi que pueda disfrutar de sus libros en cualquier momento y lugar del camino.
                    </p>
                </div>

                <!-- <div id="imagensctn">
                    <div class="imagenes">
                        <img src="../src/img/f1.jpeg">
                        <img src="../src/img/f2.jpeg">
                        <img src="../src/img/f3.jpeg">
                    </div>
                </div> -->
            </div>

            <div class="MV">
                <div class="M">
                    <h5>
                        <p data-section="About" data-value="M">Misión</p>
                    </h5>
                    <p data-section="About" data-value="Prh">
                        Promover el habito de la lectura y permitirle a los usuarios disfrutar de los libros
                        que mas les gusta en cualquier lugar y en cualquier momento, ofreciendoles siempre
                        una gran variedad de recursos.
                    </p>
                </div>
                <div class="V">
                    <h5>
                        <p data-section="About" data-value="V">Visión</p>
                    </h5>
                    <p data-section="About" data-value="Ss">
                        Ser siempre uno de los mejores sitios web con referencia al ambito de libros y lectura,
                        manteniendo la preferencia de nuestros usuarios por mantenernos innovando y ofreciendo de la
                        mejor maneranuevos
                        servivios para que ellos puedan seguir disfrutando
                        de su lectura
                    </p>
                </div>
            </div>

            <div id="imagenesctn">
                <div class="imagen"><img src="../src/img/f4.jpg"></div>
                <div class="imagen"><img src="../src/img/f5.jpg"></div>
                <div class="imagen"><img src="../src/img/f6.jpg"></div>
            </div>
        </div>
    </main>
    <?php
    require_once("../html/footer.php");
    ?>

</body>