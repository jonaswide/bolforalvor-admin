<?php 

	require ("../include/connectdb.php");

	$firstname = trim($_POST['firstname']);
	$lastname = trim($_POST['lastname']);
	$email = trim($_POST['email']);
	$username = trim($_POST['username']);
	$password = trim(hash("sha512", $_POST['password']));
	$password2 = trim(hash("sha512", $_POST['password2']));

	if ($_POST['password'] != $_POST['password2']) {
        header("Location: medarbejder.php#/medarbejdere?error=1");
    } elseif ( $_POST['firstname'] == ""
        	|| $_POST['lastname'] == ""
        	|| $_POST['email'] == ""
        	|| $_POST['username'] == ""
        	|| $_POST['password'] == ""
        	|| $_POST['password2'] == "") {
        header("Location: medarbejder.php#/medarbejdere?error=2");

    } else { 
    	$mailcheck = "SELECT email, brugernavn FROM admin WHERE email = '$email' OR brugernavn = '$username'";
        $mailresult = @mysqli_query($con, $mailcheck);
        $row = @mysql_num_rows($result);

        if($row = mysqli_fetch_array($mailresult)){
        	mysqli_close($con);
    		header("Location: medarbejder.php#/medarbejdere?error=3");
        } else {
			$sql = "INSERT INTO admin (brugernavn, password, fornavn, efternavn, email, dato) VALUES ('$username', '$password', '$firstname', '$lastname', '$email', CURDATE())";

			$result = @mysqli_query($con, $sql);
		    if ($result) {
		    	mysqli_close($con);
		        header("Location: medarbejder.php#/medarbejdere?besked=succes");
		    } else {
		    	die('Error: ' . mysqli_error($con));
		        header("Location:" . $path . "/login-form.php?error=4");
		    }
	    } 
	}

?>