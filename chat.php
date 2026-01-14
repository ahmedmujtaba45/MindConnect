<?php
// Initialize chat history (dummy data for now)
$messages = [
    ['sender' => 'Psychiatrist', 'message' => 'Hello! How can I help you today?'],
    ['sender' => 'User', 'message' => 'I have a question.'],
    ['sender' => 'Psychiatrist', 'message' => 'Sure, feel free to ask!']
];

// Predefined questions and answers
$qa_pairs = ['Hi'=>'Hello',
'What is your name?'=>'My name is Mindy.',
    'What is the purpose of MindConnect?' => 'MindConnect is a mental health support system designed to help individuals by providing a platform for connecting with psychiatrists, mental health resources, and other users. It aims to provide guidance, offer professional support, and raise awareness about mental health issues.',
    'How can I register on MindConnect?' => 'To register on MindConnect, you need to visit the registration page, enter your details such as name, email, age, country, and password. Once you’ve filled out the form, click the "Register" button to create your account.',
    'How do I book an appointment with a psychiatrist on MindConnect?' => 'To book an appointment with a psychiatrist, go to the "Booking Appointment" page. There, you can view available psychiatrists and their specialties. Choose a psychiatrist, select an available time slot, and click "Book Appointment."',
    'Can I edit my profile on MindConnect?' => 'Yes, you can edit your profile. On the Profile page, you will find an "Edit Profile" option where you can update your personal information and profile picture. After editing, don\'t forget to save your changes.',
    'How can I contact the MindConnect team?' => 'To contact the MindConnect team, you can go to the "Contact Us" page. There, you\'ll find a form where you can enter your name, email, and question or message. Once you submit the form, your inquiry will be sent to the team for a response.',
    'Can I chat with a psychiatrist or another user on MindConnect?' => 'Yes, you can chat with psychiatrists and other users on the "Chat" page. You can send messages and receive responses from the psychiatrist or AI-powered assistant to get support and guidance.',
    'What are the signs of depression?'=>'Depression can manifest in a variety of ways, including persistent sadness, lack of interest in activities you once enjoyed, changes in appetite or weight, difficulty sleeping or oversleeping, feelings of guilt or worthlessness, trouble concentrating, and thoughts of death or suicide. If these symptoms persist for more than two weeks, it may be helpful to seek professional support.',
    'How can I manage my anxiety better?'=>'Managing anxiety involves a combination of strategies. Regular exercise, practicing mindfulness or deep breathing exercises, maintaining a healthy sleep schedule, reducing caffeine intake, and seeking therapy (like cognitive behavioral therapy) can help manage anxiety effectively. Medication may also be recommended in some cases.',
    'What is the difference between sadness and clinical depression?'=>'Sadness is a normal emotion that everyone experiences, usually triggered by a specific event. Clinical depression, however, is a more persistent condition that can last for weeks or months and affects all areas of life. It involves feelings of hopelessness, a lack of interest in activities, and may impair daily functioning.',
    'How can I overcome my fear of social situations?'=>'Overcoming social anxiety requires gradual exposure to social situations, starting with less intimidating scenarios and slowly working up to more challenging ones. Techniques like cognitive-behavioral therapy (CBT) can help challenge negative thoughts and build social confidence.',
    'What are some coping strategies for dealing with stress?'=>'Coping strategies for stress include deep breathing, progressive muscle relaxation, meditation, exercising, talking to someone you trust, or engaging in activities that relax or distract you. Setting boundaries and practicing time management can also reduce stress levels.',
    'Is it normal to feel constantly overwhelmed?'=>'Feeling overwhelmed occasionally is normal, especially during stressful situations. However, if this feeling persists and begins to interfere with your ability to function, it could be a sign of burnout or a mental health concern. In such cases, speaking with a professional can help you find ways to manage stress more effectively.',
    'How can I improve my sleep quality?'=>'To improve sleep, establish a consistent bedtime routine, avoid caffeine and electronics before bed, create a comfortable sleep environment, and practice relaxation techniques like deep breathing or progressive muscle relaxation. If sleep problems persist, it is advisable to seek professional help.',
    'Can you help me understand my emotional triggers?'=>'Identifying emotional triggers is often the first step toward emotional regulation. Keeping a journal, practicing mindfulness, and working with a therapist can help you pinpoint situations, thoughts, or memories that cause emotional distress, and help you develop strategies to cope with them.',
    'What are some techniques to improve mental clarity and focus?'=>'Mental clarity can be improved through mindfulness practices, regular physical activity, taking regular breaks, and managing stress. Good nutrition, hydration, and adequate sleep also play an important role in maintaining focus. Mindfulness meditation or breathing exercises can help clear your mind.',
    'How do I handle a breakup or loss of a loved one?'=>'Grieving after a breakup or loss is natural and can take time. It is important to allow yourself to feel your emotions, seek support from friends and family, and practice self-care. Therapy or support groups can help you process your emotions and adjust to the changes in your life.',
    'What are the early signs of a panic attack?'=>'Early signs of a panic attack include rapid heartbeat, shortness of breath, dizziness, sweating, trembling, feelings of choking, chest pain, and a sense of detachment from reality. If you experience frequent panic attacks, a therapist or doctor can help you develop coping strategies.',
    'How can I stay motivated when I feel emotionally drained?'=>'Motivation can be challenging when you are emotionally drained. Start by setting small, achievable goals, taking breaks when needed, and focusing on self-compassion. It is important to listen to your body and rest when necessary. Seek support from loved ones and consider talking to a therapist for additional help.',
    'Can childhood trauma affect me as an adult?'=>'Yes, unresolved childhood trauma can have a long-lasting impact on your emotional and mental health as an adult. It can influence your relationships, emotional regulation, and overall mental well-being. Therapy can help you address and heal from these past experiences.'


];

// Simulate AI response (this can be replaced with an actual API integration later)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_message = $_POST['message'];
    $messages[] = ['sender' => 'User', 'message' => $user_message];
    
    // Check if the user message matches any predefined question
    if (array_key_exists($user_message, $qa_pairs)) {
        $ai_response = $qa_pairs[$user_message];
    } else {
        $ai_response = "Sorry, wrong question 😞";
    }

    $messages[] = ['sender' => 'Psychiatrist', 'message' => $ai_response];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with Psychiatrist - MindConnect</title>
    <link rel="stylesheet" href="chat.css">
</head>
<body>

    <!-- Header Section -->
    <header class="chat-header">
        <div class="header-left">
            <h1>MindConnect</h1>
        </div>
        <div class="header-right">
            <a href="profile.php" class="icon">🔙 Profile</a>
            <a href="home.php" class="icon">🏠 Home</a>
        </div>
    </header>

    <!-- Chat Window Section -->
    <section class="chat-container">
        <div class="chat-box">
            <div class="messages">
                <?php foreach ($messages as $message): ?>
                    <div class="message <?php echo strtolower($message['sender']); ?>">
                        <strong><?php echo $message['sender']; ?>:</strong> <?php echo $message['message']; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Chat Input -->
            <form method="POST" class="chat-form">
                <textarea name="message" placeholder="Type your message..." class="chat-input" required></textarea>
                <button type="submit" class="send-btn">Send</button>
            </form>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="chat-footer">
        <a href="profile.php" class="profile-btn">
            <img src="data:image/jpeg;base64,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" alt="User Profile Picture" class="profile-btn-img">
        </a>
    </footer>

</body>
</html>
