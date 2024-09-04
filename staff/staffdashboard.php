<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Staff') {
    header('Location: ../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <header>
    <div class="header">
        <h1>Staff Dashboard - The Gallery Cafe</h1>
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
        <a href="staffdashboard.php">Dashboard Home</a>
        <a href="view_reservation.php">View Reservation</a>
        <a href="view_pre-orders.php">View Pre-Orders</a>
      
    </div>
    <div class="content">
        <h2>Welcome to the Staff Dashboard</h2>
        <p>Use the sidebar to navigate through different management sections.</p>
    </div>
</body>
</html>
