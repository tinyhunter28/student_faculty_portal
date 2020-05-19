<?php
    session_start();

	if(!isset($_SESSION['stu_logged_in']) OR $_SESSION['stu_logged_in'] != 1)
	{
		$_SESSION['message'] = "You have to Login to view this page!";
		header("Location: Login/error.php");
	}
?>

<!DOCTYPE HTML>

<html lang="en">
    <head>
        <title>Profile: <?php echo $_SESSION['Roll No.']; ?></title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap\js\bootstrap.min.js"></script>
        <meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="login.css"/>
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />

    </head>


    <body>

        <?php
            require 'Login/StudentMenu.php';
        ?>

        <section id="banner_stu" class="wrapper style1 align">
            <div class="inner">
                <div class="box">
                <header>
                    <center>
                    <span><img src="<?php echo 'images/profileImages/'.$_SESSION['picName'].'?'.mt_rand(); ?>" class="image-circle" class="img-responsive" style="width:256px;height:256px;"></span>
                    <br>
                    <h2><?php echo $_SESSION['Name'];?></h2>
                    <h4 style="color: white;"><?php echo $_SESSION['Roll No.'];?></h4>
                    <br>
                </center>
                </header>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <b><font size="+1" color="white">Email ID : </font></b>
                            <font size="+1"><?php echo $_SESSION['Email'];?></font>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <b><font size="+1" color="white">Mobile No : </font></b>
                            <font size="+1"><?php echo $_SESSION['Mobile'];?></font>
                        </div>
                        <div class="col-sm-3">
                            <b><font size="+1" color="white">Course : </font></b>
                            <font size="+1"><?php echo $_SESSION['Course'];?></font>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                        <div class="12u$">
                            <center>
                                <div class="row uniform">
                                    <div class="3u 12u$(large)">
                                        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto">Change Password</button>
                                    </div>
                                    <div class="3u 12u$(large)">
                                        <button onclick="document.getElementById('id02').style.display='block'" style="width:auto">Edit Profile</button>
                                    </div>
                                    <div class="3u 12u$(large)">
                                        <button onclick="logout()" style="width:auto">Log Out</button>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </section>

		<!--Student Password Change-->

		<div id="id01" class="modal">
			<form class="modal-content animate" action="changeStudentPass.php" method='POST'>
		
			<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
			</div>

			<div class="container">
			<h3>Change Password</h3>
				<form method="post" action="changeStudentPass.php">
					<div class="row uniform 50%">
						<div class="7u$">
							<input type="password" name="currPass" id="currPass" value="" placeholder="Current Password" style="width:80%" required/>
						</div>
						<div class="7u$">
							<input type="password" name="newPass" id="newPass" value="" placeholder="New Password" style="width:80%" required/>
						</div>
						<div class="7u$">
							<input type="password" name="conNewPass" id="conNewPass" value="" placeholder="Confirm New Password" style="width:80%" required/>
						</div>
					</div>
					<center>
					<div class="row uniform">
						<div class="7u 12u$(small)">
							<input type="submit" value="Submit" />
						</div>
					</div>
					</center>
				</form>
			</div>
		
			</form>
		</div>
		
		<!-- Edit Profile -->

		<div id="id02" class="modal">
			<form class="modal-content animate" action="StudentprofileEdit.php" method='POST'>
		
			<div class="imgcontainer">
				<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
			</div>

			<div class="container">
			<h3>Edit Profile</h3>
				<form method="post" action="StudentprofileEdit.php">
					<div class="row uniform 50%">
						<div class="7u$">
							<input type="text" name="newName" id="newName" value="" placeholder=" New Name"/>
						</div>
						<div class="7u$">
							<input type="text" name="newRoll" id="newRoll" value="" placeholder=" New Roll No." />
						</div>
						<div class="7u$">
							<input type="text" name="newMobile" id="newMobile" value="" placeholder=" New Mobile Number" />
						</div>
						<div class="7u$">
							<input type="email" name="newEmail" id="newEmail" value="" placeholder="New Email" />
						</div>
						<div class="7u$">
							<div class="6u 12u$(xsmall)">
								<select id="newCourse" name="newCourse" required>
									<option value="BCA">BCA</option>
									<option value="BBA">BBA</option>
									<option value="BAM">BAM</option>
								</select>
							</div>
						</div>
					</div>
					<center>
					<div class="row uniform">
						<div class="7u 12u$(small)">
							<input type="submit" value="Submit" />
						</div>
					</div>
					</center>
				</form>
			</div>
		
			</form>
		</div>
		
		<script>
		function logout()
		{
			location.href = "Login/logout.php";
		} 
		</script>

    </body>
</html>
