<?php
session_start();
if (!isset($_SESSION['role'])) {
    header('Location: login.php');
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

$userid = $_SESSION['userid'];
$meal_id = $_POST['meal_id'];
$quantity = $_POST['quantity'];

// Check if the user already has an open cart
$sql = "SELECT id FROM cart WHERE user_id = '$userid'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $cart = mysqli_fetch_assoc($result);
    $cart_id = $cart['id'];
} else {
    // Create a new cart for the user
    $sql = "INSERT INTO cart (user_id) VALUES ('$userid')";
    if (mysqli_query($conn, $sql)) {
        $cart_id = mysqli_insert_id($conn);
    } else {
        die("Error creating cart: " . mysqli_error($conn));
    }
}

// Add the meal to the cart_items table
$sql = "INSERT INTO cart_items (cart_id, meal_id, quantity) VALUES ('$cart_id', '$meal_id', '$quantity')";
if (mysqli_query($conn, $sql)) {
    echo "Meal added to cart successfully";
} else {
    die("Error adding meal to cart: " . mysqli_error($conn));
}

mysqli_close($conn);
header('Location: ../pages/menu.php');
exit();
?>
