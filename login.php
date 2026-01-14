<?php
// Include the database connection
include('db.php');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the user inputs
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if the user exists
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    // Check if a user is found
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Start the session and store user info in session variables
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            
            // Redirect to the home page after successful login
            header("Location: home.php");
            exit();
        } else {
            $error_message = "Incorrect password. Please try again.";
        }
    } else {
        $error_message = "No user found with that email address.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MindConnect</title>
    <link rel="stylesheet" href="login.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header class="page-header">
        <h1>Welcome Back!</h1>
        <p>Login to your MindConnect account</p>
    </header>

    <main class="login-form-container">
        <!-- Display error message if any -->
        <?php
        if (isset($error_message)) {
            echo "<p class='error-message'>$error_message</p>";
        }
        ?>

        <!-- Login Form -->
        <form action="login.php" method="POST" class="login-form">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit" class="btn primary">Login</button>
        </form>
        <a href="registration.php" class="btn secondary">Don't have an account? Register</a>
    </main>

    <footer>
        <a href="index.html" class="btn secondary">Back to Home</a>
    </footer>
</body>
</html>
