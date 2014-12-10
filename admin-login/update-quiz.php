<?php 

	require ("../include/connectdb.php");

	$spg = trim($_POST['spg']);
	$svar1 = trim($_POST['svar1']);
	$svar2 = trim($_POST['svar2']);

	if ( $spg == ""
        || $svar1 == ""
        || $svar2 == "") {
        header("Location: medarbejder.php#/quizvindere?error=1");

    } else { 
		$sql = "INSERT INTO quiz (spg, svar1, svar2) VALUES ('$spg', '$svar1', '$svar2')";

		$result = @mysqli_query($con, $sql);
	    if ($result) {
	    	mysqli_close($con);
	        header("Location: medarbejder.php#/quizvindere?besked=succes");
	    } else {
	    	die('Error: ' . mysqli_error($con));
	        header("Location: medarbejder.php#/quizvindere?error=2");
	    }
	} 

?>