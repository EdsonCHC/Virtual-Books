<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Account.css">
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
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
                <p>Información Personal</p>
            </div>

            <div id="part2">
                <div id="form-ctn">
                    <?php
                    // Archivo: redirect.php
                    require_once '../js/vendor/autoload.php';

                    $client = new \Google\Client();
                    $client->setAuthConfig('../js/credentials.json');
                    $client->setRedirectUri('http://localhost/Virtual-Books/html/account.php');
                    $client->addScope('name');
                    $client->addScope('lastName');
                    $client->addScope('email');
                    // $client->addScope('profile');
                    
                    $authUrl = $client->createAuthUrl();

                    if (isset($_GET['code'])) {
                        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
                        $client->setAccessToken($token);

                        $refreshToken = null;
                        if (array_key_exists('refresh_token', $token)) {
                            $refreshToken = $token['refresh_token'];
                        }

                        if ($refreshToken) {
                            // Obtener un nuevo token de acceso utilizando el refresh token
                            $client->fetchAccessTokenWithRefreshToken($refreshToken);
                            $newToken = $client->getAccessToken();
                            $client->setAccessToken($newToken);

                            // Realiza acciones adicionales utilizando el nuevo token de acceso
                            // ...
                        } else {
                            echo 'No se encontró el refresh token.';
                        }

                        $service = new \Google\Service\Oauth2($client);
                        $userInfo = $service->userinfo->get();

                        // Aquí puedes acceder a los datos del usuario, como su ID, nombre y correo electrónico
                        $userId = $userInfo->id;
                        $name = $userInfo->name;
                        //$lastName = $userInfo->lastName;
                        $email = $userInfo->email;
                        echo $name;
                        //echo $lastName;
                        echo $email;

                    } else {
                        echo 'Error al obtener el código de autorización.';
                    }
                    ?>
                    <form action="">
                        <div id="text-ctn">
                            <label for="">
                                <h6>Nombres</h6><p class="warnings" id="warnings"></p>
                            </label>
                            <input type="text" id="input1" placeholder="Martin Alejandro">
                            <label for="">
                                <h6>Apellidos</h6><p class="warnings" id="warnings"></p>
                            </label>
                            <input type="text" id="input2" placeholder="Castro Lopez">
                            <button id="boton" type=""> Actualizar
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <button id="boton1" type="">
                                <i class="fa-regular fa-floppy-disk"></i>
                            </button>
                        </div>
                        <div id="img-ctn">
                            <h6>Imagen de perfil</h6>
                            <img class="grande" src="../src/user.png" alt=""><br>
                            <button class="upload">Actualizar
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                            </button>
                            <button id="boton1" type="">
                                <i class="fa-regular fa-floppy-disk"></i>
                            </button>
                        </div>
                    </form>

                    <p>Correo Electrónico</p>
                </div>
            </div>
            <div id="part3">
                <div id="contenido3">
                    <form action="">
                        <div id="text-ctn1">
                            <label for="">
                                <h6>Correo Electronico</h6><p class="warnings" id="warnings"></p>
                            </label>
                            <input type="email" id="input3" placeholder="Lorem">
                            <button id="boton2" type=""> Actualizar
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>