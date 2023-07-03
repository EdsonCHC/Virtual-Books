<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Admin</title>
    <link rel="stylesheet" href="../css/Rules.css" />
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/index_admin.css" />
</head>

<body>
    <main>
        <?php
        require_once("../html/aside_admin.php");
        ?>
        <div class="content">
            <h2>Welcome</h2>
            <div class="grid-content">
                <div class="element_1">
                    <div class="flex-element">
                        <h4>Recien agregados</h4>
                        <input class="btn" type="button" value="Agregar">
                        <input class="btn" type="button" value="Catalogo">
                    </div>
                    <hr>
                </div>
                <div class="element_2">
                    <h4>Estadistica de Usuarios</h4>
                    <hr>
                </div>
                <div class="element_3">
                    <div class="flex-element">
                        <h4>Comentarios</h4>
                        <input class="btn" type="button" value="Agregar">
                        <input class="btn" type="button" value="Ver todos">
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php
        require_once("../html/footer.php");
        ?>
    </footer>
</body>

</html>