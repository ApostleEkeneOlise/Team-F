<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lost and Found Hub</title>
</head>
<body>
  <header>
    <h1 style="margin: 0;">Lost and Found Hub</h1>
    <p style="margin: 5px 0;">Report lost or found items here.</p>
  </header>

  <main style="padding: 20px;">
    <section id="submission-form">
      <h2>Submit a Lost or Found Item</h2>
      <form id="itemForm">
        <label for="itemType">Item Type:</label><br>
        <select id="itemType" name="itemType" required style="margin-bottom: 10px; width: 100%; padding: 8px;">
          
        </select><br>

        <label for="itemName">Item Name:</label><br>
        <input type="text" id="itemName" name="itemName"  required style="margin-bottom: 10px; width: 100%; padding: 8px;">

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required style="margin-bottom: 10px; width: 100%; padding: 8px;"></textarea>

        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location"  required style="margin-bottom: 10px; width: 100%; padding: 8px;">

        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" required style="margin-bottom: 10px; width: 100%; padding: 8px;">

        <label for="contact">Contact Info:</label><br>
        <input type="text" id="contact" name="contact"  required style="margin-bottom: 10px; width: 100%; padding: 8px;">

        <button type="submit" style="background-color: #007BFF; color: white; padding: 10px 20px; border: none; cursor: pointer;">Submit</button>
      </form>
    </section>

    
  </main>

  <footer>
    <p>&copy; 2025 Lost and Found Hub </p>
    <p>...Reconnecting you to your items... </p>
  </footer>
</body>
</html>
