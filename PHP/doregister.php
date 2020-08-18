<?php
error_reporting(E_ERROR);
include_once '..\assets\config.php';
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $chkpassword = $_POST['chkpassword'];
    $birth = $_POST['DoB'];
    $ip = getenv("REMOTE_ADDR");
    $fts = true;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        echo "<p><fieldset style=\"text-align: center;color: crimson\">Improper email and username</fieldset></p><meta http-equiv='refresh' content='5;url=\"?p=register\"'>";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p><fieldset style=\"text-align: center;color: crimson\">invalid email</fieldset></p><meta http-equiv='refresh' content='5;url=\"?p=register\"'>";

    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        echo "<p><fieldset style=\"text-align: center;color: crimson\">Invalid username!</fieldset></p><meta http-equiv='refresh' content='5;url=\"?p=register\"'>";

    } elseif ($password !== $chkpassword) {
        echo "<p><fieldset style=\"text-align: center;color: crimson\">password do not match</fieldset></p><meta http-equiv='refresh' content='5;url=\"?p=register\"'>";

    } elseif ($birth == null) {
        echo "<p><fieldset style=\"text-align: center;color: crimson\">please enter in a birthday</fieldset></p><meta http-equiv='refresh' content='5;url=\"?p=register\"'>";

    } else {
        $sql = "SELECT `username` FROM `clients` WHERE `username`=?";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "<p><fieldset><div style=\"text-align: center;color: crimson\"></div>ERROR = 01: Connection Error</fieldset></p><meta http-equiv='refresh' content='5;url=\"?p=register\"'>";

        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rc = mysqli_stmt_num_rows($stmt);
            if ($rc > 0) {
                echo "<p><fieldset><div style=\"text-align: center;color: crimson\">ERROR: Username exist</div></fieldset></p><meta http-equiv='refresh' content='3;url=\"?p=login\"'>";

            } else {
                $sql = "INSERT INTO `clients` (`username`,`password`,`birthdate`,`email`,`lastknownip`,`firsttime`) VALUES (?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($connect);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "<p><fieldset><div style=\"text-align: center;color: crimson\">ERROR = 02: Connection Error</div></fieldset></p><meta http-equiv='refresh' content='1;url=\"?p=register\"'>";

                } else {
                    $securedpass = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssssi", $username, $securedpass, $birth, $email, $ip,$fts);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    echo "<p><fieldset><div style=\"text-align: center;color:green\">You are now registered to " . $servername . "!</div></fieldset></p>
                    <meta http-equiv='refresh' content='3;url=\"?p=index\"'>";
                }

            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($connect);
    }
} else {
    header("Location:?p=register");
    exit();
}
?>