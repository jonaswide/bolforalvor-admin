<?php
    $path = "."; 
    $title = "Bolforalvor | login";
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

	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.17/angular.min.js"></script>
	<script src="https://code.angularjs.org/1.2.17/angular-route.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>

	<form action="login.php" method="POST">
		<input type="text" name="username" placeholder="Brugernavn" required>	
		<br>
		<input type="password" name="password" placeholder="Password" required>
		<br>
		<input type="submit" value="Login">
	</form>

	<?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] >= 1 && $_GET['error'] <= 3) {
                print("<p id='error'>Fejl i login</p>");
            } elseif ($_GET['error'] = 'intet-login') {
            	print("<p id='error'>Du skal være logget ind</p>");
            }
        }
	?>
	
</body>
</html>