<?php
// Initialize variables with existing user data (You can replace these with actual data from a database)
$name = "Ariane Bangquiao";
$email = "ArianeBangquiao@gmail.com";
$address = "Purok 1-A Tambacan I.C";
$password = "ArianeBangquiao";
$course = "BSCS";
$profileImage = "asset/profile-image.jpg"; // Default profile image

// Handle the form submission to update user info and upload a new profile picture
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update text information (Name, Email, Address, Password)
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['address'])) {
        $address = $_POST['address'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }
    if (isset($_POST['course'])) {
        $course = $_POST['course'];
    }

    // Handle profile image upload
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $fileName = $_FILES['profile_image']['name'];
        $fileTmpName = $_FILES['profile_image']['tmp_name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        // Set allowed extensions (you can modify this as needed)
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array(strtolower($fileExtension), $allowedExtensions)) {
            $uploadDir = 'uploads/';
            $newFileName = uniqid() . '.' . $fileExtension;
            $destination = $uploadDir . $newFileName;

            // Move the uploaded file to the server
            if (move_uploaded_file($fileTmpName, $destination)) {
                $profileImage = $destination; // Update the profile image path
            } else {
                echo "Error uploading the image.";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        /* Same styles as before... (unchanged) */

    .header button {
    background-color: white;
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    cursor: pointer;
    display: flex;
    align-items: center;
    font-size: 14px;
    font-weight: bold;
    transition: background 0.3s ease;
    }

    .header button:hover {
    background-color: #c1dbb8;
    }

    .header button i {
    margin-right: 5px;
    }

    .header h1 {
        display: flex;
        font-size: 26px;
        margin: 0;
        text-align: center;
        width: 100%;
        padding-left: 20px;
        color: #2f4f2f;
    }

    body {
    font-family: Arial, sans-serif;
    background-color: #E3EED4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    }

    .container {
    background-color: #d3e8d3;
    border-radius: 15px;
    padding: 25px;
    width: 90%;
    max-width: 98700px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    transition: all 0.3s ease-in-out;
    }

    .header {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    }


    .profile {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 40%;
    text-align: center;
    }

    .profile img {
    border-radius: 15px;
    width: 120px;
    height: 120px;
    object-fit: cover;
    border: 3px solid #6b8e23;
    transition: transform 0.3s ease-in-out;
    }

    .profile img:hover {
    transform: scale(1.05);
    }

    .profile .image-container p {
    margin-top: 10px;
    font-size: 14px;
    color: #555;
    font-weight: bold;
    }

    .info {
    width: 100%;
    margin-top: 15px;
    }

    .info div {
    background-color: #fff;
    border-radius: 10px;
    padding: 12px 15px;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: background 0.3s ease;
    border: 1px solid #c1dbb8;
    }

    .info div:hover {
    background-color: #eef7ea;
    }

    .info div i {
    color: #6b8e23;
    cursor: pointer;
    transition: color 0.2s ease;
    }

    .info div i:hover {
    color: #4c7025;
    }

    .submit-container {
    width: 60%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    }

    .submit-container button {
    background-color: #6b8e23;
    border: none;
    border-radius: 12px;
    padding: 12px 25px;
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s ease-in-out;
    }

    .submit-container button:hover {
    background-color: #4c7025;
    transform: scale(1.05);
    }

    .illustration {
    text-align: center;
    }

    .illustration img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .container {
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    .profile, .submit-container {
        width: 100%;
    }

    .profile img {
        width: 100px;
        height: 100px;
    }

    .header h1 {
        font-size: 22px;
        padding-left: 10px;
    }

    .submit-container button {
        width: 100%;
    }
}

    </style>
</head>
<div class="header">
            <a href="dashboard.php" class="text">
                <button>
                    <i class="fas fa-arrow-left"></i> Dashboard
                </button>
            </a>
            <h1>
                Student Profile
            </h1>
        </div>

<body>
    <div class="container">

        <form method="POST" enctype="multipart/form-data">
            <div class="profile">
                <div class="image-container">
                    <img alt="Profile image" height="100" src="<?php echo $profileImage; ?>" width="100"/>
                    <input type="file" name="profile_image" accept="image/*">
                    <p>Set Image</p>
                </div>
                <div class="info">
                    <div>
                        Name: <input type="text" name="name" value="<?php echo $name; ?>" />
                    </div>
                    <div>
                        Email: <input type="email" name="email" value="<?php echo $email; ?>" />
                    </div>
                    <div>
                        Address: <input type="text" name="address" value="<?php echo $address; ?>" />
                    </div>
                    <div>
                        Password: <input type="password" name="password" value="<?php echo $password; ?>" />
                    </div>
                    <div>
                        Course: <input type="text" name="course" value="<?php echo $course; ?>" />
                    </div>
                </div>
            </div>

            <div class="submit-container">
                <div class="illustration">
                    <img alt="Illustration" height="200" src="asset/image 2.png" width="400"/>
                </div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
