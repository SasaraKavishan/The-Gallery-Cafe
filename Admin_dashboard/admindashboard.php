<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    header('Location: ../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>

<body>
    <header>
        <div class="header">
            <h1>Admin Dashboard - The Gallery Cafe</h1>
        </div>
    </header>
    <nav class="navBar">
        <a href="../index.php"> <button class="LOGOUT-img">Logout</button></a>
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
        <a href="manage_users.php">Manage Users</a>
        <a href="manage_meals.php">Manage Meals</a>
        <a href="manage_reservations.php">Manage Reservations</a>
        <a href="manage_orders.php">Manage Orders</a>
        <a href="manage_events.php">Manage Special Events</a>
        <a href="manage_promotions.php">Manage Promotions</a>
        <a href="view_statistics.php">View Statistics</a>
    </div>
    <div class="content">
        <h2>Welcome to the Admin Dashboard</h2>
        <p>Use the sidebar to navigate through different management sections.</p>
    </div>
</body>

</html>