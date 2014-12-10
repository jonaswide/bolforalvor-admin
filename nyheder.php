

<?php 

	require ("include/connectdb.php");

	$sql = "SELECT * FROM nyhed";
	$result = mysqli_query($con, $sql);

	if ($result) {
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			echo '<div class="col-xs-12 col-sm-6 col-md-6">
				    <div class="panel panel-default">
				    	<div class="panel-heading" role="tab" id="headingOne">
				      		<h4 class="panel-title">
				        		<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					        		<div class="thumbnail">
										<img src="img/' . $row['photo'] . '" alt="' . $row['titel'] . '">
										<div class="caption">
											' . $row['titel'] . '
											<span>' . $row['forfatter'] . ' | d. ' . $row['dato'] . '</span>
										</div>
									</div>
								</a>
							</h4>
				    	</div>
				    	<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				      		<div class="panel-body">
						    	' . $row['tekst'] . '
				      		</div>
				    	</div>
					</div>
				</div><!-- col-md-6 slut -->';
		}
		
		mysqli_free_result($result);
		mysqli_close($con);			
	} else {
		echo "Fejl i forbindelse til database.";
	}
?>