<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>SPC Online Quiz</title>
  <link href="css/login.css" rel="stylesheet"/>
</head>
<body> 
    <header>
        <h1>SPC Online Quiz</h1>
    </header>
  <div class="login-container">
    <form method="post" class="login-form" onsubmit="handleSubmit(event)">
      <div class="login-title">Log In</div>
      <?php
              require_once './database/dbconfig.php';

                // if($user->is_loggedin()!=""){
                // $user->redirect('Dashboard.php');
                // }
      
                if(isset($_POST['btn-submit'])){
                  $user->authLogin($_POST['btn-submit']);
                }
            ?>     
      <label for="name">Name:</label>
      <input id="name" name="name" required="" type="text"/>
      <label for="password">Password:</label>
      <input id="password" name="password" required="" type="password"/>
      <button type="submit" name="btn-submit">Submit</button>
    </form>
    <img id="popup-image" alt="Success Image" src="asset/image 3.png" class="login-image" height="150" width="250"/>
  </div>
</body>
</html>