<?php
if (basename($_SERVER["PHP_SELF"])=== "config.php"){
    die("Error 404");
}
session_start();

$host['hostname'] = "localhost:3308";
$host['user'] = "root";
$host['password'] = "";
$host['database'] = "IngridHairSalon";
//Server//
$servername = "Yngrid's Hair Styling";
$version    = "0.3 (Alpha)";
//session link//
$connect = mysqli_connect($host['hostname'],$host['user'],$host['password'],$host['database']) or die ("can't connect to server");

function sql_janitor ($sCode) {
    if (function_exists("mysqli_real_escape_string")) {
        $sCode = mysqli_real_escape_string($sCode);
    } else {
        $sCode = addcslashes($sCode);
    }
}