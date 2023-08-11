<?php
session_start();
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
  header("Location: ../html/error404.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/Rules.css" />
  <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/read.css" />

  <!-- Fonts and Boostrap-->
  <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/alertify.css">

  <title>Lectura</title>
</head>

<body>
  <?php
  require_once("../html/header.php");
  ?>
  <main>
    <?php
    require_once("../html/aside.php");
    ?>
    <!-- Aqui van los libros -->
    <div id="content">
      <object id="book" data="<?php echo $info['src'] ?>#toolbar=0&view=fitB" type="application/pdf">
      </object>
      <div class="btnPart">
        <a href="../html/book.php? id= <?php echo $info['id'] ?> ">
          <button class="btnLogin"><span>Regresar</span></button>
        </a>
      </div>
    </div>
  </main>
  <?php
  require_once("../html/footer.php");
  ?>
</body>

</html>