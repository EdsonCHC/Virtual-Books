<?php
session_start();
require_once("../php/interface.php");
require_once("../php/cone.php");
require_once("../php/methods.php");

$id = $_GET['id'];
$id_rec = $_GET['id'];
$obj = new MétodosUser();

try {
  $sql = "SELECT * FROM resource WHERE id = $id";
  $row = $obj->showData($sql);
  if ($row->rowCount() > 0) {
    $info = $row->fetch(PDO::FETCH_ASSOC);
  } else {
    header("Location: ../html/error404.php");
  }
} catch (PDOException $e) {
  die("Error " . $e->getMessage());
}

//Comentarios
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_recurso = $_GET['id'];
  $id_usuario = $_SESSION['user'][0];

  if (isset($_POST['texto']) && isset($_POST['valuation'])) {
    $texto = $_POST['texto'];
    $valuation = $_POST['valuation'];
    // Verifica si los campos están vacíos
    if (empty($texto) || empty($valuation)) {
      echo '<div class="popup-container" id="popup">
      <span class="close-btn" id="closeButton">&times;</span>
      <p>Por favor, completa todos los campos.
      </p>
      </div>';
    } else {
      $obj = new Comentario();
      $arr = array($texto, $valuation, $id_usuario, $id_recurso);
      $obj->insertData($arr);
      header("Location: book.php?id=$id_recurso");
      exit;
    }
  }
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
            <h5 data-section="book" data-value="tipo">Tipo</h5>
            <p>
              <?php echo $info['type'] ?>
            </p>
          </div>
          <div id="cateBook">
            <h5 data-section="book" data-value="categ">Categoría</h5>
            <p>
              <?php echo $info['category'] ?>
            </p>
          </div>
          <div id="descriptionBook">
            <h3 data-section="book" data-value="desc">Descripción</h3>
            <p>
              <?php echo $info['description'] ?>
            </p>
          </div>
          <div id="buttons">
            <div class="btnRead <?php esconder(); ?>">
              <a href="../html/read.php?id=<?php echo $info['id'] ?>" class="book-link ">
                <i class="fa-sharp fa-solid fa-book-open-reader"></i>
                <p data-section="book" data-value="leer">Leer</p>
              </a>
            </div>
            <div id="btnFav" class="<?php esconder(); ?>">
              <?php
              $obj2 = new DataBase();
              $DBH = $obj2->connect();
              $sql = "SELECT * FROM shelf WHERE id_r = :book_id"; // Corrección aquí
              $stmt = $DBH->prepare($sql);
              $stmt->bindParam(':book_id', $info['id'], PDO::PARAM_INT);
              $stmt->execute();
              $isInFavorites = $stmt->fetchColumn() > 0;
              if ($isInFavorites) {
                echo '<div id="delFav" class="book-link active">
                          <i class="fa-solid fa-trash"></i>
                          <p data-section="book" data-value="fav">Favoritos</p>
                        </div>';
              } elseif (!$isInFavorites) {
                echo '<div id="addFav" class="book-link inactive">
                <i class="fa-solid fa-plus"></i>
                <p data-section="book" data-value="fav">Favoritos</p>
              </div>';
              } else {
                echo '<div id="delFav" class="book-link active">
                <i class="fa-solid fa-trash"></i>
                <p data-section="book" data-value="fav">Favoritos</p>
              </div>';
              }
              ?>
            </div>
            <div class="btnDown">
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
        <form id="commentForm" method="POST" onsubmit="" class="<?php esconder(); ?>">

          <div id="general_container">
            <div id="first_container">
              <div class="linea"></div>

              <div id="post_desc" data-section="book" data-value="hablar">
                <textarea autocomplete="off" name="texto" rows="5" cols="60"
                  placeholder="¿De qué quieres hablar?"></textarea>
              </div>
              <div id="details_primary_part">
                <h4><label for="valuation" data-section="book" data-value="calificar">Calificar</label></h4>
                <select name="valuation">
                  <option value="Mala" selected data-section="book" data-value="mala">Mala</option>
                  <option value="Buena" data-section="book" data-value="buena">Buena</option>
                  <option value="Excelente" data-section="book" data-value="excelente">Excelente</option>
                </select>
              </div>
              <div id="post_enter" data-section="book" data-value="comentar">
                <input type="submit" value="Comentar">
              </div>
            </div>
        </form>
      </div>
    </div>
    <div id="more-books">
      <h2 data-section="book" data-value="simil">Libros Similares</h2>
      <div id="similar-books">
        <?php
        $cat = $info['category'];
        $sql = "SELECT id, img FROM resource WHERE category = '$cat' AND id != '$id' LIMIT 4";
        $row2 = $obj->showData($sql);
        if ($row2->rowCount() > 0) {
          while ($info = $row2->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <a href="../html/book.php?id=<?php echo $info["id"] ?>">
              <img src="<?php echo $info["img"] ?>" alt="book-image">
            </a>
            <?php
          }
        }
        ?>
      </div>
    </div>
  </main>
  <?php
  require_once("../html/footer.php");
  ?>
  <script src="../js/j_query.js"></script>
  <script src="../js/alertify.js"></script>
  <script src="../js/fav.js"></script>
  <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>

</body>

</html>