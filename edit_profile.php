<?php
session_start();
include('db.php');

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch user data from the database
    $query = "SELECT * FROM users WHERE id = '$user_id'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
} else {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);

    // Update the profile without changing the profile picture
    $query = "UPDATE users SET email='$email', country='$country', age='$age' WHERE id='$user_id'";
    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Profile updated successfully!";
        header('Location: profile.php');
        exit();
    } else {
        $_SESSION['message'] = "Error updating profile. Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - MindConnect</title>
    <link rel="stylesheet" href="edit_profile.css">
</head>
<body>
    <header>
        <div class="header-left">
            <h1>MindConnect</h1>
        </div>
        <div class="header-right">
            <a href="home.php" class="icon">🏠 Home</a>
            <a href="logout.php" class="icon">🚪 Logout</a>
        </div>
    </header>

    <div class="edit-profile-container">
        <h2>Edit Profile</h2>
        <form method="POST">
            <div class="profile-image-container">
               
            </div>
            <input type="email" name="email" value="<?php echo $user['email']; ?>" required placeholder="Email">
            <input type="text" name="country" value="<?php echo $user['country']; ?>" required placeholder="Country">
            <input type="number" name="age" value="<?php echo $user['age']; ?>" required placeholder="Age">
            <button type="submit" class="submit-btn">Save Changes</button>
            <a href="profile.php" class="cancel-btn">Cancel</a>
        </form>
    </div>
</body>
</html>
