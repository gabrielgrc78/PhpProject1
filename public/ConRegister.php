<body>
<br>
<fieldset style="text-align: center">
    <form method="post" action="#">
        <label for="Fname"><b>First Name</b></label>
        <input type="text" placeholder="Enter First Name Here" name="Fname" required>
        <br>
        <label for="Lname"><b>Last Name</b></label>
        <input type="text" placeholder="Enter Last Name Here" name="Lname" required>
        <br>
        <label for="PN"><b>Phone Number</b></label>
        <input type="tel" placeholder="Enter Phone Number" name="PN" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
        <small>Format: 123-456-7890</small>
        <br>
        <button type="submit" name="FinReg">Complete</button>
    </form>
</fieldset>
<br>
</body>
<?php
include_once 'assets/config.php';
if (isset($_POST['FinReg'])){
    $FN = $_POST['Fname'];
    $LN = $_POST['Lname'];
    $tel = $_POST['PN'];
    $fts = false;
    if(empty($FN) && empty($LN) && empty($tel)){
        echo "<p><fieldset style=\"text-align: center;color: crimson\">please provide your First and Last name, and Phone Number.</fieldset></p>.";
    }else {
        $sql = "INSERT INTO `clients` (`Fname`,`Lname`,`phone`,`firsttime`) VALUES (?,?,?,?)";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            echo "<p><fieldset style=\"text-align: center;color: crimson\">ERROR 03: Connection Error</fieldset></p>.";
        } else {
            mysqli_stmt_bind_param($stmt, "sssi",$FN, $LN, $tel, $fts);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            echo "<p><fieldset style=\"text-align: center;color:green\">Registration is now completed</fieldset></p>.";
        }
        mysqli_stmt_close($stmt);
        mysqli_close($connect);
    }
}