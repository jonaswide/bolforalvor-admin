<?php 
	$name = $_POST['name'];
	$story = $_POST['story'];

	require ("../include/connectdb.php");

	if ($name == ""){
    	$name = "Ukendt forfatter";
    }

	if ($story == "") {
        header("Location: ../stand-up.php?error=4");
    } else { 
		$sql = "INSERT INTO historier (navn, historie) VALUES ('$name', '$story')";

		$result = @mysqli_query($con, $sql);
						
	    if ($result) {
	    	mysqli_close($con);
	        header("Location: ../stand-up.php?besked=succes2");
	    } else {
	    	die('Error: ' . mysqli_error($con));
	        header("Location: ../stand-up.php?error=5");
	    }
	} 
?>