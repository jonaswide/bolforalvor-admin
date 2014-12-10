<div class="col-md-6">
	<h2>Udtræk 10 tilfældige vindere</h2>
	<p>Der kan udtrækkes 10 vindere pr. quiz spørgsmål.</p>
	<p>Der skal udtrækkes 50 vindere i alt.</p>
	<form action="quiz-generate-winners.php" method="POST">
		<input type="submit" class="btn btn-primary" value="Udtræk">
	</form>

	<h2>Nuværende quiz</h2>
	<p><b>nuværende quiz spørgsmål: </b>
	<?php
		require ("../../include/connectdb.php");

		$query = "SELECT spg FROM quiz WHERE spg_id = (SELECT max(spg_id) from quiz)";
		$queryResult = @mysqli_query($con, $query);
		$single = mysqli_fetch_array($queryResult);

		if($queryResult) {
			echo $single["spg"] . '</p>
			Quizzen har ';
			$answer = "SELECT svar FROM kandidat WHERE svar = 0 AND spg_id = (SELECT max(spg_id) from quiz)";
			$answerResult = @mysqli_query($con, $answer);
			$answerNum = mysqli_num_rows($answerResult);

			if($answerResult){
				echo $answerNum . ' rigtig(e) besvarelse(r).';
			}
		} else {
			mysql_close($con);
		}
	?>

	<h2>Opdater quiz</h2>
	<form method="POST" enctype="multipart/form-data" action="update-quiz.php">
		<textarea class="form-control" rows="3" name="spg" placeholder="Skriv nyt quiz spørgsmål" required></textarea>
	    <input type="text" class="form-control" name="svar2" placeholder="Rigtige svarmulighed" required>
	    <input type="text" class="form-control" name="svar1" placeholder="Forkerte svarmulighed" required>

		<input type="submit" class="btn btn-primary" value="Opdater quiz">
		<a target="_blank" href="../stand-up.php" class="btn btn-default">Gå til stand-up-side</a>
	</form>

</div>

<div class="col-md-6">
	<?php 
		require ("../../include/connectdb.php");

		$sql = "SELECT * FROM vindere 
				  INNER JOIN kandidat ON vindere.kandidat_id = kandidat.kandidat_id ORDER BY dato DESC";
		$result = mysqli_query($con, $sql);

		if ($result) {
	    	echo '<table class="table">
			<tr>
				<td><b>Navn</b></td>
				<td><b>E-mail</b></td>
				<td><b>Dato for deltagelse</b></td>
			</tr>';
			
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr>
						<td>' . $row['navn'] . '</td>
						<td>' . $row['email'] . '</td>
						<td>' . $row['dato'] . '</td>
					</tr>';
			}
				
			echo '</table>';
			
			mysqli_free_result($result);
			mysqli_close($con);			
		} else {
			echo "Fejl i forbindelse til database.";
		}
	?>
</div>