<?php
// Example data from database (replace with actual database queries)
$courses = ['HCI', 'SE 101', 'ATFL 101', 'FBA 101', 'PROGRAMMING'];
$subjects = [
    'HCI' => 'asset/HCI-PIC.png', 
    'SE 101' => 'asset/SE-PIC.png', 
    'ATFL 101' => 'asset/ATFL-PIC.png', 
    'FBA 101' => 'asset/FBA-PIC.png', 
    'PROGRAMMING' => 'asset/PROGRAMMING-PIC.png'
];
$quizzes = [
    'Artificial intelligence and machine learning',
    'Blockchain technology',
    'Human-computer interaction (HCI)',
    'Software maintenance and evolution'
];

// Search logic (search term passed from GET request)
$searchQuery = isset($_GET['search']) ? strtolower($_GET['search']) : '';

// Example: Fetch user profile data (replace with database data)
$user_name = "Ariane Bangquiao";
$user_profile_image = "asset/profile-image.jpg"; // Replace with dynamic image path from DB

// Filter courses, subjects, and quizzes based on search query
$filteredCourses = array_filter($courses, fn($course) => stripos(strtolower($course), $searchQuery) !== false);
$filteredSubjects = array_filter($subjects, fn($subject) => stripos(strtolower($subject), $searchQuery) !== false);
$filteredQuizzes = array_filter($quizzes, fn($quiz) => stripos(strtolower($quiz), $searchQuery) !== false);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="css/dashboard.css"/>
    <style>
        /* Hover Effect */
        .sidebar button, .quiz-list li, .sidebar a {
            transition: background-color 0.3s, color 0.3s;
        }
        
        .sidebar button:hover, .quiz-list li:hover, .sidebar a:hover {
            background-color: #f0f0f0;
            cursor: pointer;
        }

        /* Search Bar Style */
        .search-bar {
            margin: 20px 0;
        }

        .search-bar input {
            padding: 10px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Show and hide subjects, quizzes based on search */
        .hidden {
            display: none;
        }

        .quiz-list, .courses button {
            list-style: none;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <a href="studentProfile.php"><img src="<?php echo $user_profile_image; ?>" alt="Profile picture" class="profile-img"></a>
            <h2><?php echo $user_name; ?></h2>
            <div class="courses">
                <h3>COURSES</h3>
                <?php
                foreach ($filteredCourses as $course) {
                    $activeClass = ($course == 'PROGRAMMING') ? 'class="active"' : '';
                    echo "<button class='course' $activeClass data-name='$course'>$course</button>";
                }
                ?>
            </div>
        </div>

        <div class="main-content">
            <div class="search-bar">
                <form method="GET" action="">
                    <input type="text" name="search" value="<?php echo htmlspecialchars($searchQuery); ?>" placeholder="Search" onkeyup="searchFunction()">
                </form>
            </div>

            <div class="header-icons">
                <i class="fas fa-cog"></i>
            </div>

            <div class="subjects">
                <h3>SUBJECTS</h3>
                <div class="subject-list">
                    <?php
                    foreach ($filteredSubjects as $subject => $image) {
                        echo "<img class='subject' src='$image' alt='$subject' data-name='$subject'>";
                    }
                    ?>
                </div>
            </div>

            <div class="quizzes">
                <h3>AVAILABLE QUIZZES</h3>
                <ul class="quiz-list">
                    <?php
                    foreach ($filteredQuizzes as $quiz) {
                        echo "<li class='quiz-item' data-name='$quiz'>$quiz</li>";
                    }
                    ?>
                </ul>
                <button class="quiz-history">Quizzes History</button>
            </div>
        </div>
    </div>

    <script>
        // Search Functionality
        function searchFunction() {
            const searchInput = document.querySelector('input[name="search"]').value.toLowerCase();
            const courses = document.querySelectorAll('.course');
            const subjects = document.querySelectorAll('.subject');
            const quizzes = document.querySelectorAll('.quiz-item');

            // Filter courses
            courses.forEach(course => {
                const courseName = course.getAttribute('data-name').toLowerCase();
                if (courseName.includes(searchInput)) {
                    course.classList.remove('hidden');
                } else {
                    course.classList.add('hidden');
                }
            });

            // Filter subjects
            subjects.forEach(subject => {
                const subjectName = subject.getAttribute('data-name').toLowerCase();
                if (subjectName.includes(searchInput)) {
                    subject.classList.remove('hidden');
                } else {
                    subject.classList.add('hidden');
                }
            });

            // Filter quizzes
            quizzes.forEach(quiz => {
                const quizName = quiz.getAttribute('data-name').toLowerCase();
                if (quizName.includes(searchInput)) {
                    quiz.classList.remove('hidden');
                } else {
                    quiz.classList.add('hidden');
                }
            });
        }

        // Make buttons clickable to navigate to pages
        document.querySelectorAll('.quiz-item').forEach(item => {
            item.addEventListener('click', () => {
                // Redirect to the respective quiz page
                window.location.href = `quiz-${item.getAttribute('data-name').replace(/\s+/g, '-').toLowerCase()}.php`;
            });
        });

        document.querySelectorAll('.course').forEach(item => {
            item.addEventListener('click', () => {
                // Redirect to the respective course page
                const courseName = item.getAttribute('data-name').toLowerCase();
                window.location.href = `${courseName}.php`;
            });
        });
    </script>
</body>
</html>
