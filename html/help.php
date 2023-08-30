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
                <h1 data-section="faqs" data-value="PregF">Preguntas Frecuentes</h1>
                <div class="tab">
                    <input type="radio" name="acc" id="acc1">
                    <label for="acc1">
                        <h2>01</h2>
                        <h3 data-section="faqs" data-value="como">¿Cómo puedo acceder a los libros y recursos de Virtual Books? </h3>
                    </label>
                    <div class="content">
                        <p data-section="faqs" data-value="unaV">
                            Una vez, logueado y registrado el usuario tendra la posibilidad de visualizar los libros 
                            en la pagina principal, o tiene la posibilidad de buscarlos por su nombre en el buscador 
                            en la parte superior. En dado caso se encuentre en una interfaz diferente a la pagina de inicio
                            puede buscar la opcion (Inicio) en el lado izquierdo de la página.
                        </p>
                    </div>
                </div>
                <div class="tab">
                    <input type="radio" name="acc" id="acc2">
                    <label for="acc2">
                        <h2>02</h2>
                        <h3 data-section="faqs" data-value="Pue">¿Puedo acceder desde cualquier lugar y en cualquier momento?</h3>
                    </label>
                    <div class="content">
                        <p data-section="faqs" data-value="Si">
                            Si! Puedes Disfrutar de Virtual Books y de tus libros favoritos en cualquier parte del camino 
                            y en cualquier momento; Podras continuar con tu historia justo donde la dejaste.
                        </p>
                    </div>
                </div>
                <div class="tab">
                    <input type="radio" name="acc" id="acc3">
                    <label for="acc3">
                        <h2>03</h2>
                        <h3 data-section="faqs" data-value="que">¿Qué herramientas necesito para leer libros digitales en Virtual Books?</h3>
                    </label>
                    <div class="content">
                        <p data-section="faqs" data-value="para">
                                Para ser capaz de hacerlo, necesitaras el navegador web de tu preferencia; !Pero no te preocupes¡
                                pues Virtual Books es compatible con la mayoria de navegadores web. Ademas de esto necesitaras conexión 
                                a internet si aun no has descargado tu libro.
                        </p>
                    </div>
                </div>
                <div class="tab">
                    <input type="radio" name="acc" id="acc4">
                    <label for="acc4">
                        <h2>04</h2>
                        <h3 data-section="faqs" data-value="comoF">¿Cómo funcionan las opciones de lectura? </h3>
                    </label>
                    <div class="content">
                        <p data-section="faqs" data-value="tengas"> 
                            Una vez tengas elegído el libro que deseas leer, tienes la opcion de leerlo desde la plataforma mediante conexión a internet
                            o descargarlo de manera PDF y disfrutar del libro sin necesidad de conexión, tambien puedes agregarlo a favoritos para leerlo
                            mas tarde si asi lo deseas
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