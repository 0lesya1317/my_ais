<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="image.css" />
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

	</head>

	<body>

	<?php
		require('db.php');
		session_start();
    
		if (isset($_POST['login']) && isset($_POST['role']) )
		{
			$login = $_POST['login'];
			$login = stripslashes($login);
			$login = mysqli_real_escape_string($connection, $login);
			$role = $_POST['role'];
			$role = stripslashes($role);
			$role = mysqli_real_escape_string($connection, $role);
			$password = $_POST['password'];
			$password = stripslashes($password);
			$password = mysqli_real_escape_string($connection, $password);
        
			$query = "SELECT * FROM `employee` WHERE login='$login' and role='$role' and password='".md5($password)."'";
			$result = mysqli_query($connection, $query) or die(mysql_error());
			$rows = mysqli_num_rows($result);
			if($rows==1)
			{
				$_SESSION['login'] = $login;
				$_SESSION['role'] = $role;
				header("Location: index.php");
            }
			else
			{
				echo "<div class='success'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
			}
		}
		else
		{
			?>

			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="container" style="margin-top: 120px">
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h1 class="panel-title"><strong>Sign In </strong></h1>
							</div>
							<div class="panel-body">
								<form action="" method="post" >
									<div class="form-group">
										<label for="login">Login</label>
										<input type="text" name="login" class="form-control" id="login" placeholder="Login" required="required"/>
									</div>
									<div class="form-group">
										<label for="pwd">Password</label>
										<input type="password" name="password" class="form-control" id="pwd" placeholder="Password" required="required"/>
									</div>
									<div class="form-group">
										<label for="role">Role</label>
										<input type="text" name="role" class="form-control" id="role" placeholder="Role" required="required"/>
									</div>
									<div style="text-align: center">
										<button type="submit" class="btn btn-sm btn-default">Sign In</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		<?php } ?>
	</body>
</html>
