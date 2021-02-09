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

<!DOCTYPE html>
<html>
<head>
	<title>Academic | Larby Sy School</title>
	
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