<?php


if (isset($_POST['login-submit'])){
    include_once '../assets/config.php';
    $cU = $_POST['ueid'];
    $cP = $_POST['password'];

    if ( empty($cU) || empty($cP)) {
        echo "<br /><center>The username or password areas are empty.<br/>Returning to front page in 2 seconds.</center><br />
		<meta http-equiv='refresh' content='2;url=\"?p=login\"'><br />";
    } else {
        $sql = "SELECT * FROM clients WHERE username=? OR email=?;";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "<br /><center>ERROR 01 Connection Error.<br/>Returning to front page in 2 seconds.</center><br />
		<meta http-equiv='refresh' content='2;url=\"?p=login\"'><br />";
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $cU, $cU);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($results)) {
                $cPC = password_verify($cP, $row['password']);
                if ($cPC === false ){
                    echo "<br /><center>The password is incorrect.<br/>Returning to front page in 2 seconds.</center><br />
		            <meta http-equiv='refresh' content='2;url=\"?p=login\"'><br />";
                } elseif ($cPC === true) {
                    session_start();
                    $_SESSION['user'] = $row['username'];
                    $_SESSION['admin'] = $row['admin'];
                    if($row['firsttime'] === true){
                        header("Location:?p=cr");
                    }
                    echo "<br /><center>Login success.<br/>Returning to front page in 2 seconds.</center><br />
                    <meta http-equiv='refresh' content='1;url=\"?p=index\"'>";

                } else {
                    echo "<br /><center>The password is incorrect.<br/>Returning to front page in 2 seconds.</center><br />
		            <meta http-equiv='refresh' content='2;url=\"?p=login\"'><br />";
                }
            } else {
                echo "<br /><center>The Username or email is not registered.<br/>Returning to front page in 2 seconds.</center><br />
		        <meta http-equiv='refresh' content='2;url=\"?p=login\"'><br />";
            }
        }

    }
} else {
        echo "<br /><center>The username or password is incorrect.<br/>Returning to front page in 2 seconds.</center><br />
		<meta http-equiv='refresh' content='2;url=\"?p=login\"'><br />";
    }