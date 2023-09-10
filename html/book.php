<?php
session_start();
require_once("../php/methods.php");

$id = $_GET['id'];
$id_rec = $_GET['id'];
$obj = new MétodosUser();

try {
  $sql = "SELECT * FROM resource WHERE id = '$id'";
  $row = $obj->showData($sql);
  if ($row->rowCount() > 0) {
    $info = $row->fetch(PDO::FETCH_ASSOC);
  } else {
    header("Location: ../html/error404.php");
  }
} catch (PDOException $e) {
  die("Error " . $e->getMessage());
}

//Mostrar comentarios
try {
  $sql = "SELECT c.description, c.valuation, u.name, u.img FROM comment c INNER JOIN `user` u on c.id_c = u.id WHERE c.id_rec = $id";
  $datos = $obj->showData($sql);
  $datos->setFetchMode(PDO::FETCH_ASSOC);
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
  <link rel="stylesheet" href="../css/Rules.css">
  <link rel="stylesheet" href="../css/book.css">
  <link rel="stylesheet" href="../css/alertify.css">
  <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
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
      <div id="container" data-id="<?php echo $info['id']; ?>">
        <div id="imgContainer">
          <img src="<?php echo $info['img'] ?>" alt="libro-imagen">
        </div>
        <div id="book-info">
          <div id="titleBook">
            <h3>
              <?php echo $info['name'] ?>
            </h3>
          </div>
          <div id="authorBook">
            <h4>Autor </h4>
            <p>
              <?php echo $info['author'] ?>
            </p>
          </div>
          <div id="typeBook">
            <h4 data-section="book" data-value="tipo">Tipo</h5>
              <p>
                <?php echo $info['type'] ?>
              </p>
          </div>
          <div id="cateBook">
            <h4 data-section="book" data-value="categ">Categoría</h5>
              <p>
                <?php echo $info['category'] ?>
              </p>
          </div>
          <div id="descriptionBook">
            <h4 data-section="book" data-value="desc">Descripción</h3>
              <p>
                <?php echo $info['description'] ?>
              </p>
          </div>
          <div id="buttons">
            <div class="<?php esconderV2(); ?>">
              <p data-section="book" data-value="need-log" style="color: red;">Debes iniciar iniciar sesión para acceder a este libro</p>
            </div>
            <div class="btnRead">
              <a href="../html/read.php?id=<?php echo $info['id'] ?>" class="book-link <?php esconder(); ?>">
                <i class="fa-sharp fa-solid fa-book-open-reader"></i>
                <p data-section="book" data-value="leer">Leer</p>
              </a>
            </div>
            <div id="btnFav" class="<?php esconder(); ?>">
            <input type="hidden" value="<?php echo $_SESSION['user'][0]?>" id="id_u_input">
              <?php
              $id_r = $info['id'];
              $sql = "SELECT * FROM shelf WHERE id_r = '$id_rec'";
              $stmt = $obj->showData($sql);
              $isInFavorites = $stmt->fetchColumn() > 0;
              if ($isInFavorites) {
                echo '<div id="delFav" class="book-link active">
                          <i class="fa-solid fa-trash" id="icon-fav"></i>
                          <p data-section="book" data-value="fav">Favoritos</p>
                      </div>';
              } else {
                echo '<div id="addFav" class="book-link inactive">
                  <i class="fa-solid fa-plus" id="icon-fav"></i>
                  <p data-section="book" data-value="fav">Favoritos</p>
                </div>';
              }
              ?>
            </div>
            <div class="btnDown <?php esconder(); ?>">
              <a href="<?php echo $info['src'] ?>" class="book-link down" download>
                <i class="fa-solid fa-download"></i>
                <p data-section="book" data-value="descargar">Descargar</p>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <h3 data-section="book" data-value="comentarios">Comentarios</h3>
        <?php
        if ($datos->rowCount() > 0) {
          foreach ($datos as $valoraciones) { ?>
            <div id="comments">
              <div id="person">
                <img src="<?php echo $valoraciones['img']; ?>" /></a>
                <p>
                  <?php echo $valoraciones['name']; ?>
                </p>
              </div>
              <div id="comment">
                <div id="text">
                  <p>
                    <?php echo $valoraciones['description']; ?>
                  </p>
                  <p>
                    <?php echo "Puntuación: " . $valoraciones['valuation']; ?>
                  </p>
                </div>
              </div>
            </div>
            <?php
          }
        } else {
          echo "<h6  data-section='book' data-value='com' > Este Libro aun no tiene comentarios</h6>";
        }
        ?>
        <form id="commentForm" class="<?php esconder(); ?>">
          <div id="general_container">
            <input type="hidden" id="id_usuario" value="<?php echo $_SESSION['user'][0]; ?>">
            <input type="hidden" id="id_recurso" value="<?php echo $id_rec; ?>">
            <div id="first_container">
              <div class="linea"></div>
              <div id="post_desc" data-section="book" data-value="hablar">
                <textarea autocomplete="off" id="texto" rows="5" cols="60"
                  placeholder="¿De qué quieres hablar?"></textarea>
              </div>
              <div id="details_primary_part">
                <h4><label for="valuation" data-section="book" data-value="calificar">Calificar</label></h4>
                <select id="valuation">
                  <option value="Mala" selected data-section="book" data-value="mala">Mala</option>
                  <option value="Buena" data-section="book" data-value="buena">Buena</option>
                  <option value="Excelente" data-section="book" data-value="excelente">Excelente</option>
                </select>
              </div>
              <div id="post_enter" data-section="book" data-value="comentar">
                <input type="submit" value="Comentar">
              </div>
            </div>
          </div>
        </form>

      </div>
      <div id="more-books">
        <h2 data-section="book" data-value="simil">Libros Similares</h2>
        <div class="grid-books">
          <?php
          $category = $info['category'];
          $sql = "SELECT id, name, img from resource where category = '$category' AND id != '$id_rec' LIMIT 4";
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
    </div>

  </main>
  <?php
  require_once("../html/footer.php");
  ?>
  <script src="../js/j_query.js"></script>
  <script src="../js/alertify.js"></script>
  <script src="../js/valcoment.js"></script>
  <script src="../js/fav.js"></script>
  <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>

</body>

</html>