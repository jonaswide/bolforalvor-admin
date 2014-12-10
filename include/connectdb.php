<?php 
//localhost
$con = @mysqli_connect("localhost", "root", "", "bolforalvor");

//cpanel
//$con = @mysqli_connect("db23.meebox.net","jonaswid","SWATfire43!","jonaswid_tabletennis");

if (mysqli_connect_errno()) {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($con, 'utf-8');
?>