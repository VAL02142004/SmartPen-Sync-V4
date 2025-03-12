<?php
session_start();

$score = $_SESSION['score'] ?? 85;
$maxScore = 100;
$timeSpent = $_SESSION['time_spent'] ?? '1 hour 15 minutes';

// Ensure answers is an array
$answers = $_SESSION['answers'] ?? [];

// Always initialize `$showAnswers`
$showAnswers = false;

// Debugging check
if (empty($answers)) {
}

// Handle form submission to show answers
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['view_answers'])) {
    $showAnswers = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Quiz Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f3db;
            margin: 0;
            padding: 20px;
        }
        .container {
            display: flex;
        }
        .sidebar {
            background-color: #c6e8c2;
            padding: 20px;
            width: 250px;
            border-radius: 10px;
        }
        .main {
            background-color: #f3fdf5;
            padding: 20px;
            margin-left: 20px;
            border-radius: 10px;
            flex-grow: 1;
        }
        .profile img {
            width: 100px;
            height: auto;
            border-radius: 10%;
        }
        .profile {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .score-box {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .courses button {
            display: block;
            width: 100%;
            margin: 5px 0;
            background-color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            text-align: middle;
        }
        .answer-list {
            margin-top: 20px;
            text-align: left;
        }
        .answer-list p {
            font-weight: bold;
        }
        .quiz-results {
            margin-top: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <h1>Dashboard</h1>

    <div class="container">
        <!-- Sidebar with profile and courses -->
        <div class="sidebar">
            <h2>Profile</h2>
            <div class="profile">
                <img src="asset/profile-image.jpg" alt="Profile Picture">
                <p>Ariane Bangquiao</p>
            </div>

            <h2>Courses</h2>
            <div class="courses">
                <button>HCI</button>
                <button>SE 101</button>
                <button>ATFL 101</button>
                <button>FBA 101</button>
                <button>PROGRAMMING</button>
            </div>
        </div>

        <!-- Main content displaying quiz results -->
        <div class="main">
            <h2>Software Requirements Specification Documents</h2>

            <!-- Score and time section -->
            <div class="score-box">
                <h3>Your Score</h3>
                <p><?php echo $score . '/' . $maxScore; ?></p>
                <p>Time Spent: <?php echo $timeSpent; ?></p>

                <!-- Button to view answers -->
                <form method="POST">
                    <button type="submit" name="view_answers" class="submit-button">View Answers</button>
                </form>
            </div>

            <!-- Quiz Results Section -->
            <?php if ($showAnswers): ?>
                <div class="quiz-results">
                    <h3>Your Answers:</h3>
                    <?php if (!empty($answers)): ?>
                        <ul>
                            <?php foreach ($answers as $question => $answer): ?>
                                <li><strong><?php echo htmlspecialchars($question); ?></strong>: <?php echo htmlspecialchars($answer); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>No answers found.</p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>

</body> 
</html>
