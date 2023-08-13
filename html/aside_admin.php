<aside class="admin">
    <div id="home_admin">
        <h2 class="title_aside">Virtual Books Admin</h2>
        <nav id="books-nav">
            <li><i class="fa-solid fa-house"></i>
                <a href="../html/index_admin.php" class="link" data-section="AsideA" data-value="con">Contenido</a>
                <span> ></span>
            </li>
            <li>
                <i class="fa-solid fa-database"></i>
                <a href="../html/catalog_filter.php" class="link" data-section="AsideA" data-value="cat">Catálogos</a>
                <span> ></span>
            </li>
            <li>
                <i class="fa-solid fa-user"></i>
                <a href="#" class="link" data-section="AsideA" data-value="ges">Gestionar</a>
                <span> ></span>
            </li>
        </nav>
    </div>
    <div id="settings_admin">
    <div id="trad" onclick="toggleTrad()" >
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
        <a href="" class="link"><i class="fa-sharp fa-solid fa-circle-info"></i><p  data-section="AsideA" data-value="doc"> Documentación</p></a>
        <a href="" class="link"><i class="fa-sharp fa-solid fa-circle-info"></i><p  data-section="AsideA" data-value="help">Ayuda</P></a>
        <a href="../php/log_out.php" class="link"><i class="fa-solid fa-right-from-bracket"></i> <P  data-section="AsideA" data-value="cs">Cerrar Sesión</P></a>
    </div>
</aside>
<script src="../js/trad.js"></script>
<script src="../js/toggle.js"></script>
<script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>