<?php
	if(isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1)
	{
		$loginProfile = "My Profile: ". $_SESSION['Username'];
		$logo = "glyphicon glyphicon-user";
			$link = "FacultyProfile.php";
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
				<h1><a href="index.php">Student Faculty Portal</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="../Login/FacultyProfile.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li><a href="../UploadBooks.php"><span class="glyphicon glyphicon-shopping-cart"> UploadBooks</a></li>
						<li><a href="<?= $link; ?>"><span class="<?php echo $logo; ?>"></span><?php echo" ". $loginProfile; ?></a></li>
						<li><a href="../UploadNotice.php"><span class="glyphicon glyphicon-grain"> UploadNotice</a></li>
						<li><a href="../Report.php"><span class="glyphicon glyphicon-comment"> Reports</a></li>
					</ul>
				</nav>
			</header>

	</body>
</html>
