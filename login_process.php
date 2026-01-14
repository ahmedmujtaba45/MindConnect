<?php
// Include database connection
include('db.php');

// Start session
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    // Get form input data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input
    if (empty($email) || empty($password)) {
        echo "Email and Password are required!";
        exit();
    }

    // Check if the email exists in the database
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // If user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start session and store user data
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            // Redirect to home page after successful login
            header("Location: home.php"); // Change to your desired page after login
            exit();
        } else {
            echo "Incorrect password!";
            exit();
        }
    } else {
        echo "No user found with that email!";
        exit();
    }
}
?>
