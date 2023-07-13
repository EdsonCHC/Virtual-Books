<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Rules.css" />
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/catalogfilter.css" />
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
    <title>Catalog Admin</title>
</head>

<body>
    <main>
        <?php
        require_once("../html/aside_admin.php");
        ?>
        <div id="content">

            <h4>Bienvenido</h4>
            <div class="content_table">
                <div class="content_tittle">
                    <img src="../src/img/data.png" alt="" />
                    <h6>Catálogos/Artículos de catálogo</h6>
                </div>
                <div class="content_description">
                    <div class="content_description_text">
                        <p>
                            Artículos
                        </p>
                        <p>
                            Administre los catálogos de su biblioteca aquí. 
                        </p>
                    </div>
                    <div class="content_description_search">
                        <div class="content_items">
                            <select name="menu" class="content_items_menu">
                                <option selected disabled>Default</option>
                                <option>Id</option>
                                <option>Titulo</option>
                                <option>Tipo</option>
                                <option>Autor</option>
                                <option>Editor</option>
                            </select>
                            <input type="text" name="buscar" class="content_items_search">
                            <input type="submit" value="Buscar" class="content_items_button_search">
                        </div>
                    </div>
                </div>
                <div class="flex-element">
                    <button class="btn" id="oP">Añadir</button>
                    <button class="btn" >Refrescar</button>
                </div>
                <div class="table">
                    <table>
                        <tr>
                            <th> ID</th>
                            <th>titulo </th>
                            <th>Tipo </th>
                            <th>Autor </th>
                            <th>Editor</th>
                            <th>Categoría</th>
                            <th>Acciones </th>
                        </tr>
                        <tr>
                            <td>12345678</td>
                            <td>Ema (Collins Classics)</td>
                            <td>Books </td>
                            <td>Austen,Jane</td>
                            <td>Si</td>
                            <td>HarperCollins Publisher</td>
                            <td>
                                <div class="flex-element">
                                    <div class="actions">
                                        <button><img src="../src/img/eye-svgrepo-com.png"></button>
                                    </div>
                                    <div class="actions">
                                        <button><img src="../src/img/documents-svgrepo-com.png"></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <dialog>
        <form  method="POST">
        <input type="text" name="Nombre" placeholder="Titulo">
        <input type="text" name="Autor" placeholder="Autor">
        <select name="Tipo">
            <option value="" selected disabled>Tipo</option>
            <option value="Revista">Revista Académica</option>
            <option value="Libro">Libro</option>
            <option value="Tesis">Tesis</option>
        </select>
        <select name="cate">
            <option value="" selected disabled>Categoría</option>
            <option value="Revista">Revista Académica</option>
            <option value="Libro">Libro</option>
            <option value="Tesis">Tesis</option>
        </select>
        <button type="submit">OK</button>
        </form>
        </dialog>
    </main>
    <script>
        document.querySelector("#oP").addEventListener("click", ()=>{
            document.querySelector("dialog").showModal();
        })
    </script>
</body>
</html>