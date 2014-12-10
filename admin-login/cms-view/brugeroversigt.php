<input ng-model="search">

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Opret admin</button>
<?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] >= 1 && $_GET['error'] <= 3) {
            print("<p id='error'>Fejl i oprettelse</p>");
        }
    }
?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id="myModalLabel">Opret ny admin</h4>
		    </div>
		    <form action="create-admin.php" method="POST" onsubmit="return validation(this);">
		    	<div class="modal-body">

					<input type="text" class="form-control" name="firstname" placeholder="Fornavn" required>	
					<br>
					<input type="text" class="form-control" name="lastname" placeholder="Efternavn" required>
					<br>
					<input type="email" class="form-control" name="email" placeholder="E-mail" required>
					<br>
					<input type="text" class="form-control" name="username" placeholder="Brugernavn" required>	
					<br>
					<input type="password" class="form-control" name="password" placeholder="Password" required>
					<br>
					<input type="password" class="form-control" name="password2" placeholder="Gentag password" required>

				</div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Annuller</button>
			        <input type="submit" class="btn btn-primary" value="Opret">
		      	</div>
		    </form>
	    </div>
  	</div>
</div>

<table class="table">
	<tr >
		<td><strong>Fornavn</strong></td>
		<td><strong>Efternavn</strong></td>
		<td><strong>E-mail</strong></td>
		<td><strong>Oprettelse</strong></td>
		<td></td>
	</tr>

	<tr ng-repeat="employee in employees | filter:search">
		<td>{{employee.fornavn}}</td>
		<td>{{employee.efternavn}}</td>
		<td>{{employee.email}}</td>
		<td>{{employee.dato}}</td>
	</tr>
</table>