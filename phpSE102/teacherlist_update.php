<?php
// Start session to handle admin authentication
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Include database configuration
require_once './database/dbconfig.php';

// Pagination Variables
$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Search functionality (if search term is provided)
$searchTerm = '';
if (isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
    $teacherslist = $DB_con->prepare("SELECT * FROM teachers_list WHERE name LIKE ? LIMIT ?, ?");
    $teacherslist->execute(["%$searchTerm%", $start, $limit]);
} else {
    $teacherslist = $DB_con->prepare("SELECT * FROM teachers_list LIMIT ?, ?");
    $teacherslist->execute([$start, $limit]);
}

// Pagination Query to count total teachers
$totalTeachers = $DB_con->query("SELECT COUNT(*) FROM teachers_list")->fetchColumn();
$totalPages = ceil($totalTeachers / $limit);

// Delete teacher functionality
if (isset($_GET['delete_id'])) {
    $teacherId = $_GET['delete_id'];
    $deleteStmt = $DB_con->prepare("DELETE FROM teachers_list WHERE id = ?");
    if ($deleteStmt->execute([$teacherId])) {
        header('Location: teacherlist.php'); // Refresh the page after deletion
        exit();
    } else {
        echo "Error deleting teacher.";
    }
}
?>