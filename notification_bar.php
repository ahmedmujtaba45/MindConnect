<?php
// Fetch unread notifications count for the logged-in user
$query = "SELECT COUNT(*) AS unread_count FROM notifications WHERE user_id = ? AND status = 'unread'";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$unread_count = $row['unread_count'];
?>

<!-- Notification Bar -->
<div class="notification-bar">
    <a href="notifications.php" class="notification-icon">
        <span class="icon">🔔</span>
        <?php if ($unread_count > 0): ?>
            <span class="notification-count"><?php echo $unread_count; ?></span>
        <?php endif; ?>
    </a>
</div>
