<aside>
    <div id="home">
        <nav id="books-nav">
            <li class="btnAside">
                <i class="fa-solid fa-house"></i>
                <a href="../html/index.php" class="btnLink" data-section="asideU" data-value="IUser">Inicio</a>
            </li>
            <li class="<?php esconder(); ?> btnAside">
                <i class="fa-solid fa-book-open-reader"></i>
                <a href="../html/myBooks.php" class="btnLink" data-section="asideU" data-value="ALUser">
                    Area de lectura</a>
            </li>
            <li class="btnAside">
                <i class="fa-solid fa-house"></i>
                <a href="../html/aboutus.php" class="btnLink" data-section="asideU" data-value="nosotros">Sobre Nosotros</a>
            </li>
        </nav>
    </div>
    <div id="settings">
        <div id="trad" class="btnAside" onclick="toggleTrad()">
            <i class="fa-solid fa-globe"></i>
            <p data-section="asideU" data-value="Idiom">Idioma</p>
            <div id="flags" class="trad ">
                <div class="flag-cont" data-language="en">
                    <img src="../src/BanderaIngles.png" alt="en-flag">
                </div>
                <div class="flag-cont" data-language="es">
                    <img src="../src/BanderaEspañol.jpg" alt="es-flag">
                </div>
            </div>
        </div>
        <li class="btnAside">
            <a href="../html/help.php" class="btnLink" data-section="asideU" data-value="Hp">
                <i class="fa-sharp fa-solid fa-circle-info"></i>
                Ayuda</a>
        </li>
        <li class="<?php esconder(); ?> btnAside">
            <a href="../php/log_out.php" class="btnLink">
                <i class="fa-solid fa-right-from-bracket"></i>
                <p data-section="asideU" data-value="closes">Cerrar Sesión</p>
            </a>
        </li>
    </div>
</aside>

<script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>