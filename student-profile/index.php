<?php 
session_start();

if ($_SESSION['auth_status'] != "allowed")
	header('Location: /');

$login_visibility = "hidden";
$logout_visibility = "visible";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Wellcome | Larby Sy School</title>
	
	<!--Page global resources-->
	<?php
		require('../globals/resources.html');
	?>

	<!--Page local resources-->
	<script src="/student-profile/script.js"></script>
</head>

<body>
	<?php
		// Navbar drop-down animations
		include('../globals/navbar/dropdown.html');

		// Navbar login popup
		include('../globals/navbar/login-popup.html');

		// Navbar
		include('../globals/navbar/navbar.html');
	?>

	<div class="stud-main">
		<div stud-sub>
			<section onclick="show1();" class="sections ">
				<h3 class="s1">Student Profile <i class="fas fa-chevron-right"></i></h3>
			</section>
			<div class="hide show1" id="show1">
				<table>
					<tr>
						<td>Student Name :</td>
						<td><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></td>
					</tr>
					<tr>
						<td>Birthday :</td>
						<td><?php echo $_SESSION['bday']; ?></td>
					</tr>
					<tr>
						<td>Gender: </td>
						<td><?php echo $_SESSION['gender']; ?></td>
					</tr>
					<tr>
						<td>Course: </td>
						<td><?php echo $_SESSION['course']; ?></td>
					</tr>
					<tr>
						<td>Email: </td>
						<td><?php echo $_SESSION['email']; ?></td>
					</tr>
				</table>
			</div>


			<section onclick="show2();" class="sections s2">
				<h3 class="s1">Grades <i class="fas fa-chevron-right"></i></h3>
			</section>
			<div class="hide show2" id="show2">
				<table>
					<tr>
						<td>English :</td>
						<td>94</td>
					</tr>
					<tr>
						<td>Filipino :</td>
						<td>89</td>
					</tr>
					<tr>
						<td>Math :</td>
						<td>85</td>
					</tr>
					<tr>
						<td>Science :</td>
						<td>97</td>
					</tr>
					<tr>
						<td>Mapeh: </td>
						<td>85</td>
					</tr>
				</table>
			</div>


			<section onclick="show3();" class="sections s3">
				<h3 class="s1">Schedules <i class="fas fa-chevron-right"></i></h3>
			</section>
			<div class="hide" id="show3">
				<h3>Schedule list not yet available</h3>
			</div>


			<section onclick="show4();" class="sections s4">
				<h3 class="s1">Teachers <i class="fas fa-chevron-right"></i></h3>
			</section>
			<div class="hide" id="show4">
				<h3>Teacher list not yet available</h3>
			</div>


			<section onclick="show5();" class="sections s5 ">
				<h3 class="s1"> Announcements <i class="fas fa-chevron-right"></i></h3>
			</section>
			<div class="hide" id="show5">
				<h3>No Announcement</h3>
			</div>		
		</div>
		
	</div>

	<footer class="foot">
		<h5>&#169; Copyright 2020 Larby Sy College</h5>
	</footer>
</body>
</html>