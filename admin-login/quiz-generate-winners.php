<?php 

	require ("../include/connectdb.php");

	$sql = "INSERT INTO vindere(kandidat_id, spg_id) SELECT kandidat_id, spg_id FROM kandidat WHERE svar = 0 AND spg_id = (SELECT max(spg_id) from quiz) ORDER BY RAND() LIMIT 10";
	$result = @mysqli_query($con, $sql);

    if ($result) {
    	mysqli_close($con);
    	header("Location: medarbejder.php#/quizvindere?besked=succes");
    } else {
    	die('Error: ' . mysqli_error($con));
        header("Location: medarbejder.php#/quizvindere?error=1");
    } 
?>