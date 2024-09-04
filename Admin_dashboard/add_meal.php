<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    header('Location: ../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Meal</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <div class="header">
        <h1>Admin Dashboard - Add Meal</h1>
    </div>

    <nav class="navBar">
          <ul class="nav">
            <li><a class="link" href="../index.php">Home</a></li>
            <li><a class="link" href="../Pages/menu.php">Menu</a></li>
            <li><a class="link" href="../Pages/event.php">Events </a></li>
            <li><a class="link" href="../Pages/promotion.php">Promotions </a></li>
            <li><a class="link" href="../Pages/reservation.php">Reservation</a></li>
            <li><a class="link" href="../Pages/contact.php">Contact</a></li>
            <li><a class="link" href="../about.php">About</a></li>
          </ul>
        </nav>
        
    <div class="sidebar">
        <a href="admindashboard.php">Dashboard Home</a>
        <a href="manage_meals.php">Manage Meals</a>
        <a href="add_meal.php">Add Meal</a>
    </div>
    <div class="content">
        <h2>Add New Meal</h2>
        <form class="addcss" action="add_meal_process.php" method="post" enctype="multipart/form-data">
            <label class="addlabel" for="meal_name">Meal Name:</label>
            <input  type="text" id="meal_name" name="meal_name" required><br>

            <label class="addlabel" for="meal_description">Meal Description:</label>
            <textarea id="meal_description" name="meal_description" required></textarea><br>

            <label class="addlabel" for="meal_price">Meal Price:</label>
            <input type="number" step="0.01" id="meal_price" name="meal_price" required><br>

            <label class="addlabel" for="meal_image">Meal Image:</label>
            <input type="file" id="meal_image" name="meal_image" accept="image/*" required><br>

            <label class="addlabel" for="meal_cuisine">Cuisine Type:</label>
            <select id="meal_cuisine" name="meal_cuisine" required>
                <option value="Italian">Italian</option>
                <option value="Chinese">Chinese</option>
                <option value="Mexican">Sri Lankan</option>
                <option value="Indian">Indian</option>
                <option value="American">American</option>
                <!-- Add more cuisine types as needed -->
            </select><br>

            <button type="submit">Add Meal</button>
        </form>
    </div>
</body>
</html>
