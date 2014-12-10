<?php 

	require('../include/connectdb.php');

	$query = mysqli_query($con, 
		"SELECT * FROM admin");


	$employees = array();

	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		$employees[] = $row;
	}

	mysqli_close($con);

	header ("content-type:text/plain");
	echo json_encode($employees, JSON_NUMERIC_CHECK);

?>

