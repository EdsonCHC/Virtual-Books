<?php
require_once("../php/functions.php");
require_once("../php/methods.php");

if (isset($_SESSION['user'])) {
  $id = $_SESSION['user']['0'];
  $obj = new MétodosUser();
  $sql = "SELECT img from user where id = $id";
  $fetch = $obj->showData($sql);
  $fetch->setFetchMode(PDO::FETCH_ASSOC);
  $img = $fetch->fetch();
}

?>

<head>
  <link rel="stylesheet" href="../css/Rules.css">
  <link rel="stylesheet" href="../css/alertify.css">
  <script src="../js/j_query.js"></Script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<header>
  <div>
    <a href="../html/index.php"> <img src="../src/logo creaj 2023.png" alt="logo" id="logo" /></a>
  </div>

  <div class="content_description_search">
    <form id="formSearch">
      <div class="content_items">
      <!-- <div class="content_items" data-section="inputs" data-value="search"> -->
        <input type="search" id="search" class="content_items_search" placeholder="Buscar" autocomplete="off">
      </div>
    </form>
    <div id="resResult">
      <table id="containerRes">
        <!-- Aca van los resultados -->
      </table>
    </div>
  </div>


  <div id="log-links">
    <li class="<?php esconderV2(); ?>">
      <a href="../html/login.php" class="link">

        <button class="btnLogin" data-section="header" data-value="sesiónIni">
          <!-- <i class="fa-solid fa-user" style="color: #19191a;"></i> -->
          <span>Iniciar Sesión</span></button>
      </a>
    </li>

  </div>
  <div id="user" class="<?php esconder(); ?>">
    <i class="fa-regular fa-bell" onclick="toggleMenu()" id="close"></i>
    <a href="../html/account.php">
      <img src="<?php echo $img['img']; ?>" alt="user-icon" /></a>
    <div id="notisMenu" class="notis">
      <div id="notis-info">
        <h4 data-section="header" data-value="not">
          Notificaciones
        </h4>
        <nav id="notis-nav">
          <?php
          $obj = new MétodosUser();
          $sql = "SELECT * FROM resource ORDER BY id DESC limit 5";
          $row = $obj->showData($sql);
          if ($row->rowCount() > 0) {
            while ($not = $row->fetch(PDO::FETCH_ASSOC)) {
              ?>
              <li><a href="../html/book.php?id=<?php echo $not["id"] ?>" class="notisLink">
                  <h5 data-section="header" data-value="public">Se ha publicado:</h5>
                  <h5>
                    <p>
                      <?php echo $not['name']; ?>
                    </p>
                  </h5>
                </a></li>

              <?php
            }
          }
          ?>
        </nav>
      </div>
    </div>
  </div>
  <script src="../js/searchRes.js"></script>
</header>