<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "dot_learn";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>