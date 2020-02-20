<?php
error_reporting(E_ERROR);
include_once 'C:\Users\gabri\OneDrive\Documents\NetBeansProjects\PhpProject1\assets\config.php';
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $birth = $_POST['DoB'];
    $ip = getenv("REMOTE_ADDR");
    $ucheck = mysqli_query($connect, "SELECT * FROM `client` WHERE `username`='".$username."'") or die(mysqli_error($connect));
    
    if(mysqli_num_rows($ucheck) >= 1) {
        echo "Please enter another username.";
    } elseif (strlen($username) < 4) {
        echo "username must be between 4 and 12 characters!";
    } elseif (strlen($username) > 12) {
        echo "username must be between 4 and 12 characters!";
    } elseif (strlen($password) < 6) {
        echo "password must be between 4 and 12 characters!";
    } elseif (strlen($password) > 12) {
        echo "password must be between 4 and 12 characters!";
    } elseif ($birth == null) {
        echo "please enter in a birthday.";
    } else {
        mysqli_query($connect, "INSERT INTO `client` (`username`,`password`,`birthdate`) VALUES ('". $username ."','". password_hash($password, PASSWORD_DEFAULT)."','". $birth ."')") or die(mysqli_error($connect));
        echo "you are now registered to ".$servername."!";
    }
}
?>