<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Staff') {
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

$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <header>
    <div class="header">
        <h1>Staff Dashboard - Manage Orders</h1>
    </div>
    </header>

    <nav class="navBar">
    <a href="../logout.php"> <button class="LOGOUT-img">Logout</button></a>
          <ul class="nav">
            <li><a class="link" href="../index.php">Home</a></li>
            <li><a class="link" href="../Pages/menu.php">Menu</a></li>
            <li><a class="link" href="../Pages/specials.php">Events and Promotion</a></li>
            <li><a class="link" href="../Pages/reservation.php">Reservation</a></li>
            <li><a class="link" href="../Pages/contact.php">Contact</a></li>
            <li><a class="link" href="../about.php">About</a></li>
          </ul>
        </nav>

        <div class="sidebar">
        <a href="../staff/staffdashboard.php">Dashboard Home</a>
        <a href="../staff/view_reservation.php">View Reservation</a>
        <a href="../staff/view_pre-orders.php">View Pre-Orders</a>
      
    </div>
    <div class="content">
        <h2>Orders</h2>

        <a class="Add-item" href=".../Admin_dashboard/add_order">Add order</a>
        <table>
            <tr>
                <th>ID</th>
                <th>User Id</th>
                <th>Total Price</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['total_price']; ?></td>
                    <td><?php echo $row['order_date']; ?></td>
                    <td>
                        <a class="Edit-delete" href="edit_order.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a class="Edit-delete" href="delete_order.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
