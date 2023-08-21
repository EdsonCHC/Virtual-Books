<?php
if (isset($_SESSION['admin'])) {
    header("Location: ../html/login.php");
}

require_once("../php/interface.php");
require_once("../php/cone.php");
require_once("../php/methods.php");
$obj = new MétodosAdmin();
?>
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/Rules.css" />
    <link rel="stylesheet" href="../css/index_admin.css" />
    <link rel="stylesheet" href="../css/alertify.css">
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>

    <title>Inicio Admin</title>
</head>

<body>
    <main>
        <?php
        require_once("../html/aside_admin.php");
        ?>
        <div id="content">
            <h4 data-section="indexA" data-value="bien">Bienvenido</h4>
            <div class="grid-content">
                <div class="element e1">
                    <div class="flex-element">
                        <h5 data-section="indexA" data-value="recien">Recién agregados</h5>
                        <div class="btn-div" data-section="indexA" data-value="cambio">
                            <a href="../html/catalog_filter.php"><input class="btn" type="button" value="Catalogo"></a>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="grid-books">
                            <?php
                            $sql = "SELECT id, name, img from resource Limit 7";
                            $row = $obj->showData($sql);
                            if ($row->rowCount() > 0) {
                                $row->setFetchMode(PDO::FETCH_ASSOC);
                                while ($info = $row->fetch()) {
                                    ?>
                                    <div class="resourse">
                                        <a href="../html/book.php?id=<?php echo $info["id"] ?>">
                                            <div class="book-container">
                                                <img src="<?php echo $info["img"]; ?>" alt="no funciona xd">
                                                <p class="textRes">
                                                    <?php echo $info["name"]; ?>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                </div>
                <div class="e2">
                    <h5 data-section="indexA" data-value="estad">Estadística de Usuarios</h5>
                </div>
                <div class="element e3">
                    <div class="flex-element">
                        <h5 data-section="indexA" data-value="coment">Comentarios</h5>
                        <div class="btn-div" data-section="indexA" data-value="cambios">
                            <input class="btn" type="button" value="Agregar">
                            <input class="btn" type="button" value="Ver todos">
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </main>
    <script src="../js/trad.js"></script>
</body>

</html>