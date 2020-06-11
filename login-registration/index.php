<?php include ('server.php'); ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet"href="css/index-style.css">
	<title>Index Page </title>
</head>
<body>
	<div class="header">
		<h2> Home Page </h2>
	</div>
	<div class="content">
		<?php 
			if (isset($_SESSION['success'])): ?>
				<div class="error success">
					<h3>
						<?php 
						echo $_SESSION['success'];
						unset($_SESSION['success']);
						?>
					</h3>
				</div>
			<?php endif ?>
			<?php if (isset($_SESSION["username"])): ?>
				<p> Welcome <strong> <?php echo $_SESSION["username"]; ?> </strong> </p>
				<?php $myusername= $_SESSION["username"]; ?>
				<p> <a href="index.php?logout='1'"> Logout</a></p>
			<?php endif ?>
			
		</div>
	

</body>
</html>