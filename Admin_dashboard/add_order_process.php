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

$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$meals = $_POST['meals'];
$quantities = $_POST['quantities'];

// Calculate total price
$total_price = 0;
foreach ($meals as $meal_id => $price) {
    $quantity = $quantities[$meal_id];
    $total_price += $price * $quantity;
}

// Insert the order into the orders table
$sql = "INSERT INTO orders (user_id, total_price, order_date) VALUES ('$user_id', '$total_price', NOW())";
if (mysqli_query($conn, $sql)) {
    $order_id = mysqli_insert_id($conn);

    // Insert each meal into the order_items table
    foreach ($meals as $meal_id => $price) {
        $quantity = $quantities[$meal_id];
        $sql = "INSERT INTO order_items (order_id, meal_id, quantity, price) VALUES ('$order_id', '$meal_id', '$quantity', '$price')";
        mysqli_query($conn, $sql);
    }

    header('Location: ../Admin_dashboard/manage_orders.php');
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
