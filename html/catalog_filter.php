<?php
require_once("../php/interface.php");
require_once("../php/cone.php");
require_once("../php/methodsAdmin.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Rules.css" />
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/catalogfilter.css" />
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
                </div>
                <div class="table">
                    <table>
                        <tr>
                            <th> ID</th>
                            <th>titulo </th>
                            <th>Tipo </th>
                            <th>Autor </th>
                            <th>Categoría</th>
                            <th>Acciones </th>
                        </tr>
                        <?php
                        $obj = new métodosAdmin();
                        $sql = "SELECT id, name, author, type, category FROM resource";
                        $row = $obj->showData($sql);
                        if ($row->rowCount() > 0) {
                            $row->setFetchMode(PDO::FETCH_ASSOC);
                            while ($info = $row->fetch()) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $info['id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $info['name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $info['type'] ?>
                                    </td>
                                    <td>
                                        <?php echo $info['author'] ?>
                                    </td>
                                    <td>
                                        <?php echo $info['category'] ?>
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
                                <?php
                            }
                        } else {
                            echo "<td><h4>No hay datos</h4></td>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <dialog>
            <!--
            <form method="POST" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Titulo" autocomplete="off">
                <input type="text" name="autor" placeholder="Autor" autocomplete="off">
                <select name="tipo">
                    <option value="" selected disabled>Tipo</option>
                    <option value="Revista">Revista Académica</option>
                    <option value="Libro">Libro</option>
                    <option value="Tesis">Tesis</option>
                </select>
                <select name="cate">
                    <option value="" selected disabled>Categoría</option>
                    <option value="Ciencia">Ciencia</option>
                    <option value="Literatura">Literatura</option>
                    <option value="Física">Física</option>
                    <option value="Economía">Economía</option>
                    <option value="Historia">Historia</option>
                </select>
                <textarea placeholder="Descripción" name="desc"></textarea>
                <input type="file" accept=".pdf" name="src">
                <input type="file" accept="Image/*" name="img">
                <button type="submit" name="enviar">OK</button>
            </form>-->
            
            <form method="POST" enctype="multipart/form-data">
                <h4>Agregar Recursos</h4>
                <hr>
                <div class="content_form">
                    <label for="title" class="form_text">Titulo</label>
                    <input type="text" id="title" class="inputs" name="name">
                </div>
                <div class="content_form">
                    <label for="autor" class="form_text">Autor</label>
                    <input type="text" id="autor" class="inputs" name="autor">
                </div>
                <div class="content_form">
                    <label for="tipo" class="form_text">Tipo de recurso</label>
                    <select name="tipo" id="tipo" class="recurso">
                        <option value="" selected disabled>Tipo</option>
                        <option value="Revista">Revista Académica</option>
                        <option value="Libro">Libro</option>
                        <option value="Tesis">Tesis</option>
                    </select>
                </div>

                <div class="content_form">
                    <label for="tipo" class="form_text">Categoria</label>
                    <select name="cate" id="categoria" class="categoria">
                        <option value="" selected disabled>Categoría</option>
                        <option value="Ciencia">Ciencia</option>
                        <option value="Literatura">Literatura</option>
                        <option value="Física">Física</option>
                        <option value="Economía">Economía</option>
                        <option value="Historia">Historia</option>
                    </select>
                </div>
                <div class="content_form">
                    <label for="descripcion" class="form_text">Descripción</label>
                    <textarea id="descripcion" class="descripcion" name="desc"></textarea>
                </div>
                <div class="content_form">
                    <label for="articulo" class="src">Articulo</label>
                    <input type="file" id="articulo" accept=".pdf" name="src">
                </div>
                <div class="content_form">
                    <label for="imagen" class="src">Imagen</label>
                    <input type="file" id="imagen" accept="Image/*" name="img">
                </div>
                <button type="submit" name="enviar">OK</button>
            </form>
            <?php
            $obj = new métodosAdmin();
            if (isset($_POST['enviar'])) {
                $name = trim($_POST['name']);
                $autor = trim($_POST['autor']);
                $type = trim($_POST['tipo']);
                $cat = trim($_POST['cate']);
                $desc = trim($_POST['desc']);
                $nombreSrc = $_FILES['src']['name'];
                $rutaSrc = $_FILES['src']['tmp_name'];
                $src = "../src/files/" . $nombreSrc;
                $nombreImg = $_FILES['img']['name'];
                $rutaImg = $_FILES['img']['tmp_name'];
                $img = "../src/img/" . $nombreImg;
                $arr = array(
                    $name,
                    $autor,
                    $type,
                    $cat,
                    $desc,
                    $src,
                    $img
                );
                if (move_uploaded_file($rutaSrc, $src) && move_uploaded_file($rutaImg, $img)) {
                    $obj->insertData($arr);
                    header("Location: ../html/catalog_filter.php");
                }
            }
            ?>
        </dialog>
    </main>
    <script>
        document.querySelector("#oP").addEventListener("click", () => {
            document.querySelector("dialog").showModal();
        })
    </script>
    <script>

    </script>
</body>

</html>