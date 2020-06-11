<?php include ('server.php'); ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet"href="css/login-style.css">
	<title>Login Form Design</title>
</head>
<body>
	<header>
	<div class="loginBox">
		<!-- Display Validation Error Here -->
		<?php include ('errors.php'); ?>
		<h1> Login Here </h1>
		<form method="post"action="login.php">
			<p> Login As </p>
			<select>
				<option name="admin">  </option>
				<option name="admin"> Admin </option>
				<option name="officer"> Officer </option>
				<option name="warder"> Warder </option>
			</select>
			<p> Username</p>
			<input type="text"name="username"placeholder="Enter Username.."required=""value="adebayo3035">
			<p> Password</p>
			<input type="password"name="password"placeholder="Enter Password.."required=""value="nigerian123">
			<input type="submit"name="login"value="Login">
			<a href="#"> Lost Your Password? </a><br/>
			<a href="register.php"> Don't have an account? </a>
		</form>
	</div>
</header>
<footer> <p>Copyright &copy; 2020 ZZ TIGERS FOOTBALL ACADEMY</p></footer>
</body>
</html>