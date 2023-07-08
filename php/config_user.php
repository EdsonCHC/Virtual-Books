<?php
// Archivo: config.php
return [
    'user_id' => '876116753741-dqgfl8304shbnihnp4o6udsqpb2armg3.apps.googleusercontent.com',
    'user_secret' => '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',
    'account_uri' => 'http://localhost/Virtual-Books/php/redirect.php',
    'response_type' => 'code'
];



/*
// 
$clienteID = '876116753741-dqgfl8304shbnihnp4o6udsqpb2armg3.apps.googleusercontent.com';
$clientSecret = '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';
$redirecUrl = 'http://localhost/Virtual-Books/html/login.php';

// Se solicita la cuenta del cliente de google
$client = new Google_Client();
$client->setClientId($clienteID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUrl);
$client->addScope('profile');
$client->addScope('email');

if (isset($_GET[''])) {
    $token = $client->FetchAccesTokenWithAuthCode($_GET['code']);
    $client->setAccesToken($token);

    // Obteniendo el perfil del usuario
    $gauth = new Google_Service_Oauth2($client);
    $google_info = $gauth->userInfo->get();
    $email = $google_info->email;
    $name = $google_info->name
    echo "Welcome user". $name. "listo para esto";
} else {
    echo "<a href='".$client->createAutUri()."'>Login with google</a>";
}*/