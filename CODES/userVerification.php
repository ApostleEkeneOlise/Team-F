<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verify Account</title>
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
        <li><a href="aboutUs.php">About Us</a></li>
      </ul>
    </nav>
  </header>

  <section class="form-container">
    <h2>Verify Your Account</h2>
    <form id="verify-account-form">
      <label for="token">Verification Token:</label>
      <input type="text" id="token" name="token" required>
      <button type="submit">Verify</button>
    </form>
  </section>

  <footer>
    <p>&copy; 2025 Lost and Found Hub. All rights reserved.</p>
  </footer>

  <script src="Scripts/userScript.js"></script>
</body>
</html>