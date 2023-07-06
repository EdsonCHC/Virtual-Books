<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/Rules.css" />
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/login.css" />
</head>




<body>
    <div class="img_part">
        <img src="../src/login.png" class="img1_part">
        <img src="../src/login.png" class="img2_part">
        <img src="../src/login.png" class="img3_part">
    </div>
    <div class="general_part">
        <div class="primary_part">
            <form method="POST">
                <div class="space_primary_part">
                    <div class="tittle_primary_part">
                        <h1>Virtual Books</h1>
                    </div>
                    <div class="subtittle_primary_part">
                        <h3>Login</h3>
                    </div>
                    <div class="form_primary_part">
                        <div class="details_primary_part">
                            <div class="tittle_details_primary_part">
                                <h4><label for="email">Email</label></h4>
                            </div>
                            <input type="text" name="email" id="email" placeholder="username@gmail.com">
                        </div>
                        <div class="details_primary_part">
                            <div class="tittle_details_primary_part">
                                <h4> <label for="email">Password</label></h4>
                            </div>
                            <input type="text" name="contraseña" id="password" placeholder="password">
                        </div>
                    </div>
                    <div class="recuperate_primary_part">
                        <a href="#"><p>Register for Free</p></a>
                    </div>
                    <div class="submit_primary_part">
                        <input type="submit"  value="Sign in" name="Send">
                    </div>
                </div>
                <div class="google_space_primary_part">
                    <div class="google_primary_part">
                        <p>or continue with</p>
                        <button><img src="../src/google.png"></button>
                    </div>
                    <div class="register_primary_part">
                        <p>Don't have an account yet?<a href="#">Register for Free</a></p>
                    </div>
                </div>
            </form>

        <?php
        
        include ("../php/login_db_vb.php");
        
        ?>

        </div>
        <div class="secundary_part">
        </div>
    </div>
    <script src="https://accounts.google.com/gsi/client" async></script>
</body>
</html>