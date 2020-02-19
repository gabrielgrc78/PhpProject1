<?php
include_once 'assets/config.php';

$cU = sql_janitor($_POST['username']);
$cP = sql_janitor($_POST['password']);
