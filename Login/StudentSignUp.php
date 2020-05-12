<?php
    session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name = dataFilter($_POST['name']);
	$mobile = dataFilter($_POST['mobile']);
	$roll = dataFilter($_POST['roll']);
	$email = dataFilter($_POST['email']);
	$pass =	dataFilter(password_hash($_POST['pass'], PASSWORD_BCRYPT));
	$hash = dataFilter( md5( rand(0,1000) ) );
    $course = dataFilter($_POST['course']);

	$_SESSION['Email'] = $email;
    $_SESSION['Name'] = $name;
    $_SESSION['Password'] = $pass;
    $_SESSION['Roll No.'] = $roll;
    $_SESSION['Mobile'] = $mobile;
    $_SESSION['Hash'] = $hash;
    $_SESSION['Course'] = $course;
}


require '../db.php';

$length = strlen($mobile);

if($length != 10)
{
	$_SESSION['message'] = "Invalid Mobile Number !!!";
	header("location: error.php");
	die();
}

    $sql = "SELECT * FROM student WHERE bemail='$email'";

    $result = mysqli_query($conn, "SELECT * FROM student WHERE bemail='$email'") or die($mysqli->error());

    if ($result->num_rows > 0 )
    {
        $_SESSION['message'] = "User with this email already exists!";
        header("location: error.php");
    }
    else
    {
    	$sql = "INSERT INTO student (bname, broll, bpassword, bhash, bmobile, bemail, bcourse)
    			VALUES ('$name','$roll','$pass','$hash','$mobile','$email','$course')";

    	if (mysqli_query($conn, $sql))
    	{
    	    $_SESSION['Active'] = 1;
            $_SESSION['logged_in'] = true;

            $_SESSION['picStatus'] = 0;
            $_SESSION['picExt'] = png;

            $sql = "SELECT * FROM student WHERE broll='$roll'";
            $result = mysqli_query($conn, $sql);
            $User = $result->fetch_assoc();
            $_SESSION['id'] = $User['bid'];

            if($_SESSION['picStatus'] == 0)
            {
                $_SESSION['picId'] = 0;
                $_SESSION['picName'] = "profile0.png";
            }
            else
            {
                $_SESSION['picId'] = $_SESSION['id'];
                $_SESSION['picName'] = "profile".$_SESSION['picId'].".".$_SESSION['picExt'];
            }
			
            $message_body = "
            Hello '.$user.',

            Thank you for signing up!";

            header("location: StudentProfile.php");
    	}
    	else
    	{
    	    $_SESSION['message'] = "Registration failed!";
            header("location: error.php");
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
