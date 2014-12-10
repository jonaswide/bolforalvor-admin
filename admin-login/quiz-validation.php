<?php 

	$answer = trim($_POST['inlineRadioOptions']);
	$name = trim($_POST['navn']);
	$email = trim($_POST['email']);
	$spg_id = trim($_POST['spg_id']);

	require ("../include/connectdb.php");

	if ($name == "" || $email == "" || $answer == "") {
        header("Location: ../stand-up.php?error=1");

    } else {
    	$sql = "SELECT * FROM kandidat WHERE email = '$email' AND spg_id = '$spg_id'";
    	$result = @mysqli_query($con, $sql);
        $row = @mysql_num_rows($result);

        if ($row = mysqli_fetch_array($result)) {
        	header("Location: ../stand-up.php?error=2");
        } else {
			$sql = "INSERT INTO kandidat (navn, email, spg_id, svar, dato) VALUES ('$name', '$email', '$spg_id', '$answer', CURDATE())";

			$result = @mysqli_query($con, $sql);

		    if ($result) {
		    	mysqli_close($con);
		    	header("Location: ../stand-up.php?besked=succes");
		    } else {
		    	die('Error: ' . mysqli_error($con));
		        header("Location: ../stand-up.php?error=3");
		    }
		}
	} 
?>