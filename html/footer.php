<footer>
    <h6>&copy; <span id="year"></span> Todos los derechos reservados Crea-J 2023</h6>
</footer>

<script>
    let year = document.getElementById('year');
    let y = new Date().getFullYear();
    year.innerHTML = y;
</script>