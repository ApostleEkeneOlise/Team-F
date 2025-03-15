<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="Styles/adminStyle.css">
</head>
<body>
  <header>
    <h1>Admin Dashboard</h1>
    <nav>
      <ul>
        <li><a href="adminDashboard.php">Dashboard</a></li>
        <li><a href="adminManageItems.php">Manage Items</a></li>
        <li><a href="index.php">Home</a></li>
        <li><a href="#" id="logout">Logout</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="overview">
      <h2>System Overview</h2>
      <div class="stats">
        <div class="stat">
          <h3>Total Users</h3>
          <p id="total-users">0</p>
        </div>
        <div class="stat">
          <h3>Total Lost Items</h3>
          <p id="total-lost-items">0</p>
        </div>
        <div class="stat">
          <h3>Total Found Items</h3>
          <p id="total-found-items">0</p>
        </div>
      </div>
    </section>
  </main>

  <script src="Scripts/adminScript.js"></script>
</body>
</html>