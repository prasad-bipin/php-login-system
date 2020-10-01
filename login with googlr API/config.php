<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('451463667331-b8tqnr569l43jmieb26ldoil3cogf4ig.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('0q9B5Xd81qHAbJ04J6RK58aN');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/login%20with%20google%20api/index.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>