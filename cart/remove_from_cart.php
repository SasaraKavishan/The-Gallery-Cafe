<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "the_gallery_cafe";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['cart_item_id'])) {
    $cart_item_id = $_GET['cart_item_id'];
    
    $sql = "DELETE FROM cart_items WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $cart_item_id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $_SESSION['message'] = "Item removed from cart successfully!";
    } else {
        $_SESSION['message'] = "Failed to remove item from cart.";
    }
}

mysqli_close($conn);

header('Location: ../cart/pre_order_cart.php');
exit();
?>
