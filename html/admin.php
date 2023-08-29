<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../html/index.php");
}
require_once("../php/methods.php");
$obj = new MétodosAdmin();

//Mostrar comentarios
try {
    $date = date("Y-m-d");
    $last_date = date("Y-m-d", strtotime($date . " -1 day"));
    $count = $obj->showData("SELECT COUNT(*) FROM user WHERE dateReg <= '$last_date' AND rol = 0");
    $user_count = $count->fetch();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
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
                                    \ <div class="book-container">
                                        <img src="<?php echo $info["img"]; ?>" alt="no funciona xd">
                                        <p class="textRes">
                                            <?php echo $info["name"]; ?>
                                        </p>
                                    </div>
                                    \ </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="e2">
                    <h5 data-section="indexA" data-value="estad">Nuevos Usuarios</h5>
                    <h4>
                        <?php echo $user_count[0]; ?>
                    </h4>
                </div>
                <div class="element e3">
                    <div class="flex-element">
                        <h5 data-section="indexA" data-value="coment">Comentarios</h5>
                    </div>
                    <hr>
                    <div class="contentArticle">
                        <div class="table" id="table">
                            <table id="table_content">
                                <tr>
                                    <th>ID</th>
                                    <th data-section="coment" data-value="description">Description</th>
                                    <th data-section="coment" data-value="valuation">Valuation</th>
                                    <th data-section="coment" data-value="acciones">Acciones</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <script src="../js/preview.js"></Script>
    <script src="../js/j_query.js"></Script>
    <script src="../js/alertify.js"></Script>
    <script src="../js/coment.js"></script>
    <script src="../js/trad.js"></script>
</body>

</html>