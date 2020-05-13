<?php
 	session_start();
	require 'db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$pid = $_SESSION['id'];
		$bookName = dataFilter($_POST['bookname']);
		$course = dataFilter($_POST['course']);
		$bookDesc = $_POST['bookdesc'];

		$sql = "INSERT INTO fbook (pid, bookname, bcourse, bookdesc)
			   VALUES ('$pid', '$bookName', '$course', '$bookDesc')";
		$result = mysqli_query($conn, $sql);
		if(!$result)
		{
			$_SESSION['message'] = "Unable to upload Book !!!";
			header("Location: Login/error.php");
		}
		else {
			$_SESSION['message'] = "Successful !!!";
		}

		$pdf = $_FILES['bookPdf'];
		$pdfName = $pdf['name'];
		$pdfTmpName = $pdf['tmp_name'];
		$pdfSize = $pdf['size'];
		$pdfError = $pdf['error'];
		$pdfType = $pdf['type'];
		$pdfExt = explode('.', $pdfName);
		$pdfActualExt = strtolower(end($pdfExt));
		$allowed = array('pdf','doc','docx');

		if(in_array($pdfActualExt, $allowed))
		{
			if($pdfError === 0)
			{
				$_SESSION['pdfId'] = $_SESSION['id'];
				$pdfNameNew = $bookName.$_SESSION['pdfId'].".".$pdfActualExt ;
				$_SESSION['bookPdfExt'] = $pdfActualExt;
				$bookDestination = "books/pdf/".$pdfNameNew;
				move_uploaded_file($pdfTmpName, $bookDestination);
				$id = $_SESSION['id'];

				$sql = "UPDATE fbook SET pdfStatus=1, bpdf='$pdfNameNew' WHERE bookname='$bookName';";

				$result = mysqli_query($conn, $sql);
				if($result)
				{

					$_SESSION['message'] = "Book Uploaded successfully !!!";
					header("Location: bookMenu.php");
				}
				else
				{
					$_SESSION['message'] = "There was an error in uploading your Book! Please Try again!";
					header("Location: Login/error.php");
				}
			}
			else
			{
				$_SESSION['message'] = "There was an error in uploading your Book! Please Try again!";
				header("Location: Login/error.php");
			}
		}
		else
		{
			$_SESSION['message'] = "You cannot upload files with this extension!!!";
			header("Location: Login/error.php");
		}
	}

	function dataFilter($data)
	{
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Faculty Portal</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap\js\bootstrap.min.js"></script>
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="login.css"/>
		<link rel="stylesheet" type="text/css" href="indexFooter.css">
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
	<body>

		<?php require 'Login/FacultyMenu.php'; ?>

		<!-- One -->

			<section id="banner_fac" class="wrapper style1 align-center">
				<div class="container">
					<form method="POST" action="UploadBooks.php" enctype="multipart/form-data">
						<h2>Enter the BOOK Information here..!!</h2>
						<br>
						<input type="file" name="bookPdf" style="background-color:white;color: black;"></input>
						<br>
						<div class="row">
						<div class="col-sm-6">
							<input type="text" name="bookname" id="bookname" value="" placeholder="Book Name" style="background-color:white;color: black;" />
						<br>
							<input type="text" name="bookdesc" id="bookdesc" value="" placeholder="Book Description" style="background-color:white;color: black;" />
						<br>
							<select id="course" name="course" style="background-color:white;color: black;" required>
								<option value="BCA">BCA</option>
								<option value="BBA">BBA</option>
								<option value="BAM">BAM</option>
							</select>
						<br>
							<button class="button fit" style="width:auto; color:black;">Submit</button>
						</div>
						</div>
					</form>
				</div>
			</section>
	</body>
</html>
