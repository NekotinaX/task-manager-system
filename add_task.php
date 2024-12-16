<?php
include('functions.php');

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['username'];
    $task = $_POST['task'];
    
    addTask($username, $task);
    header('Location: view_tasks.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Task</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Add a New Task</h1>

        <form method="POST">
            <label for="task">Task:</label>
            <textarea id="task" name="task" required></textarea>
            <br>

            <button type="submit">Add</button>
        </form>

        <a href="view_tasks.php">Back to Tasks</a>
    </div>
</body>
</html>
