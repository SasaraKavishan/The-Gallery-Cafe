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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute query to get user data
    $sql = "SELECT * FROM users WHERE username='$username' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['userid'] = $user['id'];

            // Redirect based on user type
            if ($user['role'] === 'Admin') {
                header('Location: ./index.php');
            } elseif ($user['role'] === 'Staff') {
                header('Location: ./index.php');
            } else {
                header('Location: ./User/profile.php');
            }
            exit();
        } else {
            echo "<script>alert('Invalid password.'); window.location.href = 'login.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid username or user type.'); window.location.href = 'login.php';</script>";
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./CSS/login.css">
</head>
<body>
  <section class="login-form">
    <h2> Login</h2>
    <form action="" method="post">
        
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Login</button>
      </form> 
      <br>
        <a href="./Register.php"><button type="submit">Sign in</button></a>
    
</section>
</body>
</html>