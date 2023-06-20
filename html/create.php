<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="../css/Rules.css" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../css/create.css" />
</head>

<body>
    <?php
    require_once("../html/header.php");
    ?>
    <main>
        <?php
        require_once("../html/aside.php");
        ?>
        <div id="content">
            <h2>Crear posteo</h2>
            <div id="general_conteiner">
                <div id="first_conteiner">
                    <div id="post_desc">
                        <textarea name="texto" rows="19" cols="65" placeholder="¿De qué quieres hablar?"></textarea>
                    </div>
                    <div id="post_enter">
                        <input type="reset" value="Postear">
                    </div>
                </div>
                <div id="second_conteiner">
                    <div id="tittle_second_conteiner">
                        <h3>Otros comentarios</h3>
                    </div>
                    <div id="coments">
                        <p>Why having a blog on your website is more important than ever<button><img
                                    src="../src/Arrow.png" /></button></p>

                    </div>
                    <div id="coments">
                        <p>Why having a blog on your website is more important than ever<button><img
                                    src="../src/Arrow.png" /></button></p>

                    </div>
                    <div id="coments">
                        <p>Why having a blog on your website is
                            more important than ever<button><img src="../src/Arrow.png" /></button></p>

                    </div>

                </div>

            </div>


        </div>
        
        <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
        <script>
            let year = document.getElementById('year');
            let y = new Date().getFullYear();
            year.innerHTML = y;
        </script>
        <script src="../js/toggle.js"></script>
</body>

</html>