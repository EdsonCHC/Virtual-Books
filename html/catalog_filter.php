<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Rules.css" />
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/catalogfilter.css" />

    <!-- Fonts and Boostrap-->
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/alertify.css">

    <title>Admin Catálogo</title>
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
                        <a>
                            Administre los catálogos de su biblioteca aquí. </a>
                    </div>
                    <div class="content_description_search">
                        <div class="content_items">
                            <select name="menu" class="content_items_menu">
                                <option>Default</option>
                                <option>id</option>
                                <option>titulo</option>
                                <option>Número de acceso</option>
                                <option>Teléfono</option>
                                <option>ISBN</option>
                                <option>ISSN</option>
                                <option>Autor</option>
                                <option>Editor</option>
                                <option>Categoria</option>
                                <option>Tags</option>
                                <option>Etiquetas</option>
                                <option>Abstracto</option>
                                <option>descripción</option>

                            </select>
                            <input type="text" name="buscar" class="content_items_search">
                            <input type="submit" value="Buscar" class="content_items_button_search">
                        </div>

                    </div>
                    <input type="submit" value="Agregar" class="content_items_button_add">
                </div>
                <div class="flex-element">
                    <input class="btn" type="button" value="Smart add">
                    <input class="btn" type="button" value="Añadir manualmente">
                    <input class="btn" type="button" value="Importar elementos">
                    <input class="btn" type="button" value="Autor">
                    <input class="btn" type="button" value="Editor">
                    <input class="btn" type="button" value="Actualizar">

                </div>
                <div class="table">
                    <table>
                        <tr>
                            <th> ID</th>
                            <th>titulo </th>
                            <th>Tipo </th>
                            <th>Autor </th>
                            <th>Editor </th>
                            <th>Teléfono </th>
                            <th>Copias </th>
                            <th>Acciones </th>

                        </tr>
                        <tr>
                            <td>12345678</td>
                            <td>Ema (Collins Classics)</td>
                            <td>Books </td>
                            <td>Austen,Jane</td>
                            <td>HarperCollins Publisher</td>
                            <td>5325242424249242424243236</td>
                            <td>
                                <div class="copies">
                                    <a>7/8</a>
                                </div>
                            </td>
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
    </main>
</body>

</html>