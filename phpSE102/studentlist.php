<?php
require_once './database/dbconfig.php';
$studentslist = $DB_con->query("SELECT * FROM students_list");  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student's List</title>
    <link rel="stylesheet" href="css/studentlist.css"/>
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
          <h2>Student's List</h2>
          <a href="addstudent.php" class="create-btn">Create New +</a>
        </div>
        <table>
          <thead>
            <tr>
              <th>NAME</th>
              <th>EMAIL</th>
              <th>ADDRESS</th>
              <th>COURSE</th>
            </tr>
          </thead>
          <tbody>
          <?php while ($student= $studentslist->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
              <td><?=$student['name'];?></td>
              <td><?=$student['email'];?></td>
              <td><?=$student['address'];?></td>
              <td><?=$student['course'];?>S</td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
