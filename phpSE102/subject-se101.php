

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e2f2e2;
            margin: 0;
        }

        .container {
            display: flex;
            padding: 20px;
        }

        .sidebar {
            background-color: #d9f0d9;
            width: 250px;
            padding: 20px;
            border-radius: 8px;
        }

        .sidebar h2 {
            font-size: 24px;
            margin: 0;
        }

        .profile {
            display: flex;
            flex-direction: column; 
            align-items: center;
            margin-top: 20px;
        }

        .profile img {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        .search {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .search input {
            width: 50%;
            padding: 10px;
            border-radius: 20px;
            border: 1px solid #ccc;
        }

        .topics {
            background-color: #f0fdf0;
            padding: 20px;
            border-radius: 8px;
            flex: 1;
            margin-left: 20px;
        }

        .topics h3 {
            margin-top: 0;
        }

        .topic {
            background-color: #d9f0d9;
            padding: 10px;
            border-radius: 4px;
            margin: 10px 0;
        }

        .courses {
            margin-top: 275px;
            text-align: center;
        }

        .course {
            display: block;
            width: 100%;
            padding: 7.5px;
            margin-bottom: 20px;
            background-color: white;
            border: none;
            border-radius: 10px;
            text-align: middle;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <h2>Dashboard</h2>
        <div class="profile">
            <img src="<?php echo $userProfile['profileImage']; ?>" alt="Profile Picture">
            <div>
                <strong><?php echo $userProfile['name']; ?></strong><br>
                <small><?php echo $userProfile['email']; ?></small><br>
                <a href="student_profile.php">View Profile</a>
            </div>
        </div>
        
        <div class="courses">
            <strong>COURSES</strong><br>
            <?php
            // Display courses dynamically
            foreach ($courses as $course) {
                if ($searchTerm == '' || stripos($course, $searchTerm) !== false) {
                    echo "<div class='course'>$course</div>";
                }
            }
            ?>
        </div>
    </div>

    <div class="topics">
        <div class="search">
            <form action="" method="POST">
                <input type="text" name="search" placeholder="Search for courses..." value="<?php echo htmlspecialchars($searchTerm); ?>">
            </form>
        </div>
        <h3>Software Engineer 101</h3>
        <div class="topic">1. Individual interactions are more important than processes and tools.</div>
        <div class="topic">2. A focus on working software rather than thorough documentation.</div>
        <div class="topic">3. Collaboration instead of contract negotiations.</div>
        <div class="topic">4. A focus on responding to change.</div>
        <div class="topic">5. Software Engineering Models.</div>
        <div class="topic">6. Software Development Life Cycle.</div>
    </div>
</div>

</body>
</html>
