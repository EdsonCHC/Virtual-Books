<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Libro</title>
  <link rel="stylesheet" href="../css/Rules.css">
  <link rel="stylesheet" href="../css/libro.css">
  <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
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
          <img src="../src/alicia.jpg" alt="libro-imagen">
        </div>
        <div id="book-info">
          <div id="author-info">
            <h3>Name Book</h3>
            <h5>Author Name</h5>
            <h5>Fecha</h5>
            <h5>Lorem</h5>
          </div>
          <div id="description">
            <h3>Descripción</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Error, quia ipsum. Nihil, ducimus dolor! Minus
              illo neque culpa error ullam!
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam exercitationem voluptatibus aliquid
              reiciendis consectetur necessitatibus ratione, non doloremque illum vel?
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
        <a href=""><img src="../src/alicia.jpg" alt="libro-img"></a>
        <a href=""><img src="../src/alicia.jpg" alt="libro-img"></a>
        <a href=""><img src="../src/alicia.jpg" alt="libro-img"></a>
        <a href=""><img src="../src/alicia.jpg" alt="libro-img"></a>
        <a href=""><img src="../src/alicia.jpg" alt="libro-img"></a>
        <a href=""><img src="../src/alicia.jpg" alt="libro-img"></a>
        <a href=""><img src="../src/alicia.jpg" alt="libro-img"></a>
        <a href=""><img src="../src/alicia.jpg" alt="libro-img"></a>
      </div>
    </div>
    </div>
  </main>
  <?php
  require_once("../html/footer.php");
  ?>
</body>

</html>