<?php
require_once("../php/interface.php");
require_once("../php/cone.php");
require_once("../php/functions.php");
require_once("../php/methods.php");
require_once("../html/header.php");

$id_recurso = $_GET['id'];

if (isset($_SESSION['user'])) {
    $id_usuario = $_SESSION['user']['0'];
} else {
    echo "Error";
}
if ($_POST) {
    $texto = $_POST["texto"];
    $valuation = $_POST["valuation"];
    $obj = new Comentario();
    $arr = array($texto, $valuation, $id_usuario, $id_recurso);
    $obj->insertData($arr);
    header("location: create.php?id=$id_recurso");
}


$obj = new Comentario();
$sql = "select comment.description, comment.valuation, user.name from comment inner join user on comment.id_c = user.id where comment.id_rec = $id_recurso";
$fetch = $obj->showData($sql);
$fetch->setFetchMode(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Rules.css" />
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/create.css" />

    <!-- Fonts and Boostrap-->
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/alertify.css">

    <title>Comentarios</title>
</head>

<body>

    <main>
        <?php
        require_once("../html/aside.php");
        ?>
        <div id="content">
            <h2>Crear posteo</h2>

            <form method="POST">
                <div id="general_conteiner">
                    <div id="first_conteiner">
                        <div id="post_desc">
                            <textarea name="texto" rows="26" cols="100"
                                placeholder="¿De qué quieres hablar?"></textarea>
                        </div>
                        <div id="details_primary_part">
                            <h4><label for="valuation">Puntuacion</label></h4>
                            <select name="valuation">
                                <option value="Mala" selected >Mala</option>
                                <option value="Buena" >Buena</option>
                                <option value="Excelente">Excelente</option>
                            </select>
                        </div>
                        <div id="post_enter">
                            <input type="submit" value="Postear">
                        </div>
                    </div>
                    
            </form>
            <div id="second_conteiner">
                <div id="tittle_second_conteiner">
                    <h3>Otros comentarios</h3>
                </div>
                <?php             
                foreach ($fetch as $valoraciones) { ?>
                    <div id="coments">
                        <h4>
                        <?php echo "Autor: ".$valoraciones['name']; ?>
                        </h4>
                        <P>
                            <?php echo $valoraciones['valuation']; ?>
                            <?php echo $valoraciones['description']; ?>           
                        </p>
                    </div>

                    <?php
                }
                ?>
            </div>
        </div>
        </div>
        <script>
            let year = document.getElementById('year');
            let y = new Date().getFullYear();
            year.innerHTML = y;
        </script>
        <script src="../js/toggle.js"></script>
</body>

</html>