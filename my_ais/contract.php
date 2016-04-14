<?php 
	require('db.php');
	include("auth.php"); 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Season View</title>
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
						<li class="active"><a href="contract.php">Season View</a></li>
						
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
						$compositionsquery1 = "SELECT contract.id, client.last_name, client.first_name, client.second_name, contract.admin_id, contract.user_id, contract.date_start, contract.date_end, uniqueitem.ID, uniqueitem.color, groupdescription.type, groupdescription.made_by, groupdescription.material, groupdescription.other_info, category.season FROM contract JOIN CLIENT ON contract.client_id = CLIENT.id JOIN uniqueitem ON contract.ui_id = uniqueitem.id JOIN groupdescription ON uniqueitem.gd_id = groupdescription.ID JOIN cgd ON groupdescription.ID = cgd.gd_category_id JOIN category ON cgd.gd_category_id = cgd.category_gd_id WHERE category.season = 'winter' ORDER BY contract.id ASC";
						$compositions1 = mysqli_query($connection, $compositionsquery1);
						$rows1 = mysqli_num_rows($compositions1);
						if($rows1==0)
						{
							echo "<h3 class='panel-title text-center'>No Winter Contracts Found</h3>";
						}
						else
						{
							echo "<h3 class='panel-title text-center'>Winter</h3>";
						}
							
						while($row1 = mysqli_fetch_assoc($compositions1)) 
						{ 
					
					
							echo '<tr>';
							echo '<td>'.$row1['id'].'</td>';
							echo '<td>'.$row1['last_name']." ".$row1['first_name']." ".$row1['second_name'].'</td>';
							echo '<td>'.$row1['admin_id'].'</td>';
							echo '<td>'.$row1['user_id'].'</td>';
							echo '<td>'.$row1['date_start'].'</td>';
							echo '<td>'.$row1['date_end'].'</td>';
							echo '<td>'.$row1['ID'].'</td>';
							echo '<td>'.$row1['color'].'</td>';
							echo '<td>'.$row1['type'].'</td>';
							echo '<td>'.$row1['made_by'].'</td>';
							echo '<td>'.$row1['material'].'</td>';
							echo '<td>'.$row1['other_info'].'</td>';

	?>
							
								</tr>
							
							<?php 
						}
					?></table>
					
					
					
					
					
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
						$compositionsquery2 = "SELECT contract.id, client.last_name, client.first_name, client.second_name, contract.admin_id, contract.user_id, contract.date_start, contract.date_end, uniqueitem.ID, uniqueitem.color, groupdescription.type, groupdescription.made_by, groupdescription.material, groupdescription.other_info, category.season FROM contract JOIN CLIENT ON contract.client_id = CLIENT.id JOIN uniqueitem ON contract.ui_id = uniqueitem.id JOIN groupdescription ON uniqueitem.gd_id = groupdescription.ID JOIN cgd ON groupdescription.ID = cgd.gd_category_id JOIN category ON cgd.gd_category_id = cgd.category_gd_id WHERE category.season = 'spring' ORDER BY contract.id ASC";
						$compositions2 = mysqli_query($connection, $compositionsquery2);
						$rows2 = mysqli_num_rows($compositions2);
						if($rows2==0)
						{
							echo "<h3 class='panel-title text-center'>No Spring Contracts Found</h3>";
						}
						else
						{
							echo "<h3 class='panel-title text-center'>Spring</h3>";
						}
							
						while($row2 = mysqli_fetch_assoc($compositions2)) 
						{ 
					
					
							echo '<tr>';
							echo '<td>'.$row2['id'].'</td>';
							echo '<td>'.$row2['last_name']." ".$row2['first_name']." ".$row2['second_name'].'</td>';
							echo '<td>'.$row2['admin_id'].'</td>';
							echo '<td>'.$row2['user_id'].'</td>';
							echo '<td>'.$row2['date_start'].'</td>';
							echo '<td>'.$row2['date_end'].'</td>';
							echo '<td>'.$row2['ID'].'</td>';
							echo '<td>'.$row2['color'].'</td>';
							echo '<td>'.$row2['type'].'</td>';
							echo '<td>'.$row2['made_by'].'</td>';
							echo '<td>'.$row2['material'].'</td>';
							echo '<td>'.$row2['other_info'].'</td>';

	?>
							
								</tr>
							
							<?php 
						}
					?></table>
					
					
					
					
					
					
					
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
						$compositionsquery3 = "SELECT contract.id, client.last_name, client.first_name, client.second_name, contract.admin_id, contract.user_id, contract.date_start, contract.date_end, uniqueitem.ID, uniqueitem.color, groupdescription.type, groupdescription.made_by, groupdescription.material, groupdescription.other_info, category.season FROM contract JOIN CLIENT ON contract.client_id = CLIENT.id JOIN uniqueitem ON contract.ui_id = uniqueitem.id JOIN groupdescription ON uniqueitem.gd_id = groupdescription.ID JOIN cgd ON groupdescription.ID = cgd.gd_category_id JOIN category ON cgd.gd_category_id = cgd.category_gd_id WHERE category.season = 'summer' ORDER BY contract.id ASC";
						$compositions3 = mysqli_query($connection, $compositionsquery3);
						$rows3 = mysqli_num_rows($compositions3);
						if($rows3==0)
						{
							echo "<h3 class='panel-title text-center'>No Summer Contracts Found</h3>";
						}
						else
						{
							echo "<h3 class='panel-title text-center'>Summer</h3>";
						}
							
						while($row3 = mysqli_fetch_assoc($compositions3)) 
						{ 
					
					
							echo '<tr>';
							echo '<td>'.$row3['id'].'</td>';
							echo '<td>'.$row2['last_name']." ".$row3['first_name']." ".$row3['second_name'].'</td>';
							echo '<td>'.$row3['admin_id'].'</td>';
							echo '<td>'.$row3['user_id'].'</td>';
							echo '<td>'.$row3['date_start'].'</td>';
							echo '<td>'.$row3['date_end'].'</td>';
							echo '<td>'.$row3['ID'].'</td>';
							echo '<td>'.$row3['color'].'</td>';
							echo '<td>'.$row3['type'].'</td>';
							echo '<td>'.$row3['made_by'].'</td>';
							echo '<td>'.$row3['material'].'</td>';
							echo '<td>'.$row3['other_info'].'</td>';

	?>
							
								</tr>
							
							<?php 
						}
					?></table>
					
					
					
					
					
					
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
						$compositionsquery4 = "SELECT contract.id, client.last_name, client.first_name, client.second_name, contract.admin_id, contract.user_id, contract.date_start, contract.date_end, uniqueitem.ID, uniqueitem.color, groupdescription.type, groupdescription.made_by, groupdescription.material, groupdescription.other_info, category.season FROM contract JOIN CLIENT ON contract.client_id = CLIENT.id JOIN uniqueitem ON contract.ui_id = uniqueitem.id JOIN groupdescription ON uniqueitem.gd_id = groupdescription.ID JOIN cgd ON groupdescription.ID = cgd.gd_category_id JOIN category ON cgd.gd_category_id = cgd.category_gd_id WHERE category.season = 'autumn' ORDER BY contract.id ASC";
						$compositions4 = mysqli_query($connection, $compositionsquery4);
						$rows4 = mysqli_num_rows($compositions4);
						if($rows4==0)
						{
							echo "<h3 class='panel-title text-center'>No Autumn Contracts Found</h3>";
						}
						else
						{
							echo "<h3 class='panel-title text-center'>Autumn</h3>";
						}
							
						while($row4 = mysqli_fetch_assoc($compositions4)) 
						{ 
					
					
							echo '<tr>';
							echo '<td>'.$row4['id'].'</td>';
							echo '<td>'.$row4['last_name']." ".$row4['first_name']." ".$row4['second_name'].'</td>';
							echo '<td>'.$row4['admin_id'].'</td>';
							echo '<td>'.$row4['user_id'].'</td>';
							echo '<td>'.$row4['date_start'].'</td>';
							echo '<td>'.$row4['date_end'].'</td>';
							echo '<td>'.$row4['ID'].'</td>';
							echo '<td>'.$row4['color'].'</td>';
							echo '<td>'.$row4['type'].'</td>';
							echo '<td>'.$row4['made_by'].'</td>';
							echo '<td>'.$row4['material'].'</td>';
							echo '<td>'.$row4['other_info'].'</td>';

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
