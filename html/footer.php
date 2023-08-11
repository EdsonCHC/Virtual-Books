<footer>
    <div id="trad" onclick="toggleTrad()">
        <i class="fa-solid fa-globe" ></i>
        <p>Idioma</p>
        
        <div id="flags" class="trad ">
        <div class="flag-cont" data-language="en">
            <img src="../src/BanderaIngles.png" alt="en-flag">
        </div>
        <div class="flag-cont" data-language="es">
            <img src="../src/BanderaEspañol.jpg" alt="es-flag">
        </div>
    </div>
    </div>
    <h6 data-section="push" data-value="footer">&copy; <span id="year"></span> Todos los derechos reservados Crea-J 2023
    </h6>
</footer>
<script>
    let year = document.getElementById('year');
    let y = new Date().getFullYear();
    year.innerHTML = y;
</script>

<script src="../js/toggle.js"></script>
<script src="../js/trad.js"></script>