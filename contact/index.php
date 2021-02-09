<?php
session_start();

if ($_SESSION['auth_status'] == "allowed") {
	$login_visibility = "hidden";
	$logout_visibility = "visible";
} else {
	$login_visibility = "visible";
	$logout_visibility = "hidden";
}
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST") 
    {

if (isset($_POST['submit'])) 
{
	
	if(empty($_POST['name'])||empty($_POST['email'])||empty($_POST['body_msg']))
        {
            $error_message="fill out all";
        }
        else
        {
        	$conn = new mysqli('localhost', 'root', '', 'student_data');
        	
        	$sql = $conn -> prepare("INSERT INTO message_db(name,email,message) VALUES ( ?, ?, ?)");
        	$name=$_POST['name'];
			$email=$_POST['email'];
			$message=$_POST['body_msg'];

			$sql -> bind_param("sss", $name, $email, $message);


			if($sql -> execute())
             {	 
             	
                 $confirm="Message Sent!";
             }
        }
}



}


 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Contact Us | Larby Sy School</title>

	<!--Page global resources-->
	<?php
		require('../globals/resources.html');
	?>
</head>
<body>
	<?php
		// Navbar drop-down animations
		include('../globals/navbar/dropdown.html');

		// Navbar login popup
		include('../globals/navbar/login-popup.html');

		// Navbar
		include('../globals/navbar/navbar.html');

		// Main content
		include('mainbody.html');

		// Footer
		include('../globals/footer.html');
	?>
</body>
</html>