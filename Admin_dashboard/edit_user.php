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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $sql = "UPDATE users SET username='$username', email='$email', role='$role' WHERE id='$userId'";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../Admin_dashboard/manage_users.php');
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    $userId = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id='$userId'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <div class="header">
        <h1>Admin Dashboard - Edit User</h1>
    </div>
    <div class="sidebar">
        <a href="../Admin_dashboard/adnimdashboard.php">Dashboard Home</a>
        <a href="manage_users.php">Manage Users</a>
        <a href="manage_meals.php">Manage Meals</a>
        <a href="manage_reservations.php">Manage Reservations</a>
        <a href="manage_orders.php">Manage Orders</a>
        <a href="manage_events.php">Manage Special Events</a>
        <a href="manage_promotions.php">Manage Promotions</a>
        <a href="view_statistics.php">View Statistics</a>
    </div>
    <div class="content">
        <h2>Edit User</h2>
        <form method="post" action="edit_user.php">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>">
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>">
            <br>
            <label for="role">Role:</label>
            <select id="role" name="role">
                <option value="Admin" <?php if ($user['role'] == 'Admin') echo 'selected'; ?>>Admin</option>
                <option value="User" <?php if ($user['role'] == 'User') echo 'selected'; ?>>User</option>
            </select>
            <br>
            <input type="submit" value="Update User">
        </form>
    </div>
</body>
</html>
