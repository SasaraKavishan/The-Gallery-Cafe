<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    header('Location: ../login.php');
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "the_gallery_cafe";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mealId = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $cuisine = $_POST['cuisine'];
    
    // Check if a new image has been uploaded
    if (!empty($_FILES['image']['name'])) {
      $image = $_FILES['image']['tmp_name'];
      $imageData = file_get_contents($image);
      $base64Image = base64_encode($imageData);
        
        $sql = "UPDATE meals SET name='$name', description='$description', price='$price', cuisine='$cuisine', image='$base64Image' WHERE id='$mealId'";
    } else {
        $sql = "UPDATE meals SET name='$name', description='$description', price='$price', cuisine='$cuisine' WHERE id='$mealId'";
    }

    if (mysqli_query($conn, $sql)) {
        header('Location: ../Admin_dashboard/manage_meals.php');
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    $mealId = $_GET['id'];
    $sql = "SELECT * FROM meals WHERE id='$mealId'";
    $result = mysqli_query($conn, $sql);
    $meal = mysqli_fetch_assoc($result);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Meal</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <div class="header">
        <h1>Admin Dashboard - Edit Meal</h1>
    </div>
    <div class="sidebar">
        <a href="../Admin_dashboard/adnimdashboard.php">Dashboard Home</a>
        <a href="manage_meals.php">Manage Meals</a>
        <a href="manage_users.php">Manage Users</a>
        <a href="manage_reservations.php">Manage Reservations</a>
        <a href="manage_orders.php">Manage Orders</a>
        <a href="manage_events.php">Manage Special Events</a>
        <a href="manage_promotions.php">Manage Promotions</a>
        <a href="view_statistics.php">View Statistics</a>
    </div>
    <div class="content">
        <h2>Edit Meal</h2>
        <form method="post" action="edit_meal.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $meal['id']; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $meal['name']; ?>" required>
            <br>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo $meal['description']; ?></textarea>
            <br>
            <label for="price">Price:</label>
            <input type="number" step="0.01" id="price" name="price" value="<?php echo $meal['price']; ?>" required>
            <br>
            <label for="cuisine">Cuisine:</label>
            <input type="text" id="cuisine" name="cuisine" value="<?php echo $meal['cuisine']; ?>" required>
            <br>
            
            <br>
            <input type="submit" value="Update Meal">
        </form>
    </div>
</body>
</html>
