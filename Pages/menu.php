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

$sql = "SELECT DISTINCT cuisine FROM meals";
$cuisine_result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../CSS/menu.css">
</head>
<body>
<header class="HMenu">
          
          <h1 class="menu">Our Menu</h1>
      
        </header>
        <nav class="navBar">
        <?php if(!isset($_SESSION['userid'])) { ?>
    <a href="../login.php"> <button class="LOG-img">Login</button></a>
    <?php } ?>
        <a href="../cart/pre_order_cart.php"><img class="cart-img" src="../Image/cart 1.png" alt="cart"></a>
          <ul class="nav">
            <li><a class="link" href="../index.php">Home</a></li>
            <li><a class="link" href="../Pages/menu.php">Menu</a></li>
            <li><a class="link" href="../Pages/event.php">Events </a></li>
            <li><a class="link" href="../Pages/promotion.php">Promotions </a></li>
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
      
    <div class="menu-container">
        
        <?php while ($cuisine_row = mysqli_fetch_assoc($cuisine_result)) { 
            $cuisine = $cuisine_row['cuisine'];
            $meal_sql = "SELECT * FROM meals WHERE cuisine = '$cuisine'";
            $meal_result = mysqli_query($conn, $meal_sql);
        ?>
        <div class="cuisine-section">
            <h2><?php echo $cuisine; ?></h2>
            <div class="meals">
                <?php while ($meal_row = mysqli_fetch_assoc($meal_result)) { ?>
                    <div class="meal-item">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($meal_row['image']); ?>" alt="<?php echo $meal_row['name']; ?>" width="100">
                        <h3><?php echo $meal_row['name']; ?></h3>
                        <p><?php echo $meal_row['description']; ?></p>
                        <p>Price: $<?php echo $meal_row['price']; ?></p>
                        <form action="../cart/add_to_cart.php" method="post">
                            <input type="hidden" name="meal_id" value="<?php echo $meal_row['id']; ?>">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity" value="1" min="1" required>
                            <button class="menu-addcartbutton" type="submit">Add to Cart</button>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>

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
      <a href="../about.php"><p class="p1">About</p></a>
      <a href="../Privacy.php"><p class="p1">Privacy Policy Information </p></a>
    </div>

    <div class="social-media">
    <a href="https://www.instagram.com/the_gallery_cafe_colombo?igsh=MTBqc2lmZTg4aGpmOA=="><img class="int" src="../Image/insta3.png" alt="insta logo"> </a><br>
    <a href=""> <img class="int" src="../Image/fb2.png" alt=""></a>

    </div>
  </footer>
</body>
</html>

<?php
mysqli_close($conn);
?>
