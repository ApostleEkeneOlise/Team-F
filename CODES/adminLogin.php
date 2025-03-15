

<?php
  include 'connection.php';
?>

   <!DOCTYPE html>
   <html lang="en">
    <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Admin Login</title>
     <link rel="stylesheet" href="Styles/adminStyle.css">
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
  
  <div class="login-container">
    <!-- Login Form -->
    <div id="login-form">
      <h2>Admin Login</h2>
      <form id="admin-login-form" name="admin-login-form" method="post">
        <label for="username">Username:</label>
        <input type="text" id="admin_username" name="admin_username" required>

        <label for="password">Password:</label>
        <input type="password" id="admin_password" name="admin_password" required>

        <button type="submit" name="submit" >Login</button>
      </form>

      <?php
        if(isset($_POST['submit']))
        {
          $count=0;
          $res=mysqli_query($db,"SELECT * from `adminregistration` where admin_username='$_POST[admin_username]' && admin_password='$_POST[admin_password]' ");
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
              window.location="adminDashboard.php";
            </script>
            <?php
          }
        }

        
        
      ?>    
      
    </div>




    <!-- Registration Form (Hidden by Default) 
    <div id="register-form" style="display: none;">
      <h2>Admin Registration</h2>
      <form id="admin-register-form">
        <label for="reg-username">Username:</label>
        <input type="text" id="reg-username" name="reg-username" required>

        <label for="reg-password">Password:</label>
        <input type="password" id="reg-password" name="reg-password" required>

        <label for="confirm-password">Confirm Password:</label>
        <input type="password" id="confirm-password" name="confirm-password" required>

        <button type="submit">Register</button>
      </form>
      <p>Already have an account? <a href="#" id="login-link">Login here</a>.</p>
    </div>
  </div>
  -->

</body>
 </html>

