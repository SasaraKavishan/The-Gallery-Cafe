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

$sql = "SELECT * FROM meals";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Meals</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <header>
    <div class="header">
        <h1>Admin Dashboard - Manage Meals</h1>
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
            <li><a class="link" href="../Pages/contact.php">Contact</a></li>
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
        <h2>Meals</h2>
        <a class="Add-item" href="../Admin_dashboard/add_meal">Add meals</a>
        <table>
        <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price</th>
                <th>Cuisine</th>
                
                <th>Actions</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" alt="<?php echo $row['name']; ?>" width="100"></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['cuisine']; ?></td>
                    
                    <td>
                        <a class="Edit-delete" href="edit_meal.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a class="Edit-delete" href="delete_meal.php?id=<?php echo $row['id']; ?>">Delete</a>
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
