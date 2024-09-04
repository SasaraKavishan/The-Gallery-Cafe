<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/about.css">
</head>
<body>
  <header class="HAbout">
          
    <h1 class="About-h">About</h1>

  </header>

    <nav class="navBar">
    <?php if(!isset($_SESSION['userid'])) { ?>
    <a href="./login.php"> <button class="LOG-img">Login</button></a>
    <?php } ?>
        <ul class="nav">
          <li><a class="link" href="./index.php">Home</a></li>
          <li><a class="link" href="./Pages/menu.php">Menu</a></li>
          <li><a class="link" href="./Pages/event.php">Events </a></li>
          <li><a class="link" href="./Pages/promotion.php">Promotions </a></li>
                    <li><a class="link" href="./Pages/reservation.php">Reservation</a></li>
          <li><a class="link" href="./Pages/contact.php">Contact</a></li>
          <li><a class="link" href="./about.php">About</a></li>
          <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') : ?>
      <li><a class="link" href="./Admin_dashboard/admindashboard.php">Admin Dashboard</a></li>
      <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'Staff') : ?>
        <li><a class="link" href="./staff/staffdashboard.php">Staff Dashboard</a></li>
        <?php endif ; ?>
        </ul>
      </nav>

      <section>
        <div>
          <h3 class="about-h3">Welcome to The Gallery Café</h3>
          <p class="about-pp">At The Gallery Café, we blend the charm of fine dining with the vibrancy of contemporary art, creating an atmosphere where every meal is a masterpiece. Located in the heart of Colombo, our restaurant offers a unique experience where culinary artistry meets cultural expression.</p>

          <h3 class="about-h3">Our Story</h3>
          <p class="about-pp">Founded with a passion for both food and art, The Gallery Café has become a beloved spot for locals and visitors alike. Our journey began with the vision of transforming dining into an immersive experience. We’ve transformed an old art gallery into a space where the walls are adorned with rotating exhibitions by local and international artists, and the plates are canvases for our chefs’ culinary creativity.</p>

          <h3 class="about-h3">Our Culinary Philosophy</h3>
          <p class="about-pp">At The Gallery Café, we believe in using the finest, freshest ingredients to craft dishes that are as visually stunning as they are delicious. Our menu is a carefully curated selection of global cuisines, featuring Sri Lankan, Chinese, Italian, and more, each dish prepared with the highest attention to detail. Whether you're savoring a traditional Sri Lankan curry or indulging in an Italian pasta, every bite is designed to delight.</p>

          <h3 class="about-h3">Our Team</h3>
          <p class="about-pp">Our team is a family of passionate chefs, dedicated service staff, and creative minds, all committed to providing you with an unforgettable dining experience. From the moment you walk through our doors, you’ll be greeted with warmth and treated to impeccable service. We believe in going above and beyond to make every visit special.</p>

          <h3 class="about-h3">Experience the Art of Dining</h3>
          <p class="about-pp">Dining at The Gallery Café is more than just a meal; it’s an experience. Whether you’re enjoying a quiet dinner for two, celebrating a special occasion, or attending one of our curated events, we invite you to explore the intersection of food, art, and culture.</p>

          <h3 class="about-h3">Our Commitment</h3>
          <p class="about-pp">We are committed to sustainability and responsible sourcing. Our ingredients are carefully selected from local farmers and trusted suppliers, ensuring that every dish is not only delicious but also ethically made. We take pride in supporting the community and contributing to the preservation of our environment.</p>

          <h3 class="about-h3">Join Us</h3>
          <p class="about-pp">We invite you to join us at The Gallery Café for an experience that transcends the ordinary. Explore our menu, reserve a table for your next special occasion, or attend one of our exclusive events. Whether you’re here for a casual meal or a grand celebration, we promise an experience that will leave you inspired. </p>

          <p class="about-pp">Thank you for being a part of our story. We look forward to welcoming you to The Gallery Café, where every meal is a masterpiece. </p>





        </div>
      </section>

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
      <a href="./about.php"><p class="p1">About</p></a>
      <a href="./Privacy.php"><p class="p1">Privacy Policy Information </p></a>
    </div>

    <div class="social-media">
    <a href="https://www.instagram.com/the_gallery_cafe_colombo?igsh=MTBqc2lmZTg4aGpmOA=="><img class="int" src="./Image/insta3.png" alt="insta logo"> </a><br>
    <a href=""> <img class="int" src="./Image/fb2.png" alt=""></a>

    </div>
  </footer>
</body>
</html>