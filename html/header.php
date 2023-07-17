<?php
session_start();
include_once("../php/functions.php");
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
      <input type="search" id="searchInput" placeholder="Buscar Un Libro" autocomplete="off" />
    </label>
  </form>

  <div id="log-links">
    <ul>
      <li class="<?php esconderV2(); ?>"><a href="http://localhost/Virtual-Books/html/register.php" class="link">
          <p>Registrarse</p>
        </a></li>
      <li class="<?php esconderV2(); ?>"><a href="http://localhost/Virtual-Books/html/login.php" class="link">
          <p>Iniciar Sesión</p>
        </a></li>
      <li class="<?php esconder(); ?>">
        <h3>Bienvenido 
          <?php echo $_SESSION['user'][1]; ?>
        </h3>
      </li>
    </ul>
  </div>

  <div id="user">
    <i class="fa-regular fa-bell" onclick="toggleMenu()" id="close"></i>
    <a href="../html/account.php"><img src="../src/user.png" alt="user-icon" /></a>
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

<script src="../js/toggle.js"></script>