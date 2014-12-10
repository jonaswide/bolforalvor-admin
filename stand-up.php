<?php
	require ("include/connectdb.php");
	$sql = "SELECT * FROM quiz WHERE spg_id = (SELECT max(spg_id) from quiz)";
	$result = @mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	if ($result) {
		echo '<form class="quiz" method="POST" action="admin-login/quiz-validation.php">
					<label><h3>' . $row["spg"] . '</h3></label>
					<div class="form-group">

					    <div class="col-sm-12">
							<label class="radio-inline radio-1">
								<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">' . $row["svar1"] . '
							</label>

							<label class="radio-inline">
								<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0">' . $row["svar2"] . '
							</label>

					      	<input type="text" name="navn" class="form-control" id="inputEmail3" placeholder="Navn">
					      	<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
					      	<input type="hidden" name="spg_id" value="' . $row["spg_id"] . '">
					    </div>

						<input type="submit" class="btn btn-default" value="Deltag">
					</div>
				</form>';
	}
?>




<div class="row stand-bottom">
	<div class="container container-fluid">
			
	<div class="col-xs-12 col-sm-5 col-md-5">
		<h3>Har du en sjov historie?</h3>
			<p>Skriv din personlige historie, og så kan det være at
			komikkerne bruger den i deres show!</p>	
	</div>		

		<div class="col-xs-12 col-sm-7 col-md-7">
			
			<form method="POST" action="admin-login/stand-up-history.php">

				<input name="name" type="text" class="form-control" placeholder="Dit navn (valgfrit)">
				<textarea name="story" class="form-control form-midt" rows="6" placeholder="Din historie"></textarea>
				<input type="submit" value="Send" class="btn btn-beregn btn-default">

			</form>

		</div>

	</div><!-- container container-fluid slut -->
</div><!-- row slut -->