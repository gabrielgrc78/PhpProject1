<?php
if (basename($_SERVER["PHP_SELF"])=== "config.php"){
    die("Error 404");
}
session_start();
//Connection Link//
$host['hostname'] = "localhost";
$host['user'] = "root";
$host['password'] = "";
$host['database'] = "YngridHairSalon";
$host['port'] = "3306";
//Server info//
$servername = "Yngrid's Hair Styling";
$version    = "0.7 (Alpha)";
//session link//
$connect = mysqli_connect($host['hostname'],$host['user'],$host['password'],$host['database'],$host['port']) or die ("can't connect to server");

function sql_janitor ($sCode) {
    if (function_exists("mysqli_real_escape_string")) {
        $sCode = mysqli_real_escape_string($sCode);
    } else {
        $sCode = addcslashes($sCode);
    }
}