<?php
session_start();
$username="";
$email="";
$errors=array();
$success=array();
//Connect to Database
$db = mysqli_connect('localhost','root','','registration');
//If the register button is clicked
if(isset($_POST['register'])){
	$username= mysqli_real_escape_string($db, $_POST['username']);
	$email= mysqli_real_escape_string($db, $_POST['email']);
	$password_1= mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2= mysqli_real_escape_string($db, $_POST['password_2']);
	/* To ensure that the form fields are field properly 
	if(empty($username)){
		array_push($errors, "Username is required");
	}
	if(empty($email)){
		array_push($errors, "E-mail is required");
	}
	if(empty($password)){
		array_push($errors, "Password is required");
	}

	*/
	// CHECK IF PASSWORD == CONFIRM PASSWORD
	if($password_1 != $password_2 ){
		array_push($errors, "The two password does not match");
		
	}
	// Invalidate Username to be the sane as Password
	if($username == $password_1 ){
		array_push($errors, "Username and Password Cannot be the same");
		
	}
	//PASSWORD VALIDATION TO CONTAIN AT LEAST ONE NUMBER 
	if(!preg_match("#[0-9]+#", $password_1)){
		array_push($errors,"Password must contain at least one number");
	}
	//PASSWORD VALIDATION TO CONTAIN AT LEAST  ONE CHARACTER
	if(!preg_match("#[a-zA-Z]+#", $password_1)){
		array_push($errors,"Password must contain at least one Character");
	}
	//LENGTH OF PASSWORD MUST BE HIGHER THAN 5 CHARACTERS
	if(strlen($password_1) < 5 ){
		array_push($errors, "Password is too Weak");
		
	}
	//Username Validation
	//LENGTH OF USERNAME MUST BE HIGHER THAN 5 CHARACTERS
	if(strlen($username) < 5 ){
		array_push($errors, "Username is too Weak");
		$username="";
		
	}
	//Must Contain Only Letters and White Spaces
	
	if(!preg_match("/^[a-zA-Z][a-zA-Z0-9_]*$/", $username)){
		array_push($errors,"Username can only start with a letter, contain digits and underscore");
		$username="";
	 } 
	//E-MAIL VALIDATION
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		array_push($errors,"Invalid E-mail Address");
		 $email="";
	}

	//Check if Username or Password already exist in Database
	try{
		$query_username = "SELECT username FROM users WHERE username= '".$username."'";

		$query_email = "SELECT email FROM users WHERE email= '".$email."'";
		$query_result_username=mysqli_query($db,$query_username) or die(mysql_error()) ;
		$fetch_username= mysqli_fetch_array($query_result_username);

		$query_result_email=mysqli_query($db,$query_email) or die(mysql_error());
		$fetch_email= mysqli_fetch_array($query_result_username);

		$count_username= mysqli_num_rows($query_result_username);
		$count_email= mysqli_num_rows($query_result_email);

		if($count_username >= 1){
			array_push($errors, "Username Already Taken");
			$username="";
		}

		if($count_email >= 1){
			array_push($errors,"Email already Taken") ;
			$email="";
		}

	}
	catch (Exception $e){
		array_push($errors, $e.getMessage());
	}
	
	
	//if there are no errors then  save User to Database
	if(count($errors)==0){
		$password=md5($password_1); // encrypt password before storing in database

		
		$sql = "INSERT INTO users(username,email,password)VALUES('$username','$email','$password')";

		$result = mysqli_query($db,$sql);
			if($result){
			array_push($success,"Registration Successful");
			$username="";
			$email="";
			$password_1="";
			$password_2="";
			}
		}
	}


//LOG USER IN FROM LOGIN PAGE
			//login is the name of login button
if(isset($_POST['login'] )){
	$username= mysqli_real_escape_string($db, $_POST['username']);
	$password= mysqli_real_escape_string($db, $_POST['password']);
	if(count($errors)==0){
		$password=md5($password); //encrypt password to match the password saved in the database
		$query = "SELECT * FROM users WHERE username= '".$username."' AND password = '".$password."'";
		$result=mysqli_query($db,$query);
		if(mysqli_num_rows($result)==1){
			//Log User Into the System
			$_SESSION['username'] =	$username;
			$_SESSION['success']="You are now Logged In as:";
			header('location: homepage.php');
			 // redirect to homepage after successful Login
		}else{
			array_push($errors, "Wrong Username/Password");

		}
		$username="";
		$password="";

	}
}

//Log Out Query to Unset Session
if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['username']);
	unset($myusername);
	header('location:login.php');

}
	
?>
