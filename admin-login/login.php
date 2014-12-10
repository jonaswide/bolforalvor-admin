<?php
session_start();
$_SESSION = array();

    $path = ".";

    if (!(isset($_POST['username']) && $_POST['username'] != ""
       && isset($_POST['password']) && $_POST['password'] != "")) {
            header("Location: login-form.php?error=1");
    } else {

        $username = trim($_POST['username']);
        $password = trim(hash("sha512", $_POST['password']));

        require ("../include/connectdb.php");

        $sql = "SELECT * FROM admin WHERE brugernavn = '$username' AND password = '$password'";
        
        $result = @mysqli_query($con, $sql);
        $row = @mysql_num_rows($result);
        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['cms'] = true;
            $_SESSION['fornavn'] = $row["fornavn"];
            $_SESSION['efternavn'] = $row["efternavn"];
            $_SESSION['brugernavn'] = $row["brugernavn"];
            header("Location: medarbejder.php");
        } else {
            header("Location: login-form.php?error=2");
        }
    }

?>