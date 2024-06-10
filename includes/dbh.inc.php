<?php

$serverName = "localhost";
$dBUsername = "grp-502";
$dBPassword = "akKaxrUv";
$dBName = "grp-502_s4_sae";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName, 3306);

if (!$conn)
{
    die("Connection failed: ". mysqli_connect_error());
}


