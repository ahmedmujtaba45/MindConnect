<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - MindConnect</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header class="page-header">
        <h1>Contact Us</h1>
        <p>We'd love to hear from you! Please fill out the form below, and we'll get back to you as soon as possible.</p>
    </header>
    <main class="contact-page">
        <div class="contact-form-container">
            <form action="contact_submit.php" method="POST" class="contact-form">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                
                <label for="question">Your Question:</label>
                <textarea id="question" name="question" placeholder="How can we help you?" required></textarea>
                
                <button type="submit" class="btn primary">Submit</button>
            </form>
        </div>
        <div class="contact-info">
            <h2>Get in Touch</h2>
            <p>Email: support@mindconnect.com</p>
            <p>Phone: +51 567-890</p>
            <p>Address: Street 45, F-5, Islamabad</p>
        </div>
    </main>
    <footer>
        <a href="index.php" class="btn secondary">Back to Home</a>
    </footer>
</body>
</html>
