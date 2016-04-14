<?php
	require('db.php');
	$id=$_REQUEST['id'];
	$query = "DELETE FROM client WHERE id=$id"; 
	$result = mysqli_query($connection, $query) or die ( mysql_error());
	header("Location: allclients.php"); 
 ?>