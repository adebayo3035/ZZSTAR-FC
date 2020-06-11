<?php include ('server.php'); ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LOGIN TUTORIAL HOMEPAGE</title>
</head>
<link rel="stylesheet"href="css/homepage-style.css">
<body>
<header>
	<div class="main">
		<div class="logo">
			<img src="images/logo.png">
		</div>
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Gallery</a></li>
			<li><a href="#">Schedule</a></li>
			<?php if (isset($_SESSION["username"])): ?>
			<li><a href="homepage.php?logout='1'">Logout</a></li>
		<?php endif ?>
		</ul>


	</div>
	<div class="owner">
		<center> <img src ="images/av2.jpg"></center>
		<p> DAYO JOSSY </p>
		<p> TECHNICAL DIRECTOR ZZ TIGERS F.C </p>
		<button> Check Profile </button>
	</div>
	<div class="title">
		<center> <h1> WELCOME </h1>
			<!-- Display Username on Homepage after succesful login -->
		<?php 
			if (isset($_SESSION['success'])): 
		?>
					<h3>
						<?php 
						echo $_SESSION['success'];
						unset($_SESSION['success']);
						?>
					</h3>
			<?php endif ?>
			<?php if (isset($_SESSION["username"])): ?>
				<h2><?php echo $_SESSION["username"]; ?> </h2>

				<?php $myusername= $_SESSION["username"]; ?>
			<?php endif ?>


			<hr>
		<p> To the Center of Grass Root Football</p> <center><br/>
	</div>
	
	<div class="button">
		<a href="#"class="btn"> TRAINING SCHEDULE</a>
		 &nbsp;&nbsp; &nbsp;&nbsp; 
		<a href="#"class="btn"> MATCH SCHEDULE </a>
	</div>
	<div class ="news">
		<h3> Latest News </h3>
		<hr>
		<p> Ibadan Football Association promise to enhance activities & Opportunities for Young People.<br/>
			<a href="#"><button> Read More </button></a></p>
			<p> Annual Inter Inter State Football Competition to commence next Month.<br/>
			<a href="#"><button> Read More </button></a></p>
			<p> Bayern Munich Youth Championship Scouting 2020 is now on going<br/>
			<a href="#"><button> Read More </button></a></p>
			<p> Austin Jay Jay Okocha Promise to support youth Fotball In Nigeria<br/>
			<a href="#"><button> Read More </button></a></p>
			<p> Saul Niguez finally disclose his next Football Club as summer transfer window nears<br/>
			<a href="#"><button> Read More </button></a></p>
	</div>

</header>
<footer> <p>Copyright &copy; 2020 ZZ TIGERS FOOTBALL ACADEMY</p></footer>
</body>
</html>