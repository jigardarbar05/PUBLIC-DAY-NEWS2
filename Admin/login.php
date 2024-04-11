<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="acss/main.css">
<style>
	body{
	  background-color: rgba(11, 10, 10, 0.883);
	}
	.error{
			  color: rgb(238, 16, 16);
			}
		</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/l1.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" id="abc" method="POST">
					<span class="login100-form-title">
						Admin Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" Required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" Required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>

					

					
				</form>
			</div>
		</div>
	</div>
	
		<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<?php

if(isset($_POST['login']))
{
	include("config.php");
	$emailid=mysqli_real_escape_string($conn,$_POST['email']);
	$password=$_POST['password'];
	$query="SELECT email,password FROM admin WHERE email='{$emailid}'
	AND password='{$password}' ";
	
	$res=mysqli_query($conn,$query);
	if(mysqli_num_rows($res)>0)
	{
       while($row=mysqli_fetch_assoc($res)){
		session_start();
		$_SESSION["emailid"]=$row['email'];

		header("location:amg user.php");

	   }
		 
	}else{
		echo" <script> 
		alert('invalid email and password');
		</script>";
	}
}




 ?>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <script src="js/main.js"></script>
   <script src="js/alogin.js"></script> 
</body>
</html>