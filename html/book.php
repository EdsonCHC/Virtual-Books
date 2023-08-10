<?php
session_start();

require_once("../php/interface.php");
require_once("../php/cone.php");
require_once("../php/functions.php");
require_once("../php/methods.php");
require_once("../html/header.php");
session_start();

$id = $_GET['id'];
$obj = new métodosUser();
$sql = "SELECT * FROM resource WHERE id = $id";
$row = $obj->showData($sql);
if ($row->rowCount() > 0) {
  $row->setFetchMode(PDO::FETCH_ASSOC);
  $info = $row->fetch();
} else {
  header("Location: ../html/error404.php");
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
$obj = new Comentario();
$sql = "SELECT comment.description, comment.valuation, user.name FROM comment INNER JOIN user on comment.id_c = user.id WHERE comment.id_rec = $id";
$fetch = $obj->showData($sql);
$fetch->setFetchMode(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/Rules.css">
  <link rel="stylesheet" href="../css/libro.css">
  <link rel="stylesheet" href="../css/create.css" />
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
            <a href="../html/read.php?id=<?php echo $info['id'] ?>" class="book-link "><i
                class="fa-sharp fa-solid fa-book-open-reader"></i> Leer</a>
            <div id="add-fav" class="book-link">
              <i class="fa-solid fa-plus"></i> Añadir ah Favorito
              <input type="hidden" value="<?php echo $id ?>" id="input-id">
            </div>
            <a href="<?php echo $info['src'] ?>" class="book-link down" download><i class="fa-solid fa-download"></i>
              Descargar</a>
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
      <div class="<?php esconder(); ?>">


        <div id="content">
          <h2>Crear posteo</h2>


          <form method="POST" onsubmit="return validarFormulario() ">
            <div id="general_conteiner">
              <div id="first_conteiner">
                <div id="post_desc">
                  <textarea autocomplete="off" name="texto" rows="26" cols="100" placeholder="¿De qué quieres hablar?"></textarea>
                </div>
                <div id="details_primary_part">
                  <h4><label for="valuation">Puntuacion</label></h4>
                  <select name="valuation">
                    <option value="Mala" selected>Mala</option>
                    <option value="Buena">Buena</option>
                    <option value="Excelente">Excelente</option>
                  </select>
                </div>
                <div id="post_enter">
                  <input type="submit" value="Postear">
                </div>
              </div>


          </form>
          <div id="second_conteiner">
            <div id="tittle_second_conteiner">
              <h3>Otros Posteos</h3>
            </div>
            <div id="coments">
              <?php


              foreach ($fetch as $valoraciones) { ?>




                <h5>
                  <?php echo "Autor: " . $valoraciones['name']; ?>
                </h5>


                <a>
                  <?php echo "Puntuacion: " . $valoraciones['valuation']; ?>
                </a>
                <P>
                  <?php echo "Descripcion: " . $valoraciones['description']; ?>


                </p>


                <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <?php
      ?>

      <script>
        let year = document.getElementById('year');
        let y = new Date().getFullYear();
        year.innerHTML = y;
      </script>
      <script src="../js/toggle.js"></script>
    </div>
  </main>
  <?php
  require_once("../html/footer.php");
  ?>
  <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
</body>


</html>