<?php
include 'db_connect.php';

$searchInput = isset($_GET['q']) ? trim($_GET['q']) : '';
$lostResults = $foundResults = [];
$searchError = "";

// Check if input is a specific reference ID
$isRef = (strpos($searchInput, 'LOST-') === 0 || strpos($searchInput, 'FOUND-') === 0);

if (!empty($searchInput)) {
    $term = mysqli_real_escape_string($db, $searchInput);

    if ($isRef) {
        if (strpos($term, 'LOST-') === 0) {
            $result = $db->query("SELECT * FROM lost_items WHERE ref_id = '$term'");
            if ($result->num_rows > 0) {
                $lostResults = $result->fetch_all(MYSQLI_ASSOC);
            } else {
                $searchError = "No lost item found with that reference ID.";
            }
        } else {
            $result = $db->query("SELECT * FROM found_items WHERE ref_id = '$term'");
            if ($result->num_rows > 0) {
                $foundResults = $result->fetch_all(MYSQLI_ASSOC);
            } else {
                $searchError = "No found item found with that reference ID.";
            }
        }
    } else {
        // General keyword search (by name or description)
        $lostResults = $db->query("SELECT * FROM lost_items WHERE item_name LIKE '%$term%' OR description LIKE '%$term%'")->fetch_all(MYSQLI_ASSOC);
        $foundResults = $db->query("SELECT * FROM found_items WHERE item_name LIKE '%$term%' OR description LIKE '%$term%'")->fetch_all(MYSQLI_ASSOC);

        if (empty($lostResults) && empty($foundResults)) {
            $searchError = "No items found matching '$searchInput'.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Search Results</title>
  <style>
    body {
      font-family: Arial;
      background: #f9f9f9;
      padding: 40px;
    }
    .section {
      margin-bottom: 40px;
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    h2 {
      color: #264653;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: left;
    }
    th {
      background: #2a9d8f;
      color: white;
    }
    .btn {
      display: inline-block;
      margin-top: 20px;
      background: #333;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 4px;
    }
  </style>
</head>
<body>

<a href="index.php" class="btn">⬅ Back to Homepage</a>

<div class="section">
  <h2>Search Result for: <?= htmlspecialchars($searchInput) ?></h2>

  <?php if ($searchError): ?>
    <p style="color: red;"><?= $searchError ?></p>
  <?php endif; ?>
</div>

<?php if (!empty($lostResults)): ?>
  <div class="section">
    <h2>🔵 Matching Lost Items</h2>
    <table>
      <tr>
        <th>Item Name</th>
        <th>Category</th>
        <th>Location</th>
        <th>Date Lost</th>
        <th>Ref ID</th>
      </tr>
      <?php foreach ($lostResults as $item): ?>
        <tr>
          <td><?= $item['item_name'] ?></td>
          <td><?= $item['category'] ?></td>
          <td><?= $item['location'] ?></td>
          <td><?= $item['date_lost'] ?></td>
          <td><?= $item['ref_id'] ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
<?php endif; ?>

<?php if (!empty($foundResults)): ?>
  <div class="section">
    <h2>🟢 Matching Found Items</h2>
    <table>
      <tr>
        <th>Item Name</th>
        <th>Category</th>
        <th>Location</th>
        <th>Date Found</th>
        <th>Ref ID</th>
      </tr>
      <?php foreach ($foundResults as $item): ?>
        <tr>
          <td><?= $item['item_name'] ?></td>
          <td><?= $item['category'] ?></td>
          <td><?= $item['location'] ?></td>
          <td><?= $item['date_found'] ?></td>
          <td><?= $item['ref_id'] ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
<?php endif; ?>

</body>
</html>