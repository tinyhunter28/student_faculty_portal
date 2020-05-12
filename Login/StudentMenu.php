<?php
	if(isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1)
	{
		$loginProfile = "My Profile: ". $_SESSION['Roll No.'];
		$logo = "glyphicon glyphicon-user";
			$link = "StudentProfile.php";
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
				<h1><a href="../index.php">Student Faculty Portal</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="StudentProfile.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li><a href="../UploadBooks.php">Upload Books</a></li>
						<li><a href="<?= $link; ?>"><span class="<?php echo $logo; ?>"></span><?php echo" ". $loginProfile; ?></a></li>
						<li><a href="../UploadNotice.php"> Upload Notice</a></li>
						<li><a href="../Report.php"> Reports</a></li>
					</ul>
				</nav>
			</header>

	</body>
</html>