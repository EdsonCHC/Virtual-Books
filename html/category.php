<?php
extract($_GET);
if (isset($category)) {
    $cat = strtolower($category);
    if ($cat != 'literatura' && $cat != 'ciencia' && $cat != 'física' && $cat != 'historia' && $cat != 'economía') {
        header('Location: ../html/error404.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/category.css">
    <title>
        <?php echo $category; ?>
    </title>
</head>

<body>
    <?php
    require_once("../html/header.php");
    ?>
    <main>
        <?php
        require_once("../html/aside.php");
        ?>
        <div id="container">
            <h3 class="subTitle-content">
                <?php echo $category; ?>
            </h1>
            <div class="grid-books">
                <?php
                $sql = "SELECT id, name, img from resource where category = '$category'";
                $row = $obj->showData($sql);
                if ($row->rowCount() > 0) {
                    $row->setFetchMode(PDO::FETCH_ASSOC);
                    while ($info = $row->fetch()) {
                        ?>
                        <div class="container">
                            <div class="banner-image">
                                <img src="<?php echo $info["img"]; ?>" alt="no funciona xd">
                            </div>
                            <div class="banner-text">
                                <h3>
                                    <?php echo $info["name"]; ?>
                                </h3>
                            </div>
                            <div class="button-wrapper">
                                <a href="../html/book.php?id=<?php echo $info["id"] ?>">
                                    <button class="btn fill">Acerca</button>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <!-- <button id="btn-cargar">Cargar más</button> -->
        </div>

    </main>
    <?php
    require_once("../html/footer.php");
    ?>
    <script src="../js/j_query.js"></script>
    <script src="../js/scroll.js"></script>
</body>

</html>