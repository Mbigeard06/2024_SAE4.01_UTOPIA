<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "klik_database";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName, 3308);

if (!$conn)
{
    die("Connection failed: ". mysqli_connect_error());
}


