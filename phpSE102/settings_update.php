<?php
// Start the session to handle user authentication
session_start();

// Check if the user is logged in, if not, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Handle logout functionality
if (isset($_POST['logout'])) {
    // Destroy the session and redirect to the login page
    session_destroy();
    header('Location: login.php');
    exit();
}
?>