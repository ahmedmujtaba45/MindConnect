<?php
// Start the session
session_start();

// Destroy the session to log the user out
session_destroy();

// Redirect the user to the landing page (or login page)
header("Location: index.php"); // Change index.php to the desired page
exit();
?>
