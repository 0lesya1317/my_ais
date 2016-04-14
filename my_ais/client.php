<?php 
	require('db.php');
	include("auth.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>New Client Registration</title>
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
	
		<?php
			if (isset($_POST['last_name']))
			{
				$last_name = $_POST['last_name'];
				$last_name = stripslashes($last_name);
				$last_name = mysqli_real_escape_string($connection, $last_name);
				$first_name = $_POST['first_name'];
				$first_name = stripslashes($first_name);
				$first_name = mysqli_real_escape_string($connection, $first_name);
				$second_name = $_POST['second_name'];
				$second_name = stripslashes($second_name);
				$second_name = mysqli_real_escape_string($connection, $second_name);
				$country = $_POST['country'];
				$country = stripslashes($country);
				$country = mysqli_real_escape_string($connection, $country);
				$city = $_POST['city'];
				$city = stripslashes($city);
				$city = mysqli_real_escape_string($connection, $city);
				$street = $_POST['street'];
				$street = stripslashes($street);
				$street = mysqli_real_escape_string($connection, $street);
				$contact_number = $_POST['contact_number'];
				$contact_number = stripslashes($contact_number);
				$contact_number = mysqli_real_escape_string($connection, $contact_number);
				
				
				
				
				if (($last_name == '') 
				 || ($first_name == '')
			 	 || ($second_name == '')
				 || ($country == '')
				 || ($city == '')
				 || ($street == '')
				 || ($contact_number == ''))
				{
					echo "<div class='success'><h3>Error, fill all fields.</h3><br/>Click here to <a href='client.php'>Register New Client</a></div>";				
				}
				else 
				{
					$query = "INSERT into client (first_name, second_name, last_name, country, city, street, contact_number) VALUES ('$first_name', '$second_name', '$last_name', '$country', '$city', '$street', '$contact_number')";
					$result = mysqli_query($connection, $query);
				
					if($result)
					{
						echo "<div class='success'><h3>You registered new client successfully.</h3></div>";				
					}
					else
					{
						echo "<div class='success'><h3>Error, try another login.</h3><br/>Click here to <a href='client.php'>Register New Client</a></div>";				
					}
				}

			}
			else
			{
				?>

				<div class="row centered-form">
					<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title text-center">New Client Registration</h3>
							</div>
							<div class="panel-body">
								<form name="registration" action="" method="post">
									<div class="form-group">
										<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
									</div>

									<div class="form-group">
										<input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
									</div>

									<div class="form-group">
										<input type="text" name="second_name" id="second_name" class="form-control input-sm" placeholder="Second Name">
									</div>
									
									<div class="form-group">
										<input type="text" name="country" id="country" class="form-control input-sm" placeholder="Country">
									</div>
									
									<div class="form-group">
										<input type="text" name="city" id="city" class="form-control input-sm" placeholder="City">
									</div>
									
									<div class="form-group">
										<input type="text" name="street" id="street" class="form-control input-sm" placeholder="Street">
									</div>
									
									<div class="form-group">
										<input type="text" name="contact_number" id="contact_number" class="form-control input-sm" placeholder="Contact Number">
									</div>

									<input type="submit" value="Register" class="btn btn-info btn-block">
									</br>
									<h3 class="panel-title text-center"><a href='index.php'>Return</a></h3>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
				
			<?php } ?>
		
	</body>
</html>
