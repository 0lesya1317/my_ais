<?php
	$connection = mysqli_connect('localhost', 'root', '', 'my_ais');

	if (!$connection){
		die("Database Connection Failed" . mysql_error());
	}

?>