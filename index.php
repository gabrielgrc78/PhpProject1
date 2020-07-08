<?php
error_reporting(E_ERROR);
include_once 'assets/config.php';
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
    case "la":
        $getpage = "public/lappointment";
        $header = "Appointment";
        break;
    case "logout":
        $getpage= "public/logout";
        $header= "logging out";
        break;
    case "dl":
        $getpage = "PHP/dologin";
        $header = "Login Processing";
        break;
    case "cr":
        $getpage = "public/ConRegister";
        $header = "Continuing Registration";
        break;
    case "status":
        $getpage = "PHP/status";
        $header = "System Status";
        break;
    case "login":
        $getpage = "public/login";
        $header = "Login";
        break;
    case "contact":
        $getpage = "public/contact";
        $header = "Contact";
        break;
    case "ga":
        $getpage = "public/gappointment";
        $header = "Guest appointment";
        break;
    case "register":
        $getpage = "public/register";
        $header = "Register";
        break;
    case "dr":
        $getpage = "PHP/doregister";
        $header = "Registering";
        break;
    default:
        $title = $servername."";
        $getpage = "public/home";
        break;
}
include_once('assets/top.php');
include_once ($getpage.".php");
include_once('assets/bottom.php');
?>
