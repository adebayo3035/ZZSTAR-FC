<?php include('server.php'); ?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet"href="css/register-style.css">
	<title>Login and Registration Form</title>
</head>
<body>
	
		<div class="form">

			<form class="register-form"method="post"action="register.php">
				<?php include('errors.php'); ?>
				<h1> Register Your Account</h1>
				<!-- Display Validation Error -->
				
				<div class="InputBox">
					<p> Username </p>
				<input type="text"placeholder="user name"required=""name="username"value="<?php echo $username;?>"/>
			</div>
			<div class="InputBox">
				<p> E-mail </p>
				<input type="text"placeholder="E-mail Address"required=""name="email" value="<?php echo $email; ?>"/>
			</div>
			<div class="InputBox">
				<p> Password </p>
				<input type="password"placeholder="password"required=""name="password_1"/>
			</div>
			
			<div class="InputBox">
				<p> Confirm Password </p>
				<input type="password"placeholder="Confirm password"required=""name="password_2"/>
			</div>
				<button type="submit" name="register"> Create Account</button>
			<p class="message"> Already Registered? <a href="login.php"> Login </a>
			</p>
			</form>
			
	</div>




</body>
</html>