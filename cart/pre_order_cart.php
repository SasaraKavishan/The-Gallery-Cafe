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

// Fetch cart_id based on session or user id
$sql = "SELECT ci.id as cart_item_id, m.id as meal_id, m.name, m.price, m.image, ci.quantity
        FROM cart_items ci
        JOIN meals m ON ci.meal_id = m.id
        WHERE ci.cart_id = (SELECT id FROM cart WHERE user_id = {$_SESSION['userid']} LIMIT 1)";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../CSS/cart.css">
</head>
<body>

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

        
    <div class="cart-container">
        <h1>Your Shopping Cart</h1>
        <form action="update_cart.php" method="post">
            <div class="cart-items">
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="cart-item">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" alt="<?php echo $row['name']; ?>" width="100">                        <div class="item-details">
                            <h2><?php echo $row['name']; ?></h2>
                            <p>Price: $<?php echo $row['price']; ?></p>
                            <label for="quantity-<?php echo $row['cart_item_id']; ?>">Quantity:</label>
                            <input type="number" name="quantities[<?php echo $row['cart_item_id']; ?>]" id="quantity-<?php echo $row['cart_item_id']; ?>" value="<?php echo $row['quantity']; ?>" min="1">
                            <a href="remove_from_cart.php?cart_item_id=<?php echo $row['cart_item_id']; ?>">Remove</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <button type="submit">Update Cart</button>
            <form action="update_cart.php" method="post">
            <input type="hidden" name="action" value="confirm_order">
            <button type="submit">Confirm Order</button>
        </form>
        </form>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
