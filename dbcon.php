<?php
$name = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = mysqli_connect($name, $username, $password, $dbname);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>