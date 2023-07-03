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
        <div id="content">
            <h4>Welcome</h4>
            <div class="grid-content">
                <div class="element e1">
                    <div class="flex-element">
                        <h5>Recien agregados</h5>
                        <div class="btn-div">
                            <input class="btn" type="button" value="Agregar">
                            <input class="btn" type="button" value="Catalogo">
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="e2">
                    <h5>Estadistica de Usuarios</h5>
                </div>
                <div class="element e3">
                    <div class="flex-element">
                        <h5>Comentarios</h5>
                        <div class="btn-div">
                            <input class="btn" type="button" value="Agregar">
                            <input class="btn" type="button" value="Ver todos">
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </main>
</body>

</html>