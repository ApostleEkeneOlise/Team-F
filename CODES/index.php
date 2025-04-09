<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lost And Found Hub</title>
  <details>...You can never miss out on your items</details>
  <link rel="stylesheet" href="Styles/style.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: url('Images/background.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
    }

    header {
      background-color: #000;
      padding: 20px;
    }

    .logo {
      font-size: 24px;
      font-weight: bold;
      color: #fff;
    }

    nav ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
      display: flex;
      gap: 20px;
    }

    nav ul li a {
      color: #fff;
      text-decoration: none;
      font-weight: bold;
    }

    nav ul li a:hover {
      text-decoration: underline;
    }

    .hero {
      text-align: center;
      padding: 80px 20px;
      background-color: rgba(0, 0, 0, 0.6);
    }

    .search-bar input {
      padding: 10px;
      width: 300px;
      border-radius: 4px;
      border: none;
      margin-right: 10px;
    }

    .search-bar button {
      padding: 10px 20px;
      border: none;
      background-color: #f4a261;
      color: #000;
      border-radius: 4px;
      cursor: pointer;
    }

    .cta-buttons a.btn {
      display: inline-block;
      margin: 10px;
      padding: 12px 24px;
      background-color: #2a9d8f;
      color: #fff;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
    }

    .cta-buttons a.btn:hover {
      background-color: #21867a;
    }

    .recent-items {
      padding: 40px 20px;
      background-color: rgba(0, 0, 0, 0.75);
    }

    .recent-items h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #f4a261;
    }

    table {
      width: 90%;
      margin: 0 auto 40px;
      border-collapse: collapse;
      background-color: #fff;
      color: #000;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: left;
    }

    th {
      background-color: #264653;
      color: #fff;
    }

    footer {
      background-color: #000;
      text-align: center;
      padding: 20px;
      position: relative;
      bottom: 0;
      width: 100%;
      color: #fff;
    }
  </style>
</head>
<body>
 

  <!-- Header -->
  <header>
    <div class="logo">Lost And Found Hub</div>
    <nav >
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="adminLogin.php">Admin Portal</a></li>
        <li><a href="userLogin.php">User Portal</a></li>
        <li><a href="aboutUs.php">About Us</a></li>
      </ul>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero">
    <h1>Find What You Lost, Return What You Found</h1>
    <div class="search-bar">
      <form action="search.php" method="GET">
        <input type="text" name="q" placeholder="Search for lost or found items" required>
        <button type="submit">Search</button>
      </form>
    </div>
    <div class="cta-buttons">
      <a href="lost_submit1.php" class="btn">Report Lost Item</a>
      <a href="found_submit1.php" class="btn">Report Found Item</a>
    </div>
  </section>

  <!-- Recently Reported Items -->
  <section class="recent-items">
    <h2>🕵️ Recently Reported Lost Items</h2>
    <table>
      <tr>
        <th>Item Name</th>
        <th>Category</th>
        <th>Location</th>
        <th>Date Lost</th>
        <th>Ref ID</th>
      </tr>
      <?php
      $lostItems = $db->query("SELECT * FROM lost_items ORDER BY id DESC LIMIT 5");
      if ($lostItems->num_rows > 0) {
        while ($item = $lostItems->fetch_assoc()) {
          echo "<tr>";
          echo "<td>{$item['item_name']}</td>";
          echo "<td>{$item['category']}</td>";
          echo "<td>{$item['location']}</td>";
          echo "<td>{$item['date_lost']}</td>";
          echo "<td>{$item['ref_id']}</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='5'>No lost items reported yet.</td></tr>";
      }
      ?>
    </table>

    <h2>🧾 Recently Reported Found Items</h2>
    <table>
      <tr>
        <th>Item Name</th>
        <th>Category</th>
        <th>Location</th>
        <th>Date Found</th>
        <th>Ref ID</th>
      </tr>
      <?php
      $foundItems = $db->query("SELECT * FROM found_items ORDER BY id DESC LIMIT 5");
      if ($foundItems->num_rows > 0) {
        while ($item = $foundItems->fetch_assoc()) {
          echo "<tr>";
          echo "<td>{$item['item_name']}</td>";
          echo "<td>{$item['category']}</td>";
          echo "<td>{$item['location']}</td>";
          echo "<td>{$item['date_found']}</td>";
          echo "<td>{$item['ref_id']}</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='5'>No found items reported yet.</td></tr>";
      }
      ?>
    </table>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 Lost And Found Hub. All rights reserved.</p>
  </footer>
</body>
</html>