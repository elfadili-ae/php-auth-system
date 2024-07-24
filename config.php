<?php

$host = "localhost";
$dbname = "auth-system";
$user = "root";
$pass = "";

$conn = new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);

// if ($conn == true) {
//     echo "We are connected";
// } else {
//     echo "Not connected";
// }
?>