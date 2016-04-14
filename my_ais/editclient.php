<?php
	require('db.php');
	include("auth.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>BlogBox - Edit Post</title>
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="image.css" />
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
		
		<div class="main">
			<div class="block">
				<div class="content">
			
					<?php
						$id=$_REQUEST['id'];
						$query = "SELECT * from client where id='".$id."'"; 
						$result = mysqli_query($connection, $query) or die ( mysql_error());
						$row = mysqli_fetch_assoc($result);
				
						if(isset($_POST['new']) && $_POST['new']==1)
						{
							
							$last_name = $_REQUEST['last_name'];
							$first_name = $_REQUEST['first_name'];
							$second_name = $_REQUEST['second_name'];
							$country = $_REQUEST['country'];
							$city = $_REQUEST['city'];
							$street = $_REQUEST['street'];
							$contact_number = $_REQUEST['contact_number'];
							
							
							
							if (($last_name == '') 
							 || ($first_name == '')
						 	 || ($second_name == '')
							 || ($country == '')
							 || ($city == '')
							 || ($street == '')
							 || ($contact_number == ''))
							{
								$status = "<h3>Error, fill all fields.</h3><br/>Click here to return to <a href='allclients.php'>All Clients</a>";
								echo '<p style="color:#FF0000;">'.$status.'</p>';				
							}
							else 
							{
							
								$update="update client set last_name='".$last_name."', first_name='".$first_name."', second_name='".$second_name."', country='".$country."', city='".$city."', street='".$street."', contact_number='".$contact_number."' where id='".$id."'";
								mysqli_query($connection, $update) or die(mysql_error());
								$status = "Client Info Updated Successfully. </br></br><a href='allclients.php'>View All Clients</a>";
								echo '<p style="color:#FF0000;">'.$status.'</p>';
							}
						}
						else 
						{
							?>
							<div>
								<form name="form" method="post" action=""> 
									<input type="hidden" name="new" value="1" />
									<div class="pad"><input name="last_name" type="text" value="<?php echo $row['last_name'];?>" /></div>
									<div class="pad"><input name="first_name" type="text" value="<?php echo $row['first_name'];?>" /></div>
									<div class="pad"><input name="second_name" type="text" value="<?php echo $row['second_name'];?>" /></div>
									<div class="pad"><input name="country" type="text" value="<?php echo $row['country'];?>" /></div>
									<div class="pad"><input name="city" type="text" value="<?php echo $row['city'];?>" /></div>
									<div class="pad"><input name="street" type="text" value="<?php echo $row['street'];?>" /></div>
									<div class="pad"><input name="contact_number" type="text" value="<?php echo $row['contact_number'];?>" /></div>
									<input name="submit" class="btn btn-default" type="submit" value="Update Client Info" />
								</form>
							</div>
						<?php } ?>
				</div>
			</div>
		</div>
	</body>
</html>