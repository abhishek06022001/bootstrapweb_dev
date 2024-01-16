<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "ci-4";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$conn) {
    die("Something went wrong. Database is not connected;");
}
?>