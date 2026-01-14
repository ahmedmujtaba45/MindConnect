<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $question = $conn->real_escape_string($_POST['question']);

    $sql = "INSERT INTO contact_questions (name, email, question) VALUES ('$name', '$email', '$question')";
    
    if ($conn->query($sql)) {
        echo "Your question has been submitted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<a href="index.html">Back</a>
