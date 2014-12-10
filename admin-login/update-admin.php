<?php 

	require ("../include/connectdb.php");

	$firstname = trim($_POST['firstname']);
	$lastname = trim($_POST['lastname']);
	$email = trim($_POST['email']);
	$username = trim($_POST['username']);
	$password = trim(hash("sha512", $_POST['password']));
	$id = $_POST['id'];

	$newPass1 = trim($_POST['new-password1']);
	$newPass2 = trim($_POST['new-password2']);

	if ( $firstname == ""
        	|| $lastname == ""
        	|| $email == ""
        	|| $username == ""
        	|| $password == "") {
        header("Location: profil.php?error=1");

    } else { 
    	$passCheck = "SELECT password FROM admin WHERE admin_id = '$id'";
    	$passResult = @mysqli_query($con, $passCheck);
    	$passUse = mysqli_fetch_array($passResult);

    	if ($password == $passUse['password']) {

			if ($newPass1 !== "" && $newPass2 !== "" && $newPass1 == $newPass2) {

				$newPass1 = trim(hash("sha512", $_POST['new-password1']));
				$newPass2 = trim(hash("sha512", $_POST['new-password2']));
	        	$sql = "UPDATE admin SET fornavn = '$firstname', efternavn = '$lastname', email = '$email', brugernavn = '$username', password = '$newPass1' WHERE admin_id = '$id'";
	        	$result = @mysqli_query($con, $sql);

	        	if($result){
	        		mysqli_close($con);
	    			header("Location: profil.php?besked=succes1");
	        	} else {
	        		mysqli_close($con);
	    			header("Location: profil.php?error=2");
	        	}
	    	} else {
	    		$sql2 = "UPDATE admin SET fornavn = '$firstname', efternavn = '$lastname', email = '$email', brugernavn = '$username', password = '$password' WHERE admin_id = '$id'";
	        	$result2 = @mysqli_query($con, $sql2);

	        	if($result2){
	        		mysqli_close($con);
	    			header("Location: profil.php?besked=succes2");
	        	} else {
	        		mysqli_close($con);
	    			header("Location: profil.php?error=3");
	    		}
	    	}
    	} else {
    		mysqli_close($con);
	    	header("Location: profil.php?error=4");
    	}
    }

?>