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
</head>
<body ng-app="cmsApp">

<div class="row">
	<nav class="container container-fluid">
		<ul class="nav navbar-nav">
			<li><a href="profil.php">Profil</a></li>
			<li><a href="#/medarbejdere">Medarbejdere</a></li>
			<li><a href="#/skriv-nyhed">Skriv nyhed</a></li>
			<li><a href="#/quizvindere">Udvælg quizvindere</a></li>
			<li><a href="#/stand-up-historier">Læs stand-up-historier</a></li>
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
		<div class="col-md-12" ng-view></div>
	</div>
</div>

</body>
</html>