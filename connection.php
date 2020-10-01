<?php

$host = "localhost";
$user = "root";
$password= "";
$database = "phpmysql";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) 
	die( "Unable to connect. ".mysqli_connect_error());
?>