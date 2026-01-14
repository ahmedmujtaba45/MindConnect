<?php
include('db.php'); // Include the database connection file

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve user input from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $country = $_POST['country'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // Validation checks
    if ($password == $confirm_password) {
        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if the email already exists in the database
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $error_message = "Email already exists!";
        } else {
            // Insert the new user data into the database
            $insert_query = "INSERT INTO users (name, email, age, country, password) VALUES ('$name', '$email', '$age', '$country', '$hashed_password')";
            if (mysqli_query($conn, $insert_query)) {
                $success_message = "Registration successful! Please <a href='login.php'>login</a> to proceed.";
            } else {
                $error_message = "Error: " . mysqli_error($conn);
            }
        }
    } else {
        $error_message = "Passwords do not match!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - MindConnect</title>
    <link rel="stylesheet" href="registration.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header class="page-header">
        <h1>Create Your Account</h1>
        <p>Welcome to MindConnect. Please fill in your details to get started.</p>
    </header>

    <main class="registration-form-container">
        <?php
        // Display error or success messages if any
        if (isset($error_message)) {
            echo "<p class='error-message'>$error_message</p>";
        }

        if (isset($success_message)) {
            echo "<p class='success-message'>$success_message</p>";
        }
        ?>

        <!-- Registration Form -->
        <form action="registration.php" method="POST" class="registration-form">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="age">Age</label>
            <input type="number" id="age" name="age" placeholder="Enter your age" required>

            <label for="country">Country</label>
            <input type="text" id="country" name="country" placeholder="Enter your country" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Create a password" required>

            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>

            <button type="submit" class="btn primary">Register</button>
        </form>
        <a href="login.php" class="btn secondary">Already have an account? Login</a>
    </main>

    <footer>
        <a href="index.html" class="btn secondary">Back to Home</a>
    </footer>
</body>
</html>
