<?php
require_once('../php/cone.php');
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
    <a href="http://localhost/Virtual-Books/html/index.php"> <img src="../src/logo creaj 2023.png" alt="logo"
        id="logo" /></a>
  </div>
  <form action="">
    <label for="searchInput" id="labelInput">
      <button type="submit">
        <i class="fa-solid fa-magnifying-glass" id="open-notis"></i>
      </button>
      <div data-section="header" data-value="search">
        <input type="search" id="searchInput" placeholder="Buscar Un Libro" autocomplete="off">
      </div>
    </label>
  </form>


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
        <h4>
          Notificaciones
        </h4>
        <nav id="notis-nav">
          <li><a href="" class="link">
              <h5>Se ha publicado un nuevo libro en la sección deportes</h5>
            </a></li>
          <li><a href="" class="link">
              <h5>Lorem.</h5>
            </a></li>
        </nav>
      </div>
    </div>
  </div>
</header>