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

// Get total number of users
$user_count_sql = "SELECT COUNT(*) AS user_count FROM users";
$user_count_result = mysqli_query($conn, $user_count_sql);
$user_count = mysqli_fetch_assoc($user_count_result)['user_count'];

// Get total number of meals
$meal_count_sql = "SELECT COUNT(*) AS meal_count FROM meals";
$meal_count_result = mysqli_query($conn, $meal_count_sql);
$meal_count = mysqli_fetch_assoc($meal_count_result)['meal_count'];

// Get total number of reservations
$reservation_count_sql = "SELECT COUNT(*) AS reservation_count FROM reservations";
$reservation_count_result = mysqli_query($conn, $reservation_count_sql);
$reservation_count = mysqli_fetch_assoc($reservation_count_result)['reservation_count'];

// Get total number of orders
$order_count_sql = "SELECT COUNT(*) AS order_count FROM orders";
$order_count_result = mysqli_query($conn, $order_count_sql);
$order_count = mysqli_fetch_assoc($order_count_result)['order_count'];

// Get total number of events
$event_count_sql = "SELECT COUNT(*) AS event_count FROM events";
$event_count_result = mysqli_query($conn, $event_count_sql);
$event_count = mysqli_fetch_assoc($event_count_result)['event_count'];

// Get total number of promotions
$promotion_count_sql = "SELECT COUNT(*) AS promotion_count FROM promotions";
$promotion_count_result = mysqli_query($conn, $promotion_count_sql);
$promotion_count = mysqli_fetch_assoc($promotion_count_result)['promotion_count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Statistics</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <header>
    <div class="header">
        <h1>Admin Dashboard - View Statistics</h1>
    </div>
    </header>

    <nav class="navBar">
    <a href="../logout.php"> <button class="LOGOUT-img">Logout</button></a>
          <ul class="nav">
            <li><a class="link" href="../index.php">Home</a></li>
            <li><a class="link" href="../Pages/menu.php">Menu</a></li>
            <li><a class="link" href="../Pages/event.php">Events </a></li>
            <li><a class="link" href="../Pages/promotion.php">Promotions </a></li>
                        <li><a class="link" href="../Pages/reservation.php">Reservation</a></li>
            <li><a class="link" href="../Pages/contact.php">phpontact</a></li>
            <li><a class="link" href="../about.php">About</a></li>
          </ul>
        </nav>

    <div class="sidebar">
        <a href="../Admin_dashboard/admindashboard.php">Dashboard Home</a>
        <a href="../Admin_dashboard/manage_users.php">Manage Users</a>
        <a href="../Admin_dashboard/manage_meals.php">Manage Meals</a>
        <a href="../Admin_dashboard/manage_reservations.php">Manage Reservations</a>
        <a href="../Admin_dashboard/manage_orders.php">Manage Orders</a>
        <a href="../Admin_dashboard/manage_events.php">Manage Special Events</a>
        <a href="../Admin_dashboard/manage_promotions.php">Manage Promotions</a>
        <a href="../Admin_dashboard/view_statistics.php">View Statistics</a>
    </div>
    <div class="content">
        <h2>Statistics</h2>
        <table>
            <tr>
                <th>Statistic</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Total Users</td>
                <td><?php echo $user_count; ?></td>
            </tr>
            <tr>
                <td>Total Meals</td>
                <td><?php echo $meal_count; ?></td>
            </tr>
            <tr>
                <td>Total Reservations</td>
                <td><?php echo $reservation_count; ?></td>
            </tr>
            <tr>
                <td>Total Orders</td>
                <td><?php echo $order_count; ?></td>
            </tr>
            <tr>
                <td>Total Events</td>
                <td><?php echo $event_count; ?></td>
            </tr>
            <tr>
                <td>Total Promotions</td>
                <td><?php echo $promotion_count; ?></td>
            </tr>
        </table>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
