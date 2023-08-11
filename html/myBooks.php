<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Rules.css" />
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/myBooks.css" />

    <!-- Fonts and Boostrap-->
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/alertify.css">

    <title>Mis Libros</title>
</head>

<body>
    <?php
    require_once("../html/header.php");
    ?>
    <main>
        <?php
        require_once("../html/aside.php");
        ?>
        <div id="content">
            <h2 data-section="MyBooks" data-value="book">Mis Libros</h2>
            <div class="categoria">
                <div class="flex-books">
                    <a href=""><img src="../img/Rectangle 1412.png" alt="" /></a>
                    <a href=""><img src="../img/Rectangle 1412.png" alt="" /></a>
                    <a href=""><img src="../img/Rectangle 1412.png" alt="" /></a>
                    <a href=""><img src="../img/Rectangle 1412.png" alt="" /></a>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once("../html/footer.php");
    ?>
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
    <script src="../js/toggle.js"></script>
</body>

</html>