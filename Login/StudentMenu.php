<?php
	if(isset($_SESSION['stu_logged_in']) AND $_SESSION['stu_logged_in'] == true)
	{
		$loginProfile = "My Profile: ". $_SESSION['Roll No.'];
		$link = "../StudentProfileView.php";
	}
	else
	{
		$loginProfile = "Login";
		$link = "../index.php";
	}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">	
		<title>Student Faculty Portal</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link href="../css/template.css" rel="stylesheet">
		<link href="../css/student-profile.css" rel="stylesheet">
	</head>

	<body>
		<!--Header Template-->
		<header>
			<div class="menu-toggle" id="hamburger">
				<i class="fas fa-bars"></i>
			</div>
			<div class="overlay"></div>
			<div class="container">
				<nav>
				<h1 class="brand"><a href="../Login/StudentProfile.php">Student<span>Faculty</span>Portal</a></h1>
				<ul>
					<li><a href="../Login/StudentProfile.php">Home</a></li>
					<li><a href="<?= $link; ?>"><?php echo" ". $loginProfile; ?></a></li>
					<li><a href="../bookMenu.php">Book Menu</a></li>
					<li><a href="../NoticeMenu.php">Notice Menu</a></li>
					<li><a href="../miscMenu.php">Attendence/Marksheet</a></li>
					<li><a href="../query.php">Send Query</a></li>
				</ul>
				</nav>
			</div>
	
	<!--Put YOur COntent After This -->
	<section class="content-section">