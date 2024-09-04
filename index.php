<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Gallery Café</title>
  <link rel="stylesheet" href="CSS/style.css" />
</head>

<body>
  <nav class="navBar">
    <?php if (!isset($_SESSION['userid'])) { ?>
      <a href="./login.php"> <button class="LOG-img">Login</button></a>
    <?php } ?>
    <?php if (isset($_SESSION['userid'])) { ?>
      <a href="./logout.php"> <button class="LOGOUT-img">Logout</button></a>
    <?php } ?>
    <a href="./cart/pre_order_cart.php"><img class="cart-img" src="./Image/cart 1.png" alt="cart"></a>
    <ul class="nav">
      <li><a class="link" href="./index.php">Home</a></li>
      <li><a class="link" href="./Pages/menu.php">Menu</a></li>
      <li><a class="link" href="./Pages/event.php">Events </a></li>
      <li><a class="link" href="./Pages/promotion.php">Promotions </a></li>
      <li><a class="link" href="./Pages/reservation.php">Reservation</a></li>
      <li><a class="link" href="./Pages/contact.php">Contact</a></li>
      <li><a class="link" href="./about.php">About</a></li>
      <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Admin'): ?>
        <li><a class="link" href="./Admin_dashboard/admindashboard.php">Admin Dashboard</a></li>
      <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'Staff'): ?>
        <li><a class="link" href="./staff/staffdashboard.php">Staff Dashboard</a></li>
      <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'Customar'): ?>
        <li><a class="link" href="./User/profile.php">User Profile</a></li>
      <?php endif; ?>

    </ul>
  </nav>
  <header>
    <div class="hero-content">
      <h1 class="topic">The Gallery Café</h1>
      <p class="slogan">Where Every Meal is a Masterpiece</p>
      <img class="logo-maincafe" src="./Image/logo3" alt="Logo">

    </div>
  </header>




  <main>
    <!-- Content of your main section -->



  </main>
  <footer>
    <div id="new">
      <img class="logo" src="Image/logo3.png" alt="logo">
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
          class="int" src="./Image/insta3.png" alt="insta logo">
      </a><br>
      <a href=""> <img class="int" src="./Image/fb2.png" alt=""></a>

    </div>
  </footer>
</body>

</html>