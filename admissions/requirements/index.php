<!DOCTYPE html>
<html>
<head>
	<!--Page title-->
	<title>Entrance Requirements | Larby Sy School</title>

	<!--Page global resources-->
	<?php
		require('../../globals/resources.html');
	?>

	<!--Page local resources-->
	<script src="/admissions/requirements/index.js"></script>
</head>
<body onload="pageInit()">
	<?php
		// Navbar drop-down animations
		include('../../globals/navbar/dropdown.html');

		// Navbar login popup
		include('../../globals/navbar/login-popup.html');

		// Navbar
		include('../../globals/navbar/navbar.html');

		// Main content
		include('mainbody.html');

		// Footer
		include('../../globals/footer.html');
	?>
</body>
</html>