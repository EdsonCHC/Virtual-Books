<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/errorStyle.css">
    <title>404</title>
</head>

<body>
    <img id="Ovalo_1" src="../src/login.png">
    <img id="Ovalo_2" src="../src/login.png">

    <div id="form-ctn">

        <div class="ctn">
            <p>404</p>
            <h2>UPS!</h2>
        </div>

        <div class="ctn">
            <h4 data-section="error" data-value="sorry">Lo sentimos la página que buscas no se encontró</h4>
        </div>

        <div class="ctn">
            <button type="button">
                <a href="../html/index.php" data-section="error" data-value="back">
                    Regresar al inicio
                    <i class="fa-sharp fa-solid fa-house white_i"></i>
                </a>
            </button>
        </div>
    </div>
    <div id="trad" onclick="toggleTrad()">
        <i class="fa-solid fa-globe"></i>
        <p data-section="asideU" data-value="Idiom">Idioma</p>

        <div id="flags" class="trad ">
            <div class="flag-cont" data-language="en">
                <img src="../src/BanderaIngles.png" alt="en-flag">
            </div>
            <div class="flag-cont" data-language="es">
                <img src="../src/BanderaEspañol.jpg" alt="es-flag">
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
    <script src="../js/toggle.js"></script>
    <script src="../js/trad.js"></script>
</body>

</html>