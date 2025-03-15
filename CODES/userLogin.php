<?php
  include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Login</title>
  <link rel="stylesheet" href="Styles/userStyle.css">
</head>
<body>
  <header>
    <div class="logo">Lost and Found Hub</div>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="userLogin.php">Login</a></li>
        <li><a href="userRegistration.php">Register</a></li>
        <li><a href="userVerification.php">User Verification</a></li>
        <li><a href="aboutUs.php">About Us</a></li>
      </ul>
    </nav>
  </header>

  <section class="form-container">
    <h2>User Login</h2>
    <form id="user-login-form" name="user-login-form" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <button type="submit" name="submit"  >Login</button>
    </form>
    <p>Don't have an account? <a href="userRegistration.php">Register here</a>.</p>
  </section>
  <?php
        if(isset($_POST['submit']))
        {
          $count=0;
          $res=mysqli_query($db,"SELECT * from `userregistration` where username='$_POST[username]' && password='$_POST[password]' ");
          $count=mysqli_num_rows($res);

          if($count==0)
          {
            ?>
            <div class="alert alert-danger" style="color: red;">
              <strong>The username and password doesn't match</strong>
            </div>
            <?php
          }
          else
          {
            ?>
            <script type="text/javascript">
              window.location="userDashboard.php";            
            </script>
            <?php
          }
        }

        
        
      ?>   








  <footer>
    <p>&copy; 2025 Lost and Found Hub. All rights reserved.</p>
  </footer>

</body>
</html>