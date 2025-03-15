<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Items</title>
  <link rel="stylesheet" href="Styles/adminStyle.css">
</head>
<body>
  <header>
    <h1>Manage Lost And Found Items</h1>
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
    <section class="items-list">
      <h2>Reported Items</h2>
      <table id="items-table">
        <thead>
          <tr>
            <th>Item Name</th>
            <th>Category</th>
            <th>Location</th>
            <th>Date</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Items will be dynamically added here -->
        </tbody>
      </table>
    </section>
  </main>

  <script src="Scripts/adminScript.js"></script>
</body>
</html>