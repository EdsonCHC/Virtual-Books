<?php
// session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Rules.css" />
    <link rel="stylesheet" href="../css/alertify.css">
    <link rel="stylesheet" href="../css/ab-us.css">
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
    <title>Nosotros</title>
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
            <h1 data-section="About" data-value="Ab">Sobre Nosotros </h1>
            <div id="vb-ctn">
                <div id="text">
                    <h2>
                        Virtual Books
                    </h2>
                    <p data-section="About" data-value="vbS">
                        Virtual Books es un sitio web mediante el cual se le es posible a los usuarios
                        poder obtener libros, revistas, tesis, etc. De manera rápida y sencilla, permitiendo
                        asi que pueda disfrutar de sus libros en cualquier momento y lugar del camino.
                    </p>
                </div>
            </div>
            <div class="img-ctn">
                <img src="../src/img/f1.jpeg" class="ab-img">
                <img src="../src/img/f2.jpeg" class="ab-img">
                <img src="../src/img/f3.jpg" class="ab-img">
            </div>
            <div id="MV">
                <div id="M">
                    <h5 data-section="About" data-value="M">
                        Misión
                    </h5>
                    <p data-section="About" data-value="Prh">
                        Promover el habito de la lectura y permitirle a los usuarios disfrutar de los libros
                        que mas les gusta en cualquier lugar y en cualquier momento, ofreciéndoles siempre
                        una gran variedad de recursos.
                    </p>
                </div>
                <div id="V">
                    <h5 data-section="About" data-value="V">
                        Visión
                    </h5>
                    <p data-section="About" data-value="Ss">
                        Ser siempre uno de los mejores sitios web con referencia al ámbito de libros y lectura,
                        manteniendo la preferencia de nuestros usuarios por mantenernos innovando y ofreciendo de la
                        mejor manera nuevos servicios para que ellos puedan seguir disfrutando
                        de su lectura
                    </p>
                </div>
            </div>

            <div class="img-ctn">
                <img src="../src/img/f4.jpg" class="ab-img">
                <img src="../src/img/f5.jpg" class="ab-img">
                <img src="../src/img/f6.jpg" class="ab-img">
            </div>
        </div>
    </main>
    <?php
    require_once("../html/footer.php");
    ?>

</body>