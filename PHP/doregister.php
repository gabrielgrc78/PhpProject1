<?php
error_reporting(E_ERROR);
include_once 'C:\Users\gabri\OneDrive\Documents\GitHub\PhpProject1\assets\config.php';
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $email = mysqli_real_escape_string($connect,$_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $chkpassword = mysqli_real_escape_string($connect, $_POST['chkpassword']);
    $birth = $_POST['DoB'];
    $ip = getenv("REMOTE_ADDR");

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        echo "Improper email and username";
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "invalid email";
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        echo "Invalid username!";
        exit();
    } elseif ($password !== $chkpassword) {
        echo "password do not match";
        exit();
    }  elseif ($birth == null) {
        echo "please enter in a birthday.";
        exit();
    } else {
        $sql = "SELECT `username` FROM `Clients` WHERE `username`=?";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            echo "ERROR = 01: Connection Error";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rc = mysqli_stmt_num_rows($stmt);
            if ($rc > 0) {
                echo "ERROR: Username exist";
                exit();
            } else {
                $sql = "INSERT INTO `Clients` (`username`,`email`,`password`,`birthdate`,`lastknownip`) VALUES (?,?,?,?,?)";
                $stmt = mysqli_stmt_init($connect);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    echo "ERROR = 02: Connection Error";
                    exit();
                } else {
                    $securedpass = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssss", $username,$email, $securedpass, $birth, $ip);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    echo "you are now registered to ".$servername."!";
                }

            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($connect);
    }
    else {
        header("Location:\"?p=register\"");
        exit();
    }
}
?>