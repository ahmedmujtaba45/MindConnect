<?php
session_start();
include 'db.php'; // Assumes you have a database connection file.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id']; // Assuming the user ID is stored in session.
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    // Handle file upload (if profile picture is updated).
    if (!empty($_FILES['profilePicture']['name'])) {
        $profilePic = addslashes(file_get_contents($_FILES['profilePicture']['tmp_name']));
        $sql = "UPDATE users SET name='$name', email='$email', age='$age', profile_pic='$profilePic' WHERE id='$userId'";
    } else {
        $sql = "UPDATE users SET name='$name', email='$email', age='$age' WHERE id='$userId'";
    }

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Profile updated successfully!";
        header("Location: home.php");
    } else {
        $_SESSION['error_message'] = "Error updating profile.";
        header("Location: profile.php");
    }
}
?>
