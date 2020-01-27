<?php
error_reporting(E_ERROR);
include 'assets/config.php';
$page = @$_GET['p'];
switch ($page) {
    case null:
    case "index":
        $getpage = "public/home";
        $header = "Home";
        break;
    case "home":
        $getpage = "public/home";
        $header = "Home";
        break;
    case "":
        $getpage = "";
        $header = "";
        break;
    case "appointment":
        $getpage = "public/";
        $header = "appointment";
        break;
    case "register":
        $getpage = "public/register";
        $header = "Register";
        break;
    default:
        $title = $servername."";
        $getpage = "public/home";
        break;
}
include_once ('assets/top.php');
include_once ($getpage.".php");
include_once ('assets/bottom.php');
?>