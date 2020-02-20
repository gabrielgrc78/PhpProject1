<?php
include 'assets/config.php';

function hasher ($DP) {
    $DP = password_hash($DP, PASSWORD_DEFAULT);
    return $DP;
}

$cU = mysqli_real_escape_string($connect, $_POST['username']);
$cP = mysqli_real_escape_string($connect, $_POST['password']);
$cC = mysqli_query("SELECT * FROM `accounts` WHERE `username`='".sql_janitor($cU)."'") or die(mysqli_error($connect));
$cCA = mysqli_fetch_array($cC);
$pverify = password_verify($cP, PASSWORD_DEFAULT);
if($cCA['password'] == hasher($cP) || $cCA['password'] == hash(PASSWORD_DEFAULTS, $cP)) {
    $CleanedName = sql_janitor($cCA['username']);
    $cleanedPass = sql_janitor($cCA['password']);
    $selectQ = mysqli_query("SELECT * FROM `accounts` WHERE `username` = '".$CleanedName."' AND `password` ='".$cleanedPass."'",) or die(mysqli_error($connect));
    $selectF = mysqli_fetch_array($selectQ);
    $_SESSION['id'] = $selectF['clientid'];
    $_SESSION['name'] = $selectF['username'];
    
    if($selectF['admin'] == "1"){
        $_SESSION['admin'] = $selectF['admin'];        
    }
    echo "<meta http-equiv='refresh' content='1;url=\"?p=index\"'>";
} else {
        echo "<br /><center>The username or password is incorrect.<br/>Returning to front page in 2 seconds.</center><br />
		<meta http-equiv='refresh' content='2;url=\"?p=index\"'><br />";
    }