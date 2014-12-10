<?php
ob_start();
session_start();

if (!(isset($_SESSION['cms']) && $_SESSION['cms'])) {
    header("Location: login-form.php?error=intet-login");
}

$path = "."; 
$title = "Bolforalvor | Medarbejder";
$fornavn = $_SESSION['fornavn'];
$efternavn = $_SESSION['efternavn'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php $title ?></title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.17/angular.min.js"></script>
	<script src="https://code.angularjs.org/1.2.17/angular-route.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

	<script src="js/angular.js"></script>
	<script src="js/admin-validation.js"></script>
</head>
<body ng-app="cmsApp">

<div class="row">
	<nav class="container container-fluid">
		<ul class="nav navbar-nav">
			<li><a href="profil.php">Profil</a></li>
			<li><a href="medarbejder.php#/medarbejdere">Medarbejdere</a></li>
			<li><a href="medarbejder.php#/skriv-nyhed">Skriv nyhed</a></li>
			<li><a href="medarbejder.php#/quizvindere">Udvælg quizvindere</a></li>
			<li><a href="medarbejder.php#/stand-up-historier">Læs stand-up-historier</a></li>
			<li><a href="log-out.php">Log ud</a></li>
			<li>
				<?php 
					echo "<p>Logget ind som " . $fornavn . " " . $efternavn . "</p>"; 
				?>
			</li>
		</ul>
	</nav>
</div>

<div class="row">
	<div class="container container-fluid" ng-controller="userCtrl">
		<div class="col-md-12">
			<form action="update-admin.php" method="POST">
			<?php
				$brugernavn = $_SESSION['brugernavn'];

				require ("../include/connectdb.php");

				$sql = "SELECT * FROM admin WHERE brugernavn = '$brugernavn'";
				$result = mysqli_query($con, $sql);
				$row = mysqli_fetch_array($result);
				
				if ($result) {
					echo '<div class="form-group">
						    <label for="inputFornavn" class="col-sm-2 control-label">Fornavn</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="firstname" id="inputEmail3" value="' . $row["fornavn"] . '">
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputEfternavn" class="col-sm-2 control-label">Efternavn</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="lastname" id="inputPassword3" value="' . $row["efternavn"] . '">
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
						    <div class="col-sm-10">
						      <input type="email" class="form-control" name="email" id="inputPassword3" value="' . $row["email"] . '">
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputBrugernavn" class="col-sm-2 control-label">Brugernavn</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="username" id="inputPassword3 disabledInput" value="' . $row["brugernavn"] . '" disabled>
						    </div>
						  </div>

						  <br><br>

						  <div class="form-group">
						    <label for="inputPassword2" class="col-sm-2 control-label">Nyt password</label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" name="new-password1" id="inputPassword3" placeholder="Indtast nyt password">
						  </div>
						  </div>

						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">Gentag nyt password</label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" name="new-password2" id="inputPassword3" placeholder="Gentag nyt password">
						    </div>
						  </div>

						  <br><br>

						  <div class="form-group has-warning">
						    <label for="inputPassword1" class="col-sm-2 control-label">Password</label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Indtast nuværende password for at godkende ændringer">
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-10">
						      <input type="hidden" class="form-control" name="id" id="inputPassword3" value="' . $row["admin_id"] . '">
						    </div>
						  </div>

							<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Opdater informationer</button>

							<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-sm">
							    <div class="modal-content">
							    <div class="modal-body">
							      Er du sikker på at du vil opdatere dine informationer?
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Annuller</button>
							        <input type="submit" class="btn btn-primary" value="Opdater">
							      </div>
							    </div>
							    
							  </div>
							</div>
						</form>';
				}

			?>
		    </form>
		</div> <!-- col-md-12 -->
		<?php
			    if (isset($_GET['error'])) {
			        if ($_GET['error'] >= 1 && $_GET['error'] <= 3) {
			            print("<p id='error'>Fejl i opdatering.</p>");
			        }
			    } elseif (isset($_GET['besked'])) {
			        print("<p id='succes'>Opdatering er gennemført.</p>");
			    }
			?>
	</div> <!-- container-fluid -->
</div> <!-- row -->

</body>
</html>