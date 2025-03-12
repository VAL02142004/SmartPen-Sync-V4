<?php
// Start session to manage user authentication and data
session_start();

// Example: Fetch user information from session (or database)
$user_name = isset($_SESSION['username']) ? $_SESSION['username'] : "Guest";
$profile_image = isset($_SESSION['profile_image']) ? $_SESSION['profile_image'] : "asset/profile-image.jpg";

// Example: Fetch courses the user is enrolled in (this should come from a database)
$courses = [
    "HCI", "SE 101", "CC103", "FBA 101", "PROGRAMMING"
];

// Search functionality (if the search query is set)
$search_query = isset($_POST['search']) ? $_POST['search'] : '';
$filtered_topics = [];

// Example list of topics in the course, could be fetched from the database
$topics = [
    "Individual interactions are more important than processes and tools.",
    "A focus on working software rather than thorough documentation.",
    "Collaboration instead of contract negotiations.",
    "A focus on responding to change.",
    "Software Engineering Models",
    "Software Development Life Cycle"
];

// Filter topics based on search query
if ($search_query) {
    foreach ($topics as $topic) {
        if (stripos($topic, $search_query) !== false) {
            $filtered_topics[] = $topic;
        }
    }
} else {
    $filtered_topics = $topics;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Engineer 101</title>
    <link rel="stylesheet" href="css/courses.css">
</head>
<body>
    <div class="sidebar">
        <button class="dashboard-btn">Dashboard</button>
        <div class="profile">
            <img src="asset/profile-image.jpg" alt="Profile Picture" class="profile-img">
            <p class="profile-name">Ariane Banguiao</p>
        </div>
        <div class="courses">
            <p class="course">HCI</p>
            <p class="course">SE 101</p>
            <p class="course">CC103</p>
            <p class="course">FBA 101</p>
            <p class="course">PROGRAMMING</p>
        </div>
    </div>
    <div class="main-content">
        <header>
            <input type="text" class="search-bar" placeholder="Search">
            <button class="menu-btn">☰</button>
        </header>
        <h1>Software Engineer 101</h1>
        <h2>Topics</h2>
        <ul class="topics">
            <li>Individual interactions are more important than processes and tools.</li>
            <li>A focus on working software rather than thorough documentation.</li>
            <li><em>Collaboration instead of contract negotiations</em></li>
            <li>A focus <em>on responding to change</em>.</li>
            <li>Software Engineering Models</li>
            <li>Software <em>Development Life Cycle</em></li>
        </ul>
    </div>
    <script src="courses.js"></script>
</body>
</html>
