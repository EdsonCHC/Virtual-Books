<?php
// if (isset($_SESSION['admin'])){
//   header("Location: ../html/admin.php");
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/Rules.css" />
  <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/index.css" />

  <!-- Fonts and Boostrap-->
  <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/alertify.css">

  <title>Inicio</title>
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
      <h2>Contenido</h2>
      <div class="categoria">
        <a href="" class="tag-link">
          <h3><a href="" class="link">Literatura</a></h3>
        </a>
        <div class="grid-books">
          <a href="../html/read.php"><img src="../src/alicia.jpg" alt="" /></a>
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
        </div>
      </div>
      <div class="categoria">
        <a href="" class="tag-link">
          <h3><a href="" class="link">Ciencia</a></h3>
        </a>
        <div class="grid-books">
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
        </div>
      </div>
      <div class="categoria">
        <a href="" class="tag-link">
          <h3><a href="" class="link">Economía</a></h3>
        </a>
        <div class="grid-books">
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
        </div>
      </div>
      <div class="categoria">
        <a href="" class="tag-link">
          <h3><a href="" class="link">Física</a></h3>
        </a>
        <div class="grid-books">
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
          <a href=""><img src="../src/alicia.jpg" alt="" /></a>
        </div>
      </div>
      <h5 id="more"><a href="" class="link">Mirar Más...</a></h5>
    </div>
  </main>
  <?php
  require_once("../html/footer.php");
  ?>
</body>

</html>