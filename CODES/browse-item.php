<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Browse Items</title>
  <link rel="stylesheet" href="Styles/style.css">
</head>
<body>
    <script src="Scripts/script.js"></script>
  <header>
    <div class="logo">Lost And Found Hub</div>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="report-lost.php">Report Lost</a></li>
        <li><a href="browse-items.php">Browse Items</a></li>
      </ul>
    </nav>
  </header>

  <section class="browse-items">
    <h2>Browse Lost And Found Items</h2>
    <div class="filters">
      <input type="text" placeholder="Search by name">
      <select id="category-filter">
        <option value="all">All Categories</option>
        <option value="electronics">Electronics</option>
        <option value="jewelry">Jewelry</option>
        <option value="clothing">Clothing</option>
        <option value="documents">Documents</option>
      </select>
      <button>Search</button>
    </div>

    <div class="items-list">
      <!-- Items will be dynamically added here using JavaScript -->
    </div>
  </section>

  <footer>
    <p>&copy; 2025 Lost And Found Hub. All rights reserved.</p>
  </footer>

  <script src="Scripts/"></script>
</body>
</html>