<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report Found Item</title>
  <link rel="stylesheet" href="Styles/style.css">
</head>
<body>
    <!-- Content-->
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

  <section class="report-form">
    <h2>Report a Found Item</h2>
    <form id="lost-item-form">
      <label for="item-name">Item Name:</label>
      <input type="text" id="item-name" name="item-name" required>

      <label for="category">Category:</label>
      <select id="category" name="category" required>
        <option value="electronics">Electronics</option>
        <option value="jewelry">Jewelry</option>
        <option value="clothing">Clothing</option>
        <option value="documents">Documents</option>
      </select>

      <label for="description">Description:</label>
      <textarea id="description" name="description" rows="4" required></textarea>

      <label for="location">Location Lost:</label>
      <input type="text" id="location" name="location" required>

      <label for="date-lost">Date Lost:</label>
      <input type="date" id="date-lost" name="date-lost" required>

      <label for="image">Upload Image (Optional):</label>
      <input type="file" id="image" name="image">

      <button type="submit">Submit</button>
    </form>
  </section>

  <footer>
    <p>&copy; 2025 Lost And Found Hub. All rights reserved.</p>
  </footer>

  
</body>
</html>