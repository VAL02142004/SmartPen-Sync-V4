

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student's List</title>
    <link rel="stylesheet" href="css/teacherlist.css" />
  </head>
  <body>
    <div class="container">
      <!-- Sidebar -->
      <div class="sidebar">
        <div class="profile">
          <div class="avatar"></div>
          <p class="role">Admin</p>
        </div>
        <a href="teacherlist.php" class="btn active">Teacher's List</a>
        <a href="studentlist.php" class="btn">Student's List</a>
        <!-- Logout Button -->
        <a href="logout.php" class="btn">Log Out</a>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <div class="header">
          <h2>Teacher's List</h2>
          <a href="addteacher.php" class="create-btn">Create New +</a>
        </div>

        <!-- Search Bar -->
        <form method="POST" action="teacherlist.php">
            <input type="text" name="search" placeholder="Search by Name or Email" value="<?= htmlspecialchars($searchTerm) ?>" />
            <button type="submit">Search</button>
        </form>

        <table>
          <thead>
            <tr>
              <th>NAME</th>
              <th>EMAIL</th>
              <th>ADDRESS</th>
              <th>STATUS</th>
              <th>USERNAME</th>
              <th>PASSWORD</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($teacher = $teacherslist->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
              <td><?=$teacher['name'];?></td>
              <td><?=$teacher['email'];?></td>
              <td><?=$teacher['address'];?></td>
              <td><?=$teacher['status'];?></td>
              <td><?=$teacher['username'];?></td>
              <td>**********</td> <!-- Hide passwords for security -->
              <td><a href="teacherlist.php?delete_id=<?=$teacher['id'];?>" onclick="return confirm('Are you sure you want to delete this teacher?')">Delete</a></td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="teacherlist.php?page=<?= $page - 1 ?>">Previous</a>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="teacherlist.php?page=<?= $i ?>" <?= $i == $page ? 'class="active"' : '' ?>><?= $i ?></a>
            <?php endfor; ?>
            <?php if ($page < $totalPages): ?>
                <a href="teacherlist.php?page=<?= $page + 1 ?>">Next</a>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </body>
</html>
