<?php 

session_start();
require_once('../internals/db-conn.php');

if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];
		
	if(!empty($email) && !empty($password))
	{
		$sql_cmd = "SELECT * FROM login WHERE email = ?";
		$sql = $conn -> prepare($sql_cmd);
		$sql -> bind_param('s', $email);

		if ($sql -> execute()) {
			$result = $sql -> get_result();

			if($result -> num_rows == 1)
			{
				while ($row = $result -> fetch_assoc()) {
					if (password_verify($password, $row["password"])) {
						$_SESSION['firstname'] = $row['firstname'];
						$_SESSION['lastname'] = $row['lastname'];
						$_SESSION['bday'] = $row['birthday'];
						$_SESSION['gender'] = $row['gender'];
						$_SESSION['course'] = $row['course'];
						$_SESSION['email'] = $row['email'];

						header('Location: ../student-profile');
					}
				}
			}
			else
			{
				$error = "Wrong password or email!";
				die($error);
			}
		}
		else
		{	
			$error = "Password and Email required!";
		}

		$sql -> close();
		$conn -> close();
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log in | Larby Sy College</title>
	
	<!--Page global resources-->
	<?php
		require('../globals/resources.html');
	?>
</head>
<body>
	<div id="upper-bar" class="upper-bar">
		<img class="nav-logo" src="/res/school-logo2.png">
		<h2 class="school-name">Larby Sy College</h2>
	</div>

	<div class="main-login" >
		<div class="sub-login">
			<h1><i class="fas fa-user person"></i></h1>

			<h2>Student Portal</h2>
			<hr>
			<form method="POST" class="log-form">
			<table>
				<tr>
					<td><label>Email:</label></td>
					<td><input type="text" name="email" placeholder="*Email" class="log-input"></td>
				</tr>
				<tr>
					<td><label>Password:</label></td>
					<td><input type="password" name="password" placeholder="*Password" class="log-input"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Log in" name="submit" class="log-submit"></td>
					<td style="color: red;text-decoration:underline;"><?php if (!empty($error)) echo $error; ?></td>
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