<?php
include('functions.php');

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
$tasks = getTasks($username);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Tasks</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Tasks for <?php echo htmlspecialchars($username); ?></h1>

        <?php if (empty($tasks)): ?>
            <p>No tasks available.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($tasks as $task): ?>
                    <li><?php echo htmlspecialchars($task); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <a href="add_task.php">Add a new task</a><br>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
