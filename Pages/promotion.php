<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "the_gallery_cafe";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM promotions ORDER BY end_date ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotions - The Gallery Café</title>
    <link rel="stylesheet" href="../CSS/promotions.css">
</head>
<body>
    <header class="HSpe">
        <h1 class="spe">Current Promotions</h1>
    </header>
    <nav class="navBar">
        <ul class="nav">
        <?php if(!isset($_SESSION['userid'])) { ?>
    <a href="./login.php"> <button class="LOG-img">Login</button></a>
    <?php } ?>
            <li><a class="link" href="../index.php">Home</a></li>
            <li><a class="link" href="../Pages/menu.php">Menu</a></li>
            <li><a class="link" href="../Pages/event.php">Events </a></li>
            <li><a class="link" href="../Pages/promotion.php">Promotions </a></li>
            <li><a class="link" href="../Pages/reservation.php">Reservations</a></li>
            <li><a class="link" href="../Pages/contact.php">Contact Us</a></li>
            <li><a class="link" href="../about.php">About Us</a></li>
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') : ?>
            <li><a href="../Admin_dashboard/admindashboard.php">Admin Dashboard</a></li>
            <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'Staff') : ?>
                <li><a href="../staff/staffdashboard.php">Staff Dashboard</a></li>
            <?php endif ; ?>
        </ul>
    </nav>
    <section>
        <div class="promotions-container">
            <?php if (mysqli_num_rows($result) > 0) : ?>
                <?php while($row = mysqli_fetch_assoc($result)) : ?>
                    <div class="promotion-item">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" alt="<?php echo $row['title']; ?>" width="400" >
                        <h2 class="promoTitle"><?php echo htmlspecialchars($row['title']); ?></h2>
                        <p class="promoPD"><?php echo htmlspecialchars($row['description']); ?></p>
                        <p><?php echo htmlspecialchars($row['discount']); ?></p>
                        <p><strong>Valid Until:</strong> <?php echo htmlspecialchars($row['start_date']); ?></p>
                        <p><strong>Valid Until:</strong> <?php echo htmlspecialchars($row['end_date']); ?></p>
                        
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p>No current promotions available. Please check back later!</p>
            <?php endif; ?>
        </div>
    </section>

    <footer>
    <div id="new">
      <img class="logo" src="../Image/logo3.png" alt="logo">
      <div class="contact-info">
        <p class="p">Phone: 0112582162</p>
        <p class="p">Email: thegallerycafe@gmail.com</p>
        <p class="p">Address: 2 Alfred House Rd, Colombo 00300</p>
      </div>


    </div>
    <div>
      <a href="./about.php">
        <p class="p1">About</p>
      </a>
      <a href="./Privacy.php">
        <p class="p1">Privacy Policy Information </p>
      </a>
    </div>

    <div class="social-media">
      <a href="https://www.instagram.com/the_gallery_cafe_colombo?igsh=MTBqc2lmZTg4aGpmOA==" target="_blank"><img
          class="int" src="../Image/insta3.png" alt="insta logo">
      </a><br>
      <a href=""> <img class="int" src="../Image/fb2.png" alt=""></a>

    </div>
  </footer>
</body>
</html>

<?php
mysqli_close($conn);
?>
