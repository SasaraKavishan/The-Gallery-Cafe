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
    <title>Add User</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>

<body>
    <div class="header">
        <h1>Admin Dashboard - Add User</h1>
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
        <a href="manage_users.php">Manage Users</a>
        <a href="add_user.php">Add User</a>
    </div>
    <div class="content">
        <h2>Add New User</h2>
        <form class="addcss" action="add_user_process.php" method="post">

            <label class="addlabel" for="firstname">Firstname:</label>
            <input  type="text" id="firstname" name="firstname" required><br>

            <label class="addlabel" for="Lastname">Lastname:</label>
            <input type="text" id="Lastname" name="Lastname" required><br>

            <label class="addlabel" for="Lastname">Username:</label>
            <input type="text" id="username" name="username" required><br>


            <label class="addlabel" for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label class="addlabel" for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <label class="addlabel" for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="User">User</option>
                <option value="Admin">Admin</option>
                <option value="Staff">Staff</option>
            </select><br>

            <button type="submit">Add User</button>
        </form>
    </div>
</body>

</html>