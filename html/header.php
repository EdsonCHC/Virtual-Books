<?php
require_once('../php/cone.php');
require_once("../php/interface.php");
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
<header>
  <div>
    <a href="../html/index.php"> <img src="../src/logo creaj 2023.png" alt="logo"
        id="logo" /></a>
  </div>




  <div id="log-links">
    <ul>
      <li class="<?php esconderV2(); ?>"><a href="../html/login.php" class="link">
          <button class="btnLogin" data-section="header" data-value="sesiónIni"><span>Iniciar Sesión</span></button>
        </a></li>
    </ul>
  </div>
  <div id="user" class="<?php esconder(); ?>">
    <i class="fa-regular fa-bell" onclick="toggleMenu()" id="close"></i>
    <a href="../html/account.php">
      <img src="<?php echo $img['img']; ?>" alt="user-icon" /></a>
    <div id="notisMenu" class="notis">
      <div id="notis-info">
        <h4 data-section="header" data-value="not" >
          Notificaciones
        </h4>
        <nav id="notis-nav">
          <?php
          //$id = $_GET['id'];
          $obj = new MétodosUser();
          $sql = "SELECT * FROM resource";
          #La idea es asi
          //$sql = "SELECT * FROM resource WHERE id = $id";
          $row = $obj->showData($sql);
          if ($row->rowCount() > 0) {
            while ($not = $row->fetch(PDO::FETCH_ASSOC)) {
              ?>

              <li><a href="../html/book.php?id=<?php echo $not["id"] ?>" class="notisLink">
                  <h5>Se ha publicado:
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
</header>