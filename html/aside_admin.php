<aside class="admin">
    <div id="home_admin">
        <h2 class="title_aside">Virtual Books Admin</h2>
        <nav id="books-nav">
            <li class="btnAside">
                <i class="fa-solid fa-house"></i>
                <a href="../html/admin.php" class="btnLink" data-section="AsideA" data-value="con">
                    Contenido</a>
            </li>
            <li class="btnAside">
                <i class="fa-solid fa-database"></i>
                <a href="../html/catalog_filter.php" class="btnLink" data-section="AsideA"
                    data-value="cat">Catálogos</a>
            </li>
        </nav>
    </div>
    <div id="settings_admin">
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
            <a href="../php/log_out.php" class="btnLink">
                <i class="fa-solid fa-right-from-bracket"></i>
                <P data-section="AsideA" data-value="cs">Cerrar Sesión</P>
            </a>
        </li>
    </div>
</aside>
<script src="../js/toggle.js"></script>
<script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>