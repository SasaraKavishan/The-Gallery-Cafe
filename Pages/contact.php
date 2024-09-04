<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  <link rel="stylesheet" href="../CSS/Contact.css">
</head>
<body>
  <header class="HCon">
          
    <h1 class="con">Contact</h1>

  </header>
  <nav class="navBar">
  <?php if(!isset($_SESSION['userid'])) { ?>
    <a href="./login.php"> <button class="LOG-img">Login</button></a>
    <?php } ?>
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
  
 

  <iframe class="Gmap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9316164507864!2d79.85229191076606!3d6.8987823186593324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae259602cb3bc09%3A0x677419394138f674!2sThe%20Gallery%20Caf%C3%A9!5e0!3m2!1sen!2slk!4v1723131134960!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

  <br>
  <section>
  <div class="container">
    <form action="/action_page.php">
      <h3 class="con-head">Connect with us</h3>
      <label for="fname">First Name</label>
      <input type="text" id="fname" name="firstname" placeholder="Your name..">
  
      <label for="lname">Last Name</label>
      <input type="text" id="lname" name="lastname" placeholder="Your last name..">

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Your Email..">
  
      <label for="subject">Subject</label>
      <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
  
      <input type="submit" value="Submit">
    </form>
  </div>
</section>

<div>
  <img class="con-img" src="../Image/contact1.png" alt="contact us">
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