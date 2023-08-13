<?php
require_once("../php/interface.php");
require_once("../php/cone.php");
require_once("../php/methods.php");
session_start();
$obj = new métodosUser();
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
    <div id="content" >
      <h2 data-section="index" data-value="cont">Contenido</h2>
      <div class="categoría">
        <a href="" class="tag-link">
          <h3><a href="" class="link" data-section="index" data-value="lit">Literatura</a></h3>
        </a>
        <div class="grid-books">
          <?php
          $sql = "SELECT id, img from resource where category = 'Literatura'";
          $row = $obj->showData($sql);
          if ($row->rowCount() > 0) {
            $row->setFetchMode(PDO::FETCH_ASSOC);
            while ($info = $row->fetch()) {
              ?>
              <a href="../html/book.php?id=<?php echo $info["id"] ?>">
                <img src="<?php echo $info["img"] ?>" alt="no funciona xd">
              </a>
            <?php
            }
          }
          ?>
        </div>
      </div>
      <div class="categoría">
        <a href="" class="tag-link">
          <h3><a href="" class="link" data-section="index" data-value="cien">Ciencia</a></h3>
        </a>
        <div class="grid-books">
          <?php
          $sql = "SELECT id, img from resource where category = 'Ciencia' LIMIT 5";
          $row = $obj->showData($sql);
          if ($row->rowCount() > 0) {
            $row->setFetchMode(PDO::FETCH_ASSOC);
            while ($info = $row->fetch()) {
              ?>
              <a href="../html/book.php?id=<?php echo $info["id"] ?>">
                <img src="<?php echo $info["img"] ?>" alt="no funciona xd">
              </a>
            <?php
            }
          }
          ?>
        </div>
      </div>
      <div class="categoría">
        <a href="" class="tag-link">
          <h3><a href="" class="link" data-section="index" data-value="eco">Economía</a></h3>
        </a>
        <div class="grid-books">
          <?php
          $sql = "SELECT id, img from resource where category = 'Economía' LIMIT 5";
          $row = $obj->showData($sql);
          if ($row->rowCount() > 0) {
            $row->setFetchMode(PDO::FETCH_ASSOC);
            while ($info = $row->fetch()) {
              ?>
              <a href="../html/book.php?id=<?php echo $info["id"] ?>">
                <img src="<?php echo $info["img"] ?>" alt="no funciona xd">
              </a>
            <?php
            }
          }
          ?>
        </div>
      </div>
      <div class="categoría">
        <a href="" class="tag-link">
          <h3><a href="" class="link" data-section="index" data-value="fis">Física</a></h3>
        </a>
        <div class="grid-books">
        <?php
          $sql = "SELECT id, img from resource where category = 'Física' LIMIT 5";
          $row = $obj->showData($sql);
          if ($row->rowCount() > 0) {
            $row->setFetchMode(PDO::FETCH_ASSOC);
            while ($info = $row->fetch()) {
              ?>
              <a href="../html/book.php?id=<?php echo $info["id"] ?>">
                <img src="<?php echo $info["img"] ?>" alt="no funciona xd">
              </a>
            <?php
            }
          }
          ?>
        </div>
        <div class="categoría">
        <a href="" class="tag-link">
          <h3><a href="" class="link" data-section="index" data-value="histo">Historia</a></h3>
        </a>
        <div class="grid-books">
        <?php
          $sql = "SELECT id, img from resource where category = 'Historia' LIMIT 5";
          $row = $obj->showData($sql);
          if ($row->rowCount() > 0) {
            $row->setFetchMode(PDO::FETCH_ASSOC);
            while ($info = $row->fetch()) {
              ?>
              <a href="../html/book.php?id=<?php echo $info["id"] ?>">
                <img src="<?php echo $info["img"] ?>" alt="no funciona xd">
              </a>
            <?php
            }
          }
          ?>
        </div>
      </div>
      <h5 id="more"><a href="" class="link" data-section="index" data-value="mas">Mirar Más...</a></h5>
    </div>
  </main>
  <?php
  require_once("../html/footer.php");
  ?>
</body>

</html>