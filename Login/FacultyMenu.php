<?php
	if(isset($_SESSION['fac_logged_in']) AND $_SESSION['fac_logged_in'] == true)
	{
		$loginProfile = "My Profile: ". $_SESSION['Username'];
		$logo = "glyphicon glyphicon-user";
			$link = "../FacultyProfileView.php";
	}
	else
	{
		$loginProfile = "Login";
		$link = "../index.php";
		$logo = "glyphicon glyphicon-log-in";
	}
?>

<!DOCTYPE html>
		<html>
		<body>
			<header>
		<div class="menu-toggle" id="hamburger">
			<i class="fas fa-bars"></i>
		</div>
		<div class="overlay"></div>
		<div class="container">
			<nav>
				<h1 class="brand"><a href="/Login/FacultyProfile.php">Student<span>Faculty</span>Portal</a></h1>
				<ul>
					<li><a href="../FacultyProfileView.php">Home</a></li>
					<li><a href="../UploadBooks.php">Upload Books</a></li>
					<li><a href="../BookMenu.php">Book Menu</a></li>
					<li><a href="../UploadNotice.php">Upload Notice</a></li>
					<li><a href="../NoticeMenu.php">Notice Menu</a></li>
					<li><a href="../UploadMiscell.php">Upload Attendence/ Marksheet</a></li>
					<li><a href="../miscMenu.php">Show Attendence/ Marksheet</a></li>
					<li><a href="../query.php">Show Queries</a></li>
				</ul>
			</nav>
		</div>
		<section class="content-section">

	</body>
</html>