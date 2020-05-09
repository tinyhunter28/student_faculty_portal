<!DOCTYPE html>
<html>

<HEAD>
<title>STUDENT FACULTY PORTAL</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">

<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
<script src="bootstrap\js\bootstrap.min.js"></script>


<script src="js/jquery.min.js"></script>
<script src="js/skel.min.js"></script>
<script src="js/skel-layers.min.js"></script>
<script src="js/init.js"></script>
		

</HEAD>

<body>

<!-- Content will go here -->
<section id="banner_fac" class="wrapper">
	<div class="container">
		<h2>FACULTY PORTAL</h2>
                <br><br>
				<center>
					<div class="row uniform">
						<div class="6u 12u$(xsmall)">
							<button class="button fit" onclick="studentportal()" style="width:auto">STUDENT LOGIN</button>
						</div>

						<div class="6u 12u$(xsmall)">
							<button class="button fit" onclick="facultyportal()" style="width:auto">FACULTY LOGIN</button>
						</div>
                    </div>
    
				</center>
    </div>

</section>
<script>
function studentportal()
{
     location.href = "student.php";
} 

function facultyportal()
{
     location.href = "faculty.php";
} 
</script>


</body>
</html>