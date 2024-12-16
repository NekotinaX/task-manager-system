<?php
// Start the session only if it hasn't started yet
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Function to register a user
function registerUser($username, $password) {
    $filePath = 'users/' . $username . '.txt';

    // Check if the user already exists
    if (file_exists($filePath)) {
        return false;  // The user already exists
    }

    // Save the password in the corresponding file
    file_put_contents($filePath, $password);
    return true;  // Registration is successful
}

// Function to log in a user
function loginUser($username, $password) {
    $filePath = 'users/' . $username . '.txt';

    // Check if the user exists
    if (!file_exists($filePath)) {
        return false;
    }

    // Read the password from the file
    $storedPassword = file_get_contents($filePath);

    // Check if the password matches
    if ($password === trim($storedPassword)) {
        $_SESSION['username'] = $username;  // Save the user in the session
        return true;
    }
    return false;
}

// Function to add a task
function addTask($username, $task) {
    $filePath = 'tasks/' . $username . '_tasks.txt';

    // Save the task in the corresponding file
    file_put_contents($filePath, $task . PHP_EOL, FILE_APPEND);
}

// Function to retrieve tasks
function getTasks($username) {
    $filePath = 'tasks/' . $username . '_tasks.txt';

    // Check if the file exists
    if (!file_exists($filePath)) {
        return [];
    }

    // Read the tasks from the file
    $tasks = file_get_contents($filePath);
    return explode(PHP_EOL, trim($tasks));
}

// Function to log out
function logout() {
    session_destroy();  // Destroy the session
    header('Location: login.php');
    exit();
}
?>
