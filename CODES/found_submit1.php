<?php
include 'db_connect.php';

session_start(); // to temporarily hold match results or messages

// 🟡 Handle form submission at the top before HTML output
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $item = $_POST['item_name'];
    $cat = $_POST['category'];
    $desc = $_POST['description'];
    $loc = $_POST['location'];
    $date = $_POST['date_found'];
    $ref = uniqid("FOUND-");

    // Save the item to database
    $db->query("INSERT INTO found_items (ref_id, item_name, category, description, location, date_found)
                VALUES ('$ref', '$item', '$cat', '$desc', '$loc', '$date')");

    // Prepare match result
    $fromDate = date('Y-m-d', strtotime($date . ' -2 days'));
    $toDate = date('Y-m-d', strtotime($date . ' +2 days'));

    $matchQuery = "
        SELECT * FROM lost_items 
        WHERE item_name = '$item' 
          AND category = '$cat'
          AND location = '$loc'
          AND date_lost BETWEEN '$fromDate' AND '$toDate'
    ";
    $matches = $db->query($matchQuery);

    // Store results in session temporarily
    $_SESSION['ref_id'] = $ref;
    $_SESSION['match_results'] = [];

    if ($matches->num_rows > 0) {
        while ($row = $matches->fetch_assoc()) {
            $_SESSION['match_results'][] = $row;
        }
    }

    // Redirect to avoid duplicate form submission
    header("Location: found_submit1.php?success=1");
    exit();
}
?>

<!-- 🟢 HTML Page Starts Here -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Report Found Item</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background-image: url('Images/found1.jpg');
      background-size: cover;
      background-repeat: no-repeat;
    }
    .report-form {
      background-color: black;
      color: white;
      width: 900px;
      height: auto;
      opacity: 0.8;
      padding: 20px;
      margin: auto;
    }
    .recent-items {
      margin-top: 20px;
      padding: 10px;
      border: 1px solid #ccc;
      background-color: black;
      color: white;
      width: 500px;
      margin: auto;
      text-align: center;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">Lost And Found Hub</div>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="lost_submit1.php">Report Lost</a></li>
        <li><a href="found_submit1.php">Report Found</a></li>
        <li><a href="browse_items.php">Browse Items</a></li>
      </ul>
    </nav>
  </header>


  <section class="report-form">
    <h2 style="text-align: center; color: blue;">Report a Found Item</h2>
    <form action="found_submit.php" method="POST" enctype="multipart/form-data">        
      <input type="text" name="item_name" placeholder="Item Name" required><br>
      <label for="category">Category:</label>            
      <select name="category" required>
        <option value="" disabled selected>Select a category</option>
        <option value="electronics">Electronics</option>
        <option value="jewelry">Jewelry</option>
        <option value="clothing">Clothing</option>
        <option value="documents">Documents</option>
        <option value="others">Others</option>
      </select><br>
      <textarea name="description" placeholder="Describe the item" required></textarea><br>    
      <label for="location">Location:</label>
      <select name="location" required>
        <option value="" disabled selected>Select where item was found</option>
        <option value="Entrance">Entrance</option>
        <option value="Toilet">Toilet</option>
        <option value="Bar">Bar</option>
        <option value="Dance floor">Dance Floor</option>
        <option value="Ground floor">Ground Floor</option>
        <option value="others">Others</option>
      </select><br>
      <input type="date" name="date_found" required><br>    
      <button type="submit" name="submit">Submit</button>
    </form>

    <!-- ✅ Show match results if redirected from POST -->
    <?php if (isset($_GET['success']) && isset($_SESSION['ref_id'])): ?>
      <div class="recent-items">
        <h3>Found item submitted successfully!</h3>
        <p><strong>Reference ID:</strong> <?= $_SESSION['ref_id']; ?></p>

        <?php if (!empty($_SESSION['match_results'])): ?>
          <h4>🟢 Potential matches found in LOST items:</h4>
          <?php foreach ($_SESSION['match_results'] as $match): ?>
            <p><strong><?= $match['item_name']; ?></strong><br>
            Location: <?= $match['location']; ?><br>
            Date Lost: <?= $match['date_lost']; ?><br>
            Ref: <?= $match['ref_id']; ?></p><hr>
          <?php endforeach; ?>
        <?php else: ?>
          <p>🔍 No matches found at the moment.</p>
        <?php endif; ?>

        <?php 
          // Clear session data after display
          unset($_SESSION['ref_id']);
          unset($_SESSION['match_results']);
        ?>
      </div>
    <?php endif; ?>
  </section>

  <footer>
    <p>&copy; 2025 Lost and Found Hub. All rights reserved.</p>
  </footer>
</body>
</html>