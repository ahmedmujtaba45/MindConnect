<?php
session_start();
$notification = isset($_SESSION['notification']) ? $_SESSION['notification'] : 'No notification available.';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification - MindConnect</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        /* Body and Background */
        body {
            background-color: #f4f7fc;
            color: #333;
            padding: 0;
            margin: 0;
        }

        /* Header */
        .notification-header {
            background-color: #4b4fcf;

            padding: 20px;
            color: white;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notification-header a {
            color: white;
            text-decoration: none;
            font-size: 20px;
        }

        /* Notification Section */
        .notification-section {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .notification-section h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        /* Notification Box */
        .notification-box {
            display: flex;
            align-items: center;
            background-color: #d1e7dd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            color: #155724;
        }

        /* Notification Icon */
        .notification-icon {
            font-size: 30px;
            margin-right: 20px;
            color: #155724;
        }

        /* Notification Message */
        .notification-message {
            font-size: 18px;
            line-height: 1.5;
        }

        /* Footer */
        .notification-footer {
            text-align: center;
            margin-top: 20px;
        }

        .notification-footer a {
            text-decoration: none;
            font-size: 16px;
            color: #007bff;
            padding: 10px 20px;
            background-color: #f0f8ff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .notification-footer a:hover {
            background-color: #cce5ff;
        }
    </style>
</head>
<body>

    <header class="notification-header">
        <h1>MindConnect</h1>
        <a href="home.php" class="icon">🏠 Home</a>
    </header>

    <section class="notification-section">
        <h2>Notification</h2>
        <div class="notification-box">
            <span class="notification-icon">✔️</span>
            <p class="notification-message"><?php echo $notification; ?></p>
        </div>
    </section>

    <footer class="notification-footer">
        <a href="home.php">Go to Home</a>
    </footer>

</body>
</html>
