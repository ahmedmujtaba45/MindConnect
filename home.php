<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - MindConnect</title>
    <link rel="stylesheet" href="home.css">
    <script defer>
        // Predefined posts array with profile pictures
        const posts = [
            {
                id: 1,
                username: "Prof Anwar Ul Haq",
                time: "Posted 2 hours ago",
                caption: "Mental health is just as important as physical health!",
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQU3l9LVbmoEjxXNubAY7RKRk9JMVIkkBElKg&s",
                profilePic: "https://randomuser.me/api/portraits/men/1.jpg"
            },
            {
                id: 2,
                username: "Dr. Rumaisa Iqbal",
                time: "Posted 4 hours ago",
                caption: "It's okay to not be okay. Reach out for help!",
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnixpw4xC0A-pTTVcSW1NLfM-MiWvVLHDacA&s",
                profilePic: "https://randomuser.me/api/portraits/women/2.jpg"
            },
            {
                id: 3,
                username: "Dr. Shahid Ali",
                time: "Posted 6 hours ago",
                caption: "Taking care of your mental health is a daily journey.",
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQU3l9LVbmoEjxXNubAY7RKRk9JMVIkkBElKg&s",
                profilePic: "https://randomuser.me/api/portraits/men/3.jpg"
            },
            {
                id: 4,
                username: "Sarah Khan",
                time: "Posted 3 hours ago",
                caption: "Meditation can be a powerful tool for your mental health.",
                image: "remove()",
                profilePic: "https://randomuser.me/api/portraits/women/4.jpg"
            },
            {
                id: 5,
                username: "Ali Khan",
                time: "Posted 1 hour ago",
                caption: "Spend some time outdoors—it’s good for the mind!",
                profilePic: "https://randomuser.me/api/portraits/men/5.jpg"
            },
            {
                id: 6,
                username: "Maryam Fatima",
                time: "Posted 30 minutes ago",
                caption: "Self-care isn’t selfish; it's essential.",
                profilePic: "https://randomuser.me/api/portraits/women/6.jpg"
            },
            {
                id:7,
                username: "Babar Azam",
                time: "Posted now",
                caption: "Loneliness is a barrier that prevents one from uniting with the inner self.",
                image: "data:image/jpeg;base64,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",
                profilePic: "data:image/webp;base64,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"
            }
        ];

        // Function to shuffle and display 2-3 random posts
        function loadPosts() {
            const shuffledPosts = posts.sort(() => 0.5 - Math.random()).slice(0, 3);
            const postsContainer = document.querySelector(".posts-container");

            postsContainer.innerHTML = ""; // Clear existing posts

            shuffledPosts.forEach((post, index) => {
                const postLink = `https://mindconnect.com/post/${post.id}`; // Unique link for each post
                const postElement = `
                    <div class="post" id="post-${post.id}">
                        <div class="post-header">
                            <img src="${post.profilePic}" alt="${post.username}" class="user-pic">
                            <div class="user-info">
                                <h3>${post.username}</h3>
                                <p class="post-time">${post.time}</p>
                            </div>
                        </div>
                        <div class="post-content">
                            <p class="post-caption">${post.caption}</p>
                            <img src="${post.image}" alt="Post Image" class="post-image">
                        </div>
                        <div class="post-actions">
                            <button class="action-btn like-btn" onclick="likePost(this)">❤️ Like</button>
                            <button class="action-btn comment-btn" onclick="toggleCommentSection(this)">💬 Comment</button>
                            <button class="action-btn share-btn" onclick="sharePost(this, '${postLink}')">🔗 Share</button>
                        </div>
                        <div class="comment-section" style="display: none;">
                            <textarea placeholder="Add a comment..." rows="3" cols="50"></textarea>
                            <button class="submit-comment" onclick="submitComment(this)">Submit</button>
                        </div>
                        <div class="comments-list"></div>
                        <div class="share-message hidden">Link copied to clipboard!</div>
                    </div>
                `;
                postsContainer.innerHTML += postElement;
            });
        }

        // Functions for actions
        function likePost(button) {
            button.classList.toggle("liked");
            if (button.classList.contains("liked")) {
                button.innerHTML = "❤️ Liked";
            } else {
                button.innerHTML = "❤️ Like";
            }
        }

        function toggleCommentSection(button) {
            const commentSection = button.closest(".post").querySelector(".comment-section");
            commentSection.style.display = commentSection.style.display === "none" ? "block" : "none";
        }

        function submitComment(button) {
            const commentSection = button.closest(".comment-section");
            const commentInput = commentSection.querySelector("textarea");
            const commentsList = button.closest(".post").querySelector(".comments-list");

            const commentText = commentInput.value.trim();
            if (commentText) {
                const newComment = document.createElement("div");
                newComment.classList.add("comment");
                newComment.innerHTML = `<p>${commentText}</p>`;
                commentsList.appendChild(newComment);

                commentInput.value = ""; // Clear the input
                commentSection.style.display = "none"; // Hide comment section after submission
            }
        }

        function sharePost(button, link) {
            const shareMessage = button.closest(".post").querySelector(".share-message");
            navigator.clipboard.writeText(link) // Copy post link to clipboard
                .then(() => {
                    shareMessage.classList.remove("hidden");
                    setTimeout(() => shareMessage.classList.add("hidden"), 2000);
                })
                .catch(() => {
                    alert("Failed to copy link. Try again!");
                });
        }

        // Load posts on page load
        document.addEventListener("DOMContentLoaded", loadPosts);
    </script>
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="project-name">
            <h1>MindConnect</h1>
        </div>
        <div class="header-right">
            <a href="chat.php" class="icon">💬</a>
            <a href="notifications.php" class="icon">🔔</a>
        </div>
    </header>

    <!-- Main Content Section (Posts) -->
    <main class="posts-container">
        <!-- Posts will be dynamically loaded here -->
    </main>

    <!-- Footer Section -->
    <footer>
        <a href="profile.php" class="profile-icon">
            <img src="data:image/jpeg;base64,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" alt="Profile" class="profile-img">
        </a>
        <a href="logout.php" class="logout-btn">Logout</a>
        <a href="appointment.php" class="appointment-btn">Book Appointment</a>
    </footer>
</body>
</html>
