<?php
	session_start();
	if(isset($_SESSION['fac_logged_in']) AND $_SESSION['fac_logged_in'] == true OR isset($_SESSION['stu_logged_in']) AND $_SESSION['stu_logged_in'] == true)
	{
		if(isset($_SESSION['fac_logged_in']) AND $_SESSION['fac_logged_in'] == true)
		{
			header("Location: ../Login/FacultyProfile.php");
		}
		if(isset($_SESSION['stu_logged_in']) AND $_SESSION['stu_logged_in'] == true)
		{
			header("Location: ../Login/StudentProfile.php");
		}
	}
?>
<!DOCTYPE html>
<html>

<HEAD>
	<title>STUDENT FACULTY PORTAL</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Alegreya:wght@700&display=swap" rel="stylesheet">
	
	<script src="js/jquery.min.js"></script>
	
	<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
	<script src="bootstrap\js\bootstrap.min.js"></script>
	<link rel="stylesheet" href="css\student-lr.css">	


</HEAD>

<body>
		

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="post" action="Login/StudentSignUp.php">
			<h1>Sign Up</h1>
		
			<input type="text" name="name" id="name" value="" placeholder="Name" />
			<input type="email" name="email" id="email" value="" placeholder="Email" required />
			<input type="text" name="roll" id="roll" value="" placeholder="Roll No." required />
			<input type="text" name="mobile" id="mobile" value="" placeholder="Mobile Number" required />
			<input type="password" name="password" id="password" value="" placeholder="Password" required />
			<input type="password" name="pass" id="pass" value="" placeholder="Retype Password" required />
			<select id="course" name="course" required>
										<option value="BCA">BCA</option>
										<option value="BBA">BBA</option>
										<option value="BAM">BAM</option>
									</select>
			<button type="submit" value="Submit" name="submit" class="special">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="post" action="Login/StudentLogin.php">
			<h1>Sign in</h1>
	
			<input type="text" name="roll" id="roll" value="" placeholder="Roll No." />
			<input type="password" name="pass" id="pass" value="" placeholder="Password" />
			<button type="submit" value="Login">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us  please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Bitian!</h1>
				<p>Enter your personal details and start your journey</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

		
			<script src="js/login-hover.js"></script>
		
</body>
</html>