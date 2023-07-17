<?php
require_once("../php/interface.php");
require_once("../php/cone.php");
require_once("../php/methods.php");

$id = $_GET['id'];
$obj = new métodosUser();
$sql = "SELECT * FROM resource WHERE id = $id";
$row = $obj->showData($sql);
if ($row->rowCount() > 0) {
  $row->setFetchMode(PDO::FETCH_ASSOC);
  $info = $row->fetch();
} else {
  echo "404 not found";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/Rules.css">
  <link rel="stylesheet" href="../css/libro.css">
  <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">

  <!-- Fonts and Boostrap-->
  <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/alertify.css">

  <title>Libro</title>
</head>

<body>
  <?php
  require_once("../html/header.php")
    ?>
  <main>
    <?php
    require_once("../html/aside.php");
    ?>
    <div id="book">
      <div id="container">
        <div id="imgContainer">
          <img src="<?php echo $info['img'] ?>" alt="libro-imagen">
        </div>
        <div id="book-info">
          <div id="author-info">
            <h3>
              <?php echo $info['name'] ?>
            </h3>
            <h5>
              <?php echo $info['author'] ?>
            </h5>
            <h5>Tipo:
              <?php echo $info['type'] ?>
            </h5>
            <h5>Categoría:
              <?php echo $info['category'] ?>
            </h5>
          </div>
          <div id="description">
            <h3>Descripción</h3>
            <p>
              <?php echo $info['description'] ?>
            </p>
          </div>
          <div id="buttons">
            <a href="" class="book-link "><i class="fa-sharp fa-solid fa-book-open-reader"></i> Leer</a>
            <a href="" class="book-link "><i class="fa-solid fa-plus"></i> Añadir al area de lectura</a>
            <a href="" class="book-link down"><i class="fa-solid fa-download"></i> Descargar</a>
          </div>
        </div>
      </div>
      <div id="more-books">
        <h2>Libros Similares</h2>
        <div id="similar-books">
          <?php
          $cat = $info['category'];
          $sql = "SELECT id, img FROM resource WHERE category = '$cat' AND id != '$id'";
          $row2 = $obj->showData($sql);
          if ($row->rowCount() > 0) {
            $row->setFetchMode(PDO::FETCH_ASSOC);
            while ($info = $row2->fetch()) {
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
    </div>
  </main>
  <?php
  require_once("../html/footer.php");
  ?>
</body>

</html>