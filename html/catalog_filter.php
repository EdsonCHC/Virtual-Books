<?php
require_once("../php/methods.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/catalogfilter.css" />
    <link rel="stylesheet" href="../css/Rules.css" />
    <link rel="stylesheet" href="../css/alertify.css">
    <script src="../js/j_query.js"></Script>
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
    <title>Admin Catálogo</title>
</head>

<body>
    <main>
        <?php
        require_once("../html/aside_admin.php");
        ?>
        <div id="content">

            <h4 data-section="catalogo" data-value="Bienvenido">Bienvenido</h4>
            <div class="content_tittle">
                <h6 data-section="catalogo" data-value="catalog">Catálogos/Artículos de catálogo</h6>
            </div>
            <div class="content_table">

                <div class="content_description">
                    <div class="content_description_text">
                        <h6 data-section="catalogo" data-value="articulos">
                            Artículos
                        </h6>
                        <p data-section="catalogo" data-value="administre">
                            Administre los catálogos de su biblioteca aquí.
                        </p>
                        <div class="content_description_search">
                            <form id="search_form">
                                <div class="content_items">
                                    <div>
                                        <label class="searchTitle" data-section="catalogo" data-value="titulos">
                                            Buscar un recurso
                                        </label>
                                        <label class="searchTitle">
                                            <input type="text" name="searchTitle" class="content_items_search">
                                        </label>
                                    </div>
                                    <div>
                                        <table id="search_results">
                                            <!-- Aca van los resultados -->
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="contentArticle">
                    <div class="flex-element">
                        <button class="btn" id="oP" data-section="catalogo" data-value="añadir">Añadir</button>
                    </div>
                    <div class="table" id="table">
                        <table id="table_content">
                            <tr>
                                <th>ID</th>
                                <th data-section="catalogo" data-value="titulo">Titulo </th>
                                <th data-section="catalogo" data-value="tipo">Tipo </th>
                                <th data-section="catalogo" data-value="autor">Autor </th>
                                <th data-section="catalogo" data-value="cate">Categoría</th>
                                <th data-section="catalogo" data-value="acciones">Acciones</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <dialog class="dialogIn">
            <form method="POST" enctype="multipart/form-data" id="form-dialog-insert">
                <h4 data-section="catalogo" data-value="agregar">Agregar Recursos</h4>
                <hr>
                <div class="content_form">
                    <label for="title" class="form_text" data-section="catalogo" data-value="titulo">Titulo</label>
                    <input type="text" id="title" class="inputs" name="name" autocomplete="off">
                </div>
                <div class="content_form">
                    <label for="autor" class="form_text" data-section="catalogo" data-value="autor">Autor</label>
                    <input type="text" id="autor" class="inputs" name="autor" autocomplete="off">
                </div>
                <div class="content_form">
                    <label for="tipo" class="form_text" data-section="catalogo" data-value="tipoR">Tipo de
                        recurso</label>
                    <select id="tipo" class="recurso" name="tipo">
                        <option value="" selected disabled data-section="catalogo" data-value="tipo">Tipo</option>
                        <option value="Revista" data-section="catalogo" data-value="revista">Revista Académica</option>
                        <option value="Libro" data-section="catalogo" data-value="libro">Libro</option>
                        <option value="Tesis" data-section="catalogo" data-value="tesis">Tesis</option>
                    </select>
                </div>
                <div class="content_form">
                    <label for="tipo" class="form_text" data-section="catalogo" data-value="cate">Categoría</label>
                    <select id="categoría" name="cate">
                        <option value="" selected disabled data-section="catalogo" data-value="cate">Categoría</option>
                        <option value="Ciencia" data-section="catalogo" data-value="ciencia">Ciencia</option>
                        <option value="Literatura" data-section="catalogo" data-value="literatura">Literatura</option>
                        <option value="Física" data-section="catalogo" data-value="fisica">Física</option>
                        <option value="Economía" data-section="catalogo" data-value="economia">Economía</option>
                        <option value="Historia" data-section="catalogo" data-value="historia">Historia</option>
                    </select>
                </div>
                <div class="content_form">
                    <label for="descripción" class="form_text" data-section="catalogo"
                        data-value="desc">Descripción</label>
                    <textarea id="descripción" class="descripción" name="desc"></textarea>
                </div>
                <div class="content_form">
                    <label for="articulo" class="src" data-section="catalogo" data-value="art">Articulo</label>
                    <input type="file" id="articulo" accept=".pdf" name="src" autocomplete="off">
                </div>
                <div class="content_form">
                    <label for="imagen" class="src" data-section="catalogo" data-value="img">Imagen</label>
                    <input type="file" id="imagen" accept="Image/*" name="img"
                        onchange="vista_preliminar(event), validar()">
                    <div id="img-container"><img class="grande" src="../src/img/icons8-book-100.png" alt="user_image"
                            id="img-preview">
                    </div>
                </div>
                <div class="btnPart">
                    <button type="submit" name="enviar" data-section="catalogo" data-value="añadir">Agregar</button>
                    <button type="button" id="btnCancelIn" data-section="catalogo"
                        data-value="cancelar">Cancelar</button>
                </div>
            </form>
        </dialog>
    </main>
    <script src="../js/preview.js"></Script>
    <script src="../js/j_query.js"></Script>
    <script src="../js/alertify.js"></Script>
    <script src="../js/resource.js"></script>
    <script src="../js/trad.js"></script>
</body>

</html>