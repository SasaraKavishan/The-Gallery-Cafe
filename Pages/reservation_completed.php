<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Completed</title>
    <link rel="stylesheet" href="../CSS/Reservation.css">
</head>
<body>
    <header class="HRes">
        <h1 class="res">Reservation Completed</h1>
    </header>
    
    <nav class="navBar">
        <ul class="nav">
            <li><a class="link" href="../index.php">Home</a></li>
            <li><a class="link" href="../Pages/menu.php">Menu</a></li>
            <li><a class="link" href="../Pages/specials.php">Events and Promotion</a></li>
            <li><a class="link" href="../Pages/reservation.php">Reservation</a></li>
            <li><a class="link" href="../Pages/contact.php">Contact</a></li>
            <li><a class="link" href="../about.php">About</a></li>
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') : ?>
            <li><a class="link" href="../Admin_dashboard/admindashboard.php">Admin Dashboard</a></li>
            <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'Staff') : ?>
                <li><a class="link" href="../staff/staffdashboard.php">Staff Dashboard</a></li>
            <?php endif ; ?>
        </ul>
    </nav>

    <section class="confirmation-message">
        <h2>Thank You for Your Reservation!</h2>
        <p>Your reservation has been successfully completed. We look forward to serving you.</p>
        <p>If you have any questions, feel free to <a href="../Pages/contact.php">contact us</a>.</p>
        <a href="../index.php" class="btn">Back to Home</a>
    </section>
</body>
</html>
