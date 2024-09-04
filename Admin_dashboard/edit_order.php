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

if (isset($_POST['update'])) {
    $order_id = $_POST['order_id'];
    $total_price = $_POST['total_price'];
    $order_date = $_POST['order_date'];

    $sql = "UPDATE orders SET total_price='$total_price', order_date='$order_date' WHERE id='$order_id'";
    mysqli_query($conn, $sql);

    header('Location: ../Admin_dashboard/manage_orders.php');
}

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    $sql = "SELECT * FROM orders WHERE id='$order_id'";
    $result = mysqli_query($conn, $sql);
    $order = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <div class="content">
        <h2>Edit Order</h2>
        <form action="edit_order.php" method="post">
            <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
            <label for="total_price">Total Price:</label>
            <input type="text" name="total_price" value="<?php echo $order['total_price']; ?>"><br>
            <label for="order_date">Order Date:</label>
            <input type="date" name="order_date" value="<?php echo $order['order_date']; ?>"><br>
            <input type="submit" name="update" value="Update Order">
        </form>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
