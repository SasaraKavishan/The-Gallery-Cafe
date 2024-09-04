<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Completed</title>
    <link rel="stylesheet" href="../CSS/cart.css">
</head>

<body class="body-ccp">

    <header class="HRes">

    </header>

    <nav class="navBar">
        <ul class="nav">
            <li><a class="link" href="../index.php">Home</a></li>
            <li><a class="link" href="../Pages/menu.php">Menu</a></li>
            <li><a class="link" href="../Pages/event.php">Events </a></li>
            <li><a class="link" href="../Pages/promotion.php">Promotions </a></li>
            <li><a class="link" href="../Pages/reservation.php">Reservation</a></li>
            <li><a class="link" href="../Pages/contact.php">Contact</a></li>
            <li><a class="link" href="../about.php">About</a></li>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Admin'): ?>
                <li><a class="link" href="../Admin_dashboard/admindashboard.php">Admin Dashboard</a></li>
            <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'Staff'): ?>
                <li><a class="link" href="../staff/staffdashboard.php">Staff Dashboard</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <section class="confirmation-message">
        <h2 class="order-con-h2">Thank You for Your Order!</h2>
        <p class="order-con-p">Your order has been successfully placed. </p>
        <p class="order-con-p">If you have any questions about your order,feel free to contact us</p>
        <a class="contact-order" href="../Pages/contact.php">contact us</a>.
        <a class="contact-order" href="../index.php" class="btn">Back to Home</a>
    </section>
</body>

</html>