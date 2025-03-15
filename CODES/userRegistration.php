<?php
include "connection.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration</title>
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
    <h2>User Registration</h2>
    <form id="user-register-form" action="" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <label for="confirm-password">Confirm Password:</label>
      <input type="password" id="confirm-password" name="confirm-password" required>

      <button type="submit" name="submit">Register</button>
    </form>
    <p>Already have an account? <a href="userLogin.php">Login here</a>.</p>
  </section>
    
    
     <?php

     
      if(isset($_POST['submit']))
      {

        $count=0;
        $res=mysqli_query($db,"SELECT username from `userregistration` where username='$_POST[username]' ");
        $count=mysqli_num_rows($res);

        if($count>0)  //if username already exists in the database then count will be greater than 0        
        {
    ?>
          <script type="text/javascript">
            alert("The username already exists.");
          </script>

    <?php
        }
        else
        {
          $count=0;
          $res=mysqli_query($db,"SELECT email from `userregistration` where email='$_POST[email]' ");
          $count=mysqli_num_rows($res);

          if($count>0)  //if email already exists in the database then count will be greater than 0        
          {
    ?>
            <script type="text/javascript">
              alert("The email already exists.");
            </script>
    <?php
          }
        } 
        //if username and email do not exist in the database then insert the data into the database
        if($count==0)
        {
          $username = $_POST['username'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $confirmPassword = $_POST['confirm-password'];
          if($password == $confirmPassword){
            $query = "INSERT INTO `userregistration` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
            if(mysqli_query($db, $query))
            {
    ?>
          <script type="text/javascript">
            alert("Registered successfully.");  
          </script>
    <?php
          }
          else
          {
    ?>     
            <script type="text/javascript">
            alert("Registered failed."); 
            </script>
    <?php            
          }
        }
        else
        {
    ?>
          <script type="text/javascript">
            alert("Passwords do not match.");
          </script>
    <?php
        }
          
        }
      }
      
    ?>
    


  <footer>
    <p>&copy; 2025 Lost and Found Hub. All rights reserved.</p>
  </footer>

  
</html>