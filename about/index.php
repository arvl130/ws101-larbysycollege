<!DOCTYPE html>
<html>
<head>
	<title>About Us | Larby Sy School</title>
	
	<!--Page global resources-->
	<?php
		require('../globals/resources.html');
	?>

	<!--Page local resources-->
	<link rel="stylesheet" href="style.css">
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