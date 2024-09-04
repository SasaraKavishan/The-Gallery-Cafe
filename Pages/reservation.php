<?php
session_start();
if (!isset($_SESSION['role'])) {
    header('Location: ../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation</title>
  <link rel="stylesheet" href="../CSS/Reservation.css">
</head>
<body>
  <header class="HRes">
          
    <h1 class="res">Reservation</h1>

  </header>
  <nav class="navBar">
  <?php if(!isset($_SESSION['userid'])) { ?>
    <a href="../login.php"> <button class="LOG-img">Login</button></a>
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

  <section>
    <div class="res-contain">
      <form action="action_page.php" method="post">
        <h3 class="res-title">Find a Table</h3>
        <label class="res-lable" for="People">How many people:</label><br>
        <select  name="reservation_people" id="res-name">
          <option value=""></option>
            <option value="1 person">1 person</option>
            <option value="2 people">2 people</option>
            <option value="3 people">3 people</option>
            <option value="4 people">4 people</option>
            <option value="5 people">5 people</option>
            <option value="6 people">6 people</option>
            <option value="7 people">7 people</option>
            <option value="8 people">8 people</option>
            <option value="9 people">9 people</option>
            <option value="10 people">10 people</option>
          
        </select>
        
        <label class="res-lable" for="date">Date:</label>
        <input  type="date" id="date" name="date" required>

        <label class="res-lable" for="time">Time:</label>
        <select name="reservation_time" id="res-name">
          <option value="" disabled></option>
          <option value="11:00">11:00 am</option>
          <option value="11:30">11:30 am</option>
          <option value="12:00">12:00 pm</option>
          <option value="12:30">12:30 pm</option>
          <option value="13:00">1:00 pm</option>
          <option value="13:30">1:30 pm</option>
          <option value="14:00">2:00 pm</option>
          <option value="14:30">2:30 pm</option>
          <option value="15:00">3:00 pm</option>
          <option value="15:30">3:30 pm</option>
          <option value="16:00">4:00 pm</option>
          <option value="16:30">4:30 pm</option>
          <option value="17:00">5:00 pm</option>
          <option value="17:30">5:30 pm</option>
          <option value="18:00">6:00 pm</option>
          <option value="18:30">6:30 pm</option>
          <option value="19:00">7:00 pm</option>
          <option value="19:30">7:30 pm</option>
          <option value="20:00">8:00 pm</option>
          <option value="20:30">8:30 pm</option>


        </select>

        
        <label class="res-lable" for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">
    
        <labelclass="res-lable" for="lname">Last Name</labelclass=>
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
  
        <label class="res-lable" for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your Email..">

        <label class="res-lable" for="Pnumber">Phone Number</label>
        <input type="text" id="Pnumber" name="Pnumber" placeholder="Your Phone Number..">

        <label class="res-lable" for="time">Select an option:</label>
        <select name="reservation_occasion" id="res-name">
          <option value=""></option>
          <option value="Birthday">Birthday</option>
          <option value="Anniversary">Anniversary</option>
          <option value="Date">Date</option>
          <option value="special Occasion">special Occasion</option>
          <option value="Business Meal">Business Meal</option>

        </select>
    
    
        <input type="submit" value="Submit">
      </form>
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