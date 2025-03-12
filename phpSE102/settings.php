<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #d3e8d3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #a8c3a8;
            border-radius: 15px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 80%;
            max-width: 800px;
        }
        .menu {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .menu button {
            background-color: white;
            border: none;
            border-radius: 10px;
            padding: 15px 30px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .menu button:hover {
            background-color: #e0e0e0;
        }
        .menu .logout {
            background-color: #6b8f6b;
            color: white;
        }
        .menu .logout:hover {
            background-color: #5a7a5a;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #a8c3a8;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer; 
        }
        .back-button i {
            margin-right: 5px;
        }
        .image-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- Back button -->
    <button class="back-button" onclick="window.location.href='dashboard.php'">
        <i class="fas fa-arrow-left"></i> Dashboard
    </button>
    
    <div class="container">
        <div class="menu">
            <!-- Button to navigate to student profile page -->
            <form action="student_profile.php" method="get">
                <button type="submit">Student Profile</button>
            </form>
            
            <!-- Button to navigate to change password page -->
            <form action="change_password.php" method="get">
                <button type="submit">Change Password</button>
            </form>

            <!-- Log out button (handled via POST method) -->
            <form method="POST">
                <button type="submit" class="logout" name="logout">Log out</button>
            </form>
        </div>

        <div class="image-container">
            <img alt="Illustration of a computer screen with books and tiny people interacting with the books" height="200" src="asset/image 2.png" width="300"/>
        </div>
    </div>
</body>
</html>
