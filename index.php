<?php 
session_start();
?>
<!-- INDEX -->

<!DOCTYPE html>
<html>
<head>
	<?php
		// Page global resources
		require('globals/resources.html');
	?>
</head>

<body>

<?php
	// Navbar drop-down animations
	include('globals/navbar/dropdown.html');

	// Navbar login popup
	include('globals/navbar/login-popup.html');

	// Navbar
	include('globals/navbar/navbar.html');

	// Main content
	include('home/mainbody.html');

	// Footer
	include('globals/footer.html');
?>  
</body>
</html>