

<?php
// Database connection settings
$servername = "localhost"; // Database server
$username = "root"; // Database username
$password = ""; // Database password (if any)
$dbname = "mindconnect"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>