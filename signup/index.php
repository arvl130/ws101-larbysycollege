<?php
session_start();

if ($_SESSION['auth_status'] == "allowed") {
	header('Location: /');
} else {
	$login_visibility = "visible";
	$logout_visibility = "hidden";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign up | Larby Sy College</title>
	
	<!--Page global resources-->
	<?php
		require('../globals/resources.html');
	?>
</head>

<body>
	<?php
		session_start();
		if ($_SERVER['REQUEST_METHOD'] == "POST") 
		{
			if(isset($_POST['submit']))
			{
				$first_name = $_POST['firstname'];
				$last_name = $_POST['lastname'];
				$birthdate = $_POST['date'];
				$gender=$_POST['gender'];
				$course=$_POST['course'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$confirm_password = $_POST['conpassword'];

				if (empty($first_name)||
					empty($last_name)||
					empty($password) ||
					empty($birthdate) ||
					empty($email) ||
					empty($password) ||
					empty($confirm_password)
					) {
						$error_message = "Please fill out all form entries.";
				}					
				else if($password != $confirm_password) {
					$error_message1="Confirmation password does not match.";
				}
				else if(strpos($email,"@")!=true) {
					$error_message3="You have entered an invalid email address. Please retry.";
				}
				else {
					require_once('../internals/db-conn.php');

					$sql_check_cmd = "SELECT * FROM login WHERE email = ?";
					$sql_check = $conn -> prepare($sql_check_cmd);
					$sql_check -> bind_param("s", $email);

					if ($sql_check -> execute()) {
						$result = $sql_check -> get_result();
						
						if($result -> num_rows > 0)
						{							
							$error_message4 = "Email already taken";
						} else {
							$hashed_password = password_hash($password, PASSWORD_DEFAULT);

							$sql_register_cmd = "INSERT INTO login(firstname, lastname, birthday, gender, course, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
							$sql_register = $conn -> prepare($sql_register_cmd);
							$sql_register -> bind_param("sssssss", $first_name, $last_name, $birthdate, $gender, $course, $email, $hashed_password);
							
							if($sql_register -> execute()) {
								echo "<script type='text/javascript'>alert('Account successfully created!'); </script>";
								header("location: ../login"	);   
							} else {
								die('SQL Error occured ):');		
							}

							$sql_register -> close();
						}

						$sql_check -> close();
					} else {
						die('SQL Error occured ):');
					}
					$conn -> close();
				}
			}
		}
	?>

	<?php
		// Navbar drop-down animations
		include('../globals/navbar/dropdown.html');

		// Navbar login popup
		include('../globals/navbar/login-popup.html');

		// Navbar
		include('../globals/navbar/navbar.html');
	?>

	<div class="main-app">
		<h2 class="app-title">Sign up</h2>
		<hr>
			<div class="sec1-app">
				<form method="POST" action="">
					<div  class="warnings" >
						<?php
							
							if(!empty($error_message))
							{
								echo "<h3>".$error_message."</h3>";
								
							} 
							if(!empty($error_message1))
							{
								echo "<h3>".$error_message1."</h3>";
								
							} 
							if(!empty($error_message2))
							{
								echo "<h3>".$error_message2."</h3>";
								
							}
							if(!empty($error_message3))
							{
								echo "<h3>".$error_message3."</h3>";
								
							} 
							if(!empty($error_message4))
							{
								echo "<h3>".$error_message4."</h3>";
								
							}   
						?>
					</div>
					<table>
						<tr>
							<td><label>First Name :</label></td>
							<td><input type="text" name="firstname" placeholder="*First Name" class="input-name"></td>
						</tr>
						<tr>
							<td><label>Last Name :</label> </td>
							<td><input type="text" name="lastname" placeholder="*Last Name" class="input-name"></td>
						</tr>
						<tr>
							<td><label>Birthday :</label> </td>
							<td><input type="date" name="date" placeholder="*Date" class="input-name"></td>
						</tr>
						<tr>
							<td><label>Gender :</label> </td>
							<td><select name="gender">
								<option >--select--</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option></select></td>
						</tr>
						<tr>
							<td><label>Course :</label> </td>
							<td><select name="course">
								<option >--select--</option>
								<option value="BS Psychology">BS Psychology</option>
								<option value="BS Information Technology">BS Information Technology</option>
								<option value="BS Computer Science">BS Computer Science</option>
								<option value="BS Accountancy">BS Accountancy</option>
								<option value="BS Entrepreneurship">BS Entrepreneurship</option>
								<option value="BS Hotel and Restaurant">BS Hotel and Restaurant</option>
								<option value="BS Civil Enginnering">BS Civil Enginnering</option>
								<option value="BS Industrial Enginnering">BS Industrial Enginnering</option>
								<option value="BS Electrical Enginnering">BS Electrical Enginnering</option>
								<option value="BS Mechanical Enginnering">BS Mechanical Enginnering</option>
								<option value="Master in Buisness Administration">Master in Buisness Administration</option>
								<option value="MS Criminology">MS Criminology</option>
								<option value="MS Psychology">MS Psychology</option>
							</select></td>
						</tr>
						<tr>
							<td><label>Email :</label></td>
							<td><input type="text" name="email" placeholder="*Email" class="input-name"></td>
						</tr>
						<tr>
							<td><label>Password :</label></td>
							<td><input type="password" name="password" placeholder="*Password" id="pass1" class="input-name"></td>
						</tr>
						<tr>
							<td><label>Confirm Password :</label></td>
							<td><input type="password" name="conpassword" placeholder="*Confirm Password" id="pass2" class="input-name"></td>
						</tr>
						<tr>
							<td><button type="submit" value="submit" name="submit" class="submit1">Register</button></td>
							<td><h4>Already Registered? <a href="/login">Log in</a></h4></td>
						</tr>
					</table>
				</form>
			</div>
	</div>

	<?php
		// Footer
		include('../globals/footer.html');
	?>
</body>
</html>