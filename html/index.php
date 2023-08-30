<?php
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
  <link rel="stylesheet" href="../css/index.css" />
  <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
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
      <div class="welcome">
        <div class="text-welcome">
          <h2>Bienvenido a Virtual Books</h2>
          <p>Lugar donde se encuentran tus libros favoritos y donde viajas a nuevos mundos!!</p>
        </div>
        <div class="icon-welcome">
          <img src="../src/logo.png" alt="">
        </div>
        <div class="img-welcome">
          <img src="../src/img/vista-superior-disposicion-libros.jpg" alt="">
        </div>
      </div>


      <h2 class="title-content" data-section="index" data-value="cont">Contenido</h2>
      <div class="categoría">
        <a href="" class="tag-link">
          <h3 class="subTitle-content">
            <a href="../html/category.php?category=Literatura" class="link" data-section="index"
              data-value="lit">Literatura</a>
          </h3>
        </a>
        <div class="grid-books">
          <?php
          $sql = "SELECT id, name, img, description from resource where category = 'Literatura' Limit 7";
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
      </div>
      <div class="categoría">
        <a href="" class="tag-link">
          <h3 class="subTitle-content"><a href="../html/category.php?category=Ciencia" class="link" data-section="index" data-value="cien">Ciencia</a></h3>
        </a>
        <div class="grid-books">
          <?php
          $sql = "SELECT id, name, img from resource where category = 'Ciencia' LIMIT 7";
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
      </div>
      <div class="categoría">
        <a href="" class="tag-link">
          <h3 class="subTitle-content"><a href="../html/category.php?category=Economía" class="link" data-section="index" data-value="eco">Economía</a></h3>
        </a>
        <div class="grid-books">
          <?php
          $sql = "SELECT id, name, img from resource where category = 'Economía' LIMIT 7";
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
      </div>
      <div class="categoría">
        <a href="" class="tag-link">
          <h3 class="subTitle-content"><a href="../html/category.php?category=Física" class="link" data-section="index" data-value="fis">Física</a></h3>
        </a>
        <div class="grid-books">
          <?php
          $sql = "SELECT id, name, img from resource where category = 'Física' Limit 7";
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
        <div class="categoría">
          <a href="" class="tag-link">
            <h3 class="subTitle-content"><a href="../html/category.php?category=Historia" class="link" data-section="index" data-value="histo">Historia</a>
            </h3>
          </a>
          <div class="grid-books">
            <?php
            $sql = "SELECT id, name, img from resource where category = 'Historia' limit 7";
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
        </div>
        <h5 id="more"><a href="" class="link" data-section="index" data-value="mas">Mirar Más...</a></h5>
      </div>
  </main>
  <?php
  require_once("../html/footer.php");
  ?>

  <script src="../js/searchRes.js"></script>
  <script src="../js/j_query.js"></Script>
</body>

</html>