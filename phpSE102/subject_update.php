<?php
// Start session to handle logged-in user
session_start();

// Dummy data (in a real app, you'd fetch this from a database)
$userProfile = [
    'name' => 'Ariane Bangquiao',
    'email' => 'ariBangquiao@example.com',
    'profileImage' => 'asset/profile-image.jpg',
];

$courses = [
    'HCI',
    'SE 101',
    'CC103',
    'FBA 101',
    'PROGRAMMING'
];

// Check if the user is logged in (this can be done by checking session)
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header('Location: login.php');
    exit();
}

// Handle search functionality (assuming you want to filter courses)
$searchTerm = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchTerm = $_POST['search'];
}
?>