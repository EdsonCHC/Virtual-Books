<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Account.css">
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
    <title>Cuenta</title>
</head>

<body>
    <?php
    require_once("../html/header.php")
        ?>
    <main>
        <?php
        require_once("../html/aside.php");
        ?>
        <div id="paleta-der">
            <div id="part1">
                <p>Personal Information</p>
            </div>

            <div id="part2">
                <div id="form-ctn">
                    <form action="">
                        <div id="text-ctn">
                            <label for="">
                                <h6>First name</h6>
                            </label>
                            <input type="text" placeholder="Lorem">
                            <label for="">
                                <h6>Last name</h6>
                            </label>
                            <input type="text" placeholder="Lorem">
                            <button id="boton" type=""> Editar
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <button id="boton1" type="">
                                <i class="fa-regular fa-floppy-disk"></i>
                            </button>
                        </div>
                        <div id="img-ctn">
                            <h6>Profile Picture</h6>
                            <img class="grande" src="../src/user.png" alt=""><br>
                            <button class="upload">Upload image
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                            </button>
                            <button id="boton1" type="">
                                <i class="fa-regular fa-floppy-disk"></i>
                            </button>
                        </div>
                    </form>

                    <p>Email addres</p>
                </div>
            </div>
            <div id="part3">
                <div id="contenido3">
                    <form action="">
                        <div id="text-ctn1">
                            <label for="">
                                <h6>Email</h6>
                            </label>
                            <input type="email" placeholder="Lorem">
                            <button id="boton2" type=""> Edit Password
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
</body>

</html>