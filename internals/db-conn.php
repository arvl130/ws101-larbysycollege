<?php
    // Define host and user for database.
    //
    // Use root and localhost for the least issues.
    $db_host = "localhost";
    $db_user = "root";

    // Grab database name and password from
    // environment variables.
    $db_name = getenv('DB_NAME');
    $db_password = getenv('DB_PASSWORD');

    // Exit immediately when no database is specified.
    if (empty($db_name)) {
        die('No database name specified for website.');
    }
    
    // Try to launch new connection.
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    
    // Exit immediately when a connection cannot be established.
    if (mysqli_connect_error()) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>