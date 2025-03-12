<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student's List</title>
    <link rel="stylesheet" href="./css/addstudent.css"/>
  </head>
  <body>
    <div class="container">
      <!-- Sidebar -->
      <div class="sidebar">
        <div class="profile">
          <div class="avatar"></div>
          <p class="role">Admin</p>
        </div>
        <a href="teacherlist.php" class="btn">Teacher's List</a>
        <a href="studentlist.php" class="btn active">Student's List</a>
        <!-- Logout Button -->
        <a href="logout.php" class="btn">Log Out</a>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <div class="header">
          <h2>Add Student</h2>
        </div>
        <form action="add_student.php" method="post">
        <div class="table">
          <input type="text" placeholder="Name" name="name"/>
          <input type="text" placeholder="Email" name="email"/>
          <input type="text" placeholder="Address" name="address"/>
          <input type="text" placeholder="Course" name="course"/>
          <input type="text" placeholder="Username" name="username"/>
          <input type="password" placeholder="Password" name="password"/>
          <button class="create-btn" name="btn-submit">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </body>
</html>
