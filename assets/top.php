<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="assets/css/normalize.css"/>
        <link rel="stylesheet" type="text/css" href="assets/css/main.css"/>
        <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="assets/js/main.js"></script>
        <meta name="viewport" content="width=device=width, initial-scale=1"/>
        <meta http-equiv="X-UA-Compatible" content="IE=EDGE; chrome=1"/>
        <title> <?php echo $servername ?> - <?php echo $header ?> </title>
        <meta http-equiv="refresh" content="1800"/>
    </head>
    <body>
        <div class="NavBar">
            <div id="Title">
               <img alt="Yngrid Hair Salon" src="assets/img/LogoMakr_6CVBIV.png"/>
            </div>

            <?php if ($header == "Home") {echo "<a class=active href=\"?p=home\">Home</a>";} else {echo "<a href=\"?p=home\">Home</a>";}?>
            <?php
            if (!isset($_SESSION['user'])){
                if ($header == "Register") {echo "<a class=active href=\"?p=register\">Register</a>";} else {echo "<a href=\"?p=register\">Register</a>";}
                if ($header == "Login") {echo"<a class=active href=\"?p=login\">Login</a>";} else {echo"<a href=\"?p=login\">Login</a>";}
                if ($header == "Guest appointment") {echo "<a class=action href=\"?p=ga\">Appointment</a>";} else {echo "<a href=\"?p=ga\">Appointment</a>";}
            } else {
                if ($_SESSION['admin'] == true){
                    echo "<a href=\"?p=logout\" > Logout</a>
                          <a href=\"?p=la\">Appointment</a>
                          <a href=\"?p=status\">System Status</a>";
                }else {
                    echo "<a href=\"?p=logout\" > Logout</a>
                          <a href=\"?p=ga\">Appointment</a>";
                }
            }
            ?>
            <?PHP if ($header == "Contact") {echo "<a class=active href=\"?p=contact\">Contact Us</a>";} else {echo "<a href=\"?p=contact\">Contact Us</a>";}?>
        </div>
   
