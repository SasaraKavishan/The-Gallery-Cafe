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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $discount = $_POST['discount'];

    $sql = "INSERT INTO promotions (title, description, discount) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssd", $title, $description, $discount);
    mysqli_stmt_execute($stmt);

    header('Location: ../Admin_dashboard/manage_promotions.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Promotion</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <div class="header">
        <h1>Add New Promotion</h1>
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

        
    <div class="content">
        <form class="addcss" action="add_promotion.php" method="post">
            <label class="addlabel" for="title">Title:</label>
            <input type="text" name="title" id="title" required>

            <label class="addlabel" for="description">Description:</label>
            <textarea name="description" id="description" required></textarea>

            <label class="addlabel" for="discount">Discount (%):</label>
            <input type="number" name="discount" id="discount" required min="0" max="100">

            <button type="submit">Add Promotion</button>
        </form>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
