<?php 
	require('db.php');
	include("auth.php"); 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>All Clients</title>
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
						<li><a href="index.php">All Contracts</a></li>
						<li><a href="contract.php">Season View</a></li>
						
						<li><a href="allempl.php">All Employees</a></li>
						<li class="active"><a href="allclients.php">All Clients</a></li>
						
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
								
							<table>
							<tr>
							<th>ID</th>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Second Name</th>
							<th>Country</th>
							<th>City</th>
							<th>Street</th>
							<th>Contact Number</th>
							<th></th>
							
							
									<?php
		if($_SESSION['role'] == 'admin')
			{
				echo '<th></th>';
			}
			?>
							
							
							</tr>
							
					
					
					<?php
						$compositionsquery = "SELECT id, first_name, second_name, last_name, country, city, street, contact_number FROM client ORDER BY id ASC";
						$compositions = mysqli_query($connection, $compositionsquery);
						$rows = mysqli_num_rows($compositions);
						if($rows==0)
						{
							echo "<h3 class='panel-title text-center'>No Clients Found</h3><br>";
						}
						else
						{
							echo "<h3 class='panel-title text-center'>Clients</h3><br>";
						}
							
						while($row = mysqli_fetch_assoc($compositions)) 
						{ 
					
					
							echo '<tr>';
							echo '<td>'.$row['id'].'</td>';
							echo '<td>'.$row['last_name'].'</td>';
							echo '<td>'.$row['first_name'].'</td>';
							echo '<td>'.$row['second_name'].'</td>';
							echo '<td>'.$row['country'].'</td>';
							echo '<td>'.$row['city'].'</td>';
							echo '<td>'.$row['street'].'</td>';
							echo '<td>'.$row['contact_number'].'</td>';

	?>
							
							
							
									<td align="left"><a href="editclient.php?id=<?php echo $row['id']; ?>">Edit</a></td>
									
									
									<?php
		if($_SESSION['role'] == 'admin')
			{
				echo '<td align="left"><a href="deleteclient.php?id='.$row['id'].'">Delete</a></td>';
			}
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
