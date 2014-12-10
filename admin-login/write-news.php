<?php 

	$author = $_POST['author'];
	$title = trim($_POST['title']);
	$text = trim($_POST['text']);
	$photo = time().($_FILES['photo']['name']);

	require ("../include/connectdb.php");

	if ($title == "" || $text == "" || $writer = "") {
        header("Location: medarbejder.php#/skriv-nyhed?error=1");
    } else { 
		$sql = "INSERT INTO nyhed (titel, tekst, photo, dato, forfatter) VALUES ('$title', '$text', '$photo', CURDATE(), '$author')";

		$result = @mysqli_query($con, $sql);
						
	    if ($result && move_uploaded_file($_FILES["photo"]["tmp_name"], "../img/" . $photo)) {
	    	mysqli_close($con);
	        header("Location: medarbejder.php#/skriv-nyhed?besked=succes");
	    } else {
	    	die('Error: ' . mysqli_error($con));
	        header("Location: medarbejder.php#/skriv-nyhed?error=2");
	    }
	} 
?>