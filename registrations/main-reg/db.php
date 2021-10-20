<?php

$servername = "localhost";
$dBUsername = "phpmyadmin";
$dBPassword = "abcde";
$dBName = "innoventions";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

?>
