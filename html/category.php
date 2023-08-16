<?php
extract($_GET);
if(isset($category)){
    $cat = strtolower($category);
    if($cat != 'literatura' && $cat != 'ciencia'/*mas condiciones*/){
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
            <h1>
                <?php echo $category; ?>
                <input type="hidden" id="cat-provider" value="<?php echo $category; ?>">
            </h1>
            <div id="content">

                <!-- aquí van los libros -->


            </div>
            <button id="btn-cargar">Cargar más</button>
        </div>

    </main>
    <?php
    require_once("../html/footer.php");
    ?>
    <script src="../js/j_query.js"></script>
    <script src="../js/scroll.js"></script>
</body>

</html>