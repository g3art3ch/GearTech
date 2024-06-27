<?php 

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'users';

$mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);


// if ($mysqli->connect_error) {
//     echo "erro";
// } else {
//     echo "Conectado";
// }