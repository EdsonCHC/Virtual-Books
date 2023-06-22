<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/Account.css">
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
    <title>Document</title>
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
                            <label for=""><h6>First name</h6></label>
                            <input type="text" placeholder="Lorem">
                            <label for=""><h6>Last name</h6></label>
                            <input type="text" placeholder="Lorem">
                            <button id="boton" type=""> Edit <img src="../src/img/icons8-pencil-drawing-100.png" alt=""> </button>
                            <button id="boton1" type=""><img src="../src/img/icons8-save-all-100.png" height="20px" width="50px"> </button>
                        </div>

                        <div id="img-ctn">
                            <h6>Profile Picture</h6>
                            <img grande src="../src/user.png" alt=""><br>
                            <button Upload>Upload image <img src="../src/img/icons8-upload-to-cloud-96.png" height="22px" width="50px"></button>
                            <button id="boton1" type=""><img src="../src/img/icons8-save-all-100.png" height="20px" width="50px"> </button>
                        </div>            
                     </form>

                    <p>Email addres</p>
                </div>  
              </div>



                <div id="part3">
                    <div id="contenido3">
                        <form action=""> 
                            <div id="text-ctn1">
                                <label for=""><h6>Email</h6></label>
                                <input type="email" placeholder="Lorem">
                                <label for=""><h6>Password</h6></label>
                                <input type="password" placeholder="Lorem">
                                <button id="boton2" type=""> Edit Password <img src="../src/img/icons8-pencil-drawing-100.png" alt=""> </button>
                            </div>
                        </form>
                    </div>
                </div> 
        </div>      


            
    
</body>
</html>