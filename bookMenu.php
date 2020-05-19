<?php
	session_start();
	require 'db.php';
	if(isset($_SESSION['fac_logged_in']) AND $_SESSION['fac_logged_in'] == true OR isset($_SESSION['stu_logged_in']) AND $_SESSION['stu_logged_in'] == true)
	{
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Book Menu</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap\js\bootstrap.min.js"></script>
		<link rel="stylesheet" href="login.css"/>
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<style>
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
		}
		th, td {
			padding: 15px;
			text-align: left;
			}
	</style>
	
	<?php
	
	if(isset($_SESSION['fac_logged_in']) AND $_SESSION['fac_logged_in'] == true) {
	?>
	<body class>
		<?php 
		
		require 'Login/FacultyMenu.php';
		function dataFilter($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		?>

		<!-- One -->
			<section id="main" class="wrapper style1 align-center" >
				<div class="container">
						<h2>Welcome to Book Menu</h2>

				<section id="two" class="wrapper style2 align-center">
				<div class="container">
				<?php
					$sql = "SELECT * FROM fbook WHERE 1";
					$result = mysqli_query($conn, $sql);
				?>
					<div class="row">
					
						<?php while($row = $result->fetch_array()):
							$pdfDestination = "books/pdf/".$row['bpdf'];
						?>

							<table>
							<tr>
							<th>Book Name</th>
							<th>Book Description</th>
							<th>Course</th>
							<th>Link</th>
							<th>Action</th>
							</tr>
							<tr>
							<td><?php echo $row['bookname'].'';?></td>
							<td><?php echo "Description : ".$row['bookdesc'];?></td>
							<td><?php echo "Course : ".$row['bcourse'].'';?></td>
							<td><a href="<?php echo $pdfDestination;?>" style="color:red"/>Click Here</a></td>
							<td><a href="delete-process.php?id=<?php echo $row["pid"]; ?>" style="color:red"/>Delete</a></td>
							</tr>
							</table>

						<?php endwhile;	?>

					</div>

				</section>

			</section>

	</body>
	<?php 
	} else if(isset($_SESSION['stu_logged_in']) AND $_SESSION['stu_logged_in'] == true)
	{
	?>
	
	<body class>
		<?php 
			require 'Login/StudentMenu.php';
			function dataFilter($data)
			{
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		?>

		<!-- One -->
			<section id="main" class="wrapper style1 align-center" >
				<div class="container">
						<h2>Welcome to Book Menu</h2>

				<section id="two" class="wrapper style2 align-center">
				<div class="container">
				<?php
					$course = $_SESSION['Course'];
					$sql = "SELECT * FROM fbook WHERE bcourse='$course'";
					$result = mysqli_query($conn, $sql);
				?>
					<div class="row">
					
						<?php while($row = $result->fetch_array()):
							$pdfDestination = "books/pdf/".$row['bpdf'];
						?>

							<table>
							<tr>
							<th>Book Name</th>
							<th>Book Description</th>
							<th>Course</th>
							<th>Link</th>
							</tr>
							<tr>
							<td><?php echo $row['bookname'].'';?></td>
							<td><?php echo "Description : ".$row['bookdesc'];?></td>
							<td><?php echo "Course : ".$row['bcourse'].'';?></td>
							<td><a href="<?php echo $pdfDestination;?>" style="color:red"/>Click Here</a></td>
							</tr>
							</table>

						<?php endwhile;	?>

					</div>

				</section>

			</section>

	</body>
	<?php } ?>
</html>
<?php 
	} else
	{
	$_SESSION['message'] = "You have to Login to view this page!";
		header("Location: Login/error.php");
	}
?>