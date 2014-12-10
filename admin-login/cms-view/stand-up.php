<?php 
	require ("../../include/connectdb.php");

	$sql = "SELECT * FROM historier";
	$result = mysqli_query($con, $sql);

	if ($result) {
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

	    	echo '<div class="col-md-6">
	    	<h3>' . $row['navn'] . '</h3>
	    	<p>' . $row['historie'] . '</p>
	    	</div>';
		}

		mysqli_free_result($result);
		mysqli_close($con);			
	} else {
		echo "Fejl i forbindelse til database.";
	}
?>
