<?php 
	require('db.php');
	include("auth.php"); 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>All Contracts</title>
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="image.css" />
		
  <link rel="stylesheet" href="normalize.css">
  <link rel="stylesheet" href="main.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	</head>
	
	<body>
	
		<div class="mix">
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header menuitem">
						<a class="navbar-brand" href="#">My AIS</a>
					</div>
					<div>
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">All Contracts</a></li>
						<li><a href="contract.php">Season View</a></li>
						
						<li><a href="allempl.php">All Employees</a></li>
						<li><a href="allclients.php">All Clients</a></li>
						
						
						<?php
		if($_SESSION['role'] == 'admin')
			{
				echo "<li><a href='registration.php'>New Employee</a></li>";
				echo "		<li><a href='client.php'>New Client</a></li>";
			}
			?>
						
						
						
					</ul>
				</div>
				<div>  
					<div class="nav navbar-nav navbar-right">
						<li><a href="logout.php">Log Out</a></li>
					</div>
				</div>
			</nav>
		</div>
			
		<div id="allclients">
			<div class="block">
				<div class="content">
					
					<hr>
							
							<table>
							<tr>
							<th>ID</th>
							<th>Client</th>
							<th>Admin ID</th>
							<th>User ID</th>
							<th>From</th>
							<th>To</th>
							<th>Item ID</th>
							<th>Color</th>
							<th>Type</th>
							<th>Made By</th>
							<th>Material</th>
							<th>Other Info</th>
							</tr>
							
					
					
					<?php
						$compositionsquery = "SELECT contract.id, client.last_name, client.first_name, client.second_name, contract.admin_id, contract.user_id, contract.date_start, contract.date_end, uniqueitem.ID, uniqueitem.color, groupdescription.type, groupdescription.made_by, groupdescription.material, groupdescription.other_info FROM contract JOIN CLIENT ON contract.client_id = CLIENT.id JOIN uniqueitem ON contract.ui_id = uniqueitem.id JOIN groupdescription ON uniqueitem.gd_id = groupdescription.ID ORDER BY contract.id ASC";
						$compositions = mysqli_query($connection, $compositionsquery);
						$rows = mysqli_num_rows($compositions);
						if($rows==0)
						{
							echo "<h3 class='panel-title text-center'>No Contracts Found</h3>";
						}
						else
						{
							echo "<h3 class='panel-title text-center'>Contracts</h3>";
						}
							
						while($row = mysqli_fetch_assoc($compositions)) 
						{ 
					
					
							echo '<tr>';
							echo '<td>'.$row['id'].'</td>';
							echo '<td>'.$row['last_name']." ".$row['first_name']." ".$row['second_name'].'</td>';
							echo '<td>'.$row['admin_id'].'</td>';
							echo '<td>'.$row['user_id'].'</td>';
							echo '<td>'.$row['date_start'].'</td>';
							echo '<td>'.$row['date_end'].'</td>';
							echo '<td>'.$row['ID'].'</td>';
							echo '<td>'.$row['color'].'</td>';
							echo '<td>'.$row['type'].'</td>';
							echo '<td>'.$row['made_by'].'</td>';
							echo '<td>'.$row['material'].'</td>';
							echo '<td>'.$row['other_info'].'</td>';

	?>
							
								</tr>
							
							<?php 
						}
					?></table>
				</div>
			</div>
		</div>
	</body>
</html>
