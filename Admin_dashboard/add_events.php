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
    <title>Add Event</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <div class="header">
        <h1>Admin Dashboard - Add Event</h1>
    </div>

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
        
    <div class="sidebar">
        <a href="admindashboard.php">Dashboard Home</a>
        <a href="manage_events.php">Manage Events</a>
        <a href="add_event.php">Add Event</a>
    </div>
    <div class="content">
        <h2>Add New Event</h2>
        <form class="addcss" action="add_event_process.php" method="post" enctype="multipart/form-data">
            <label class="addlabel" for="event_name">Event Name:</label>
            <input type="text" id="event_name" name="event_name" required><br>

            <label class="addlabel" for="event_description">Event Description:</label>
            <textarea id="event_description" name="event_description" required></textarea><br>

            <label class="addlabel" for="event_date">Event Date:</label>
            <input type="date" id="event_date" name="event_date" required><br>

            <labe class="addlabel" for="event_image">Event Image:</labe>
            <input type="file" id="event_image" name="event_image" accept="image/*" required><br>

            <button type="submit">Add Event</button>
        </form>
    </div>
</body>
</html>
