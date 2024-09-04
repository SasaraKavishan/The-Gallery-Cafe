<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Customer') {
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

$user_id = $_SESSION['userid'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../CSS/user.css">
</head>
<body>

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
        
    <div class="profile-container">
        <h1>User Profile</h1>
        <div class="profile-card">
            
            <h2><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></h2>
            <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
            <p><strong>Role:</strong> <?php echo $user['role']; ?></p>
            <a href="edit_profile.php" class="edit-btn">Edit Profile</a>
        </div>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
