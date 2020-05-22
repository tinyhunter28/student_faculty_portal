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
			<header id="header">
				<h1><a href="../Login/FacultyProfile.php">Student Faculty Portal</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="../Login/FacultyProfile.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li><a href="../UploadBooks.php"> Upload Books</a></li>
						<li><a href="../bookMenu.php"> Book Menu</a></li>
						<li><a href="<?= $link; ?>"><span class="<?php echo $logo; ?>"></span><?php echo" ". $loginProfile; ?></a></li>
						<li><a href="../UploadNotice.php"> UploadNotice</a></li>
						<li><a href="../Report.php"> Reports</a></li>
					</ul>
				</nav>
			</header>

	</body>
</html>
