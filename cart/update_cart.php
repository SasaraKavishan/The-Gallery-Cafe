<?php
session_start();

if (!isset($_SESSION['userid'])) {
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

$action = $_POST['action'];

if ($action == 'update_cart') {
    // Update cart quantities
    foreach ($_POST['quantities'] as $cart_item_id => $quantity) {
        $sql = "UPDATE cart_items SET quantity = $quantity WHERE id = $cart_item_id";
        mysqli_query($conn, $sql);
    }
    header('Location: cart.php');
} elseif ($action == 'confirm_order') {
    // Process order confirmation
    $user_id = $_SESSION['userid'];

    // Fetch cart details
    $sql = "SELECT ci.id as cart_item_id, ci.meal_id, ci.quantity, m.price
            FROM cart_items ci
            JOIN meals m ON ci.meal_id = m.id
            WHERE ci.cart_id = (SELECT id FROM cart WHERE user_id = $user_id LIMIT 1)";
    
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Calculate total price
    $total_price = 0;
    $order_items = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $total_price += $row['price'] * $row['quantity'];
        $order_items[] = $row;
    }

    // Insert order into orders table
    $sql = "INSERT INTO orders (user_id, total_price, order_date) VALUES ('$user_id', '$total_price', NOW())";
    mysqli_query($conn, $sql);

    // Get the last inserted order id
    $order_id = mysqli_insert_id($conn);

    // Insert order items into order_items table
    foreach ($order_items as $item) {
        $meal_id = $item['meal_id'];
        $quantity = $item['quantity'];
        $price = $item['total_price'];
        $sql = "INSERT INTO order_items (order_id, meal_id, quantity, total_price) VALUES ('$order_id', '$meal_id', '$quantity', '$price')";
        mysqli_query($conn, $sql);
    }

    // Clear the cart
    $sql = "DELETE FROM cart_items WHERE cart_id = (SELECT id FROM cart WHERE user_id = $user_id LIMIT 1)";
    mysqli_query($conn, $sql);

    header('Location: ../cart/cart_completed.php');
}

mysqli_close($conn);
?>
