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

// Fetch all users
$user_sql = "SELECT id, username FROM users";
$user_result = mysqli_query($conn, $user_sql);

// Fetch all meals
$meal_sql = "SELECT id, name, price FROM meals";
$meal_result = mysqli_query($conn, $meal_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Order</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <div class="header">
        <h1>Admin Dashboard - Add Order</h1>
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
        <a href="manage_orders.php">Manage Orders</a>
        <a href="add_order.php">Add Order</a>
    </div>
    <div class="content">
        <h2>Add New Order</h2>
        <form  action="add_order_process.php" method="post">
            <label for="user">Select User:</label>
            <select id="user" name="user_id" required>
                <option value="">Select User</option>
                <?php while ($user_row = mysqli_fetch_assoc($user_result)) { ?>
                    <option value="<?php echo $user_row['id']; ?>"><?php echo $user_row['username']; ?></option>
                <?php } ?>
            </select><br>

            <label for="meals">Select Meals:</label><br>
            <?php while ($meal_row = mysqli_fetch_assoc($meal_result)) { ?>
                <div>
                    <input type="checkbox" id="meal-<?php echo $meal_row['id']; ?>" name="meals[<?php echo $meal_row['id']; ?>]" value="<?php echo $meal_row['price']; ?>">
                    <label for="meal-<?php echo $meal_row['id']; ?>"><?php echo $meal_row['name']; ?> - $<?php echo $meal_row['price']; ?></label>
                    <label for="quantity-<?php echo $meal_row['id']; ?>">Quantity:</label>
                    <input type="number" id="quantity-<?php echo $meal_row['id']; ?>" name="quantities[<?php echo $meal_row['id']; ?>]" min="1" value="1">
                </div>
            <?php } ?><br>

            <button type="submit">Add Order</button>
        </form>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
