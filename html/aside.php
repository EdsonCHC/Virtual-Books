<aside>
    <div id="home">
        <nav id="books-nav">
            <li><i class="fa-solid fa-house"></i>
                <a href="../html/index.php" class="link" data-section="asideU" data-value="IUser">Inicio</a>
                <span> ></span>
            </li>
            <li>
                <i class="fa-solid fa-book-open-reader"></i>
                <a href="../html/myBooks.php" class="link" data-section="asideU" data-value="ALUser">Area de lectura</a>
                <span> ></span>
            </li>
        </nav>
    </div>
    <div id="settings">
        <div id="trad" onclick="toggleTrad()">
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
        <a href="" class="link" data-section="asideU" data-value="Hp"><i class="fa-sharp fa-solid fa-circle-info"></i>
            Ayuda</a>
        <li class="<?php esconder(); ?>"><a href="../php/log_out.php" class="link"><i
                    class="fa-solid fa-right-from-bracket"></i>
                <p data-section="asideU" data-value="closes">Cerrar Sesión</p>
            </a></li>
    </div>
</aside>

<script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>