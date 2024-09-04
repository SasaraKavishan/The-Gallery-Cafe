<?php
// Start the session
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "the_gallery_cafe";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, password_hash($_POST['password'], PASSWORD_DEFAULT));


    // Check if the email already exists
    $checkEmailSql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $checkEmailSql);

    if (mysqli_num_rows($result) > 0) {
        // If email exists, show error message and redirect to registration page
        echo "<script>alert('Error: This email is already registered.'); window.location.href = 'registration.php';</script>";
    } else {
        // If email does not exist, insert new user into the database
        $sql = "INSERT INTO users (firstname, lastname, username, email, password, role) VALUES ('$firstname', '$lastname', '$username', '$email', '$password', 'customer')";

        if (mysqli_query($conn, $sql)) {
            // If insertion is successful, show success message and redirect to login page
            echo "<script>alert('Registration successful!'); window.location.href = './login.php';</script>";
        } else {
            // If insertion fails, show error message and redirect to registration page
            echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href = 'registration.php';</script>";
        }
    }
}

// Close the database connection
mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./CSS/Register.css">
</head>

<body>
    <section class="login-form">
        <h2>Register</h2>
        <form action="" method="post"> <!-- Replace 'your_php_file.php' with the actual PHP file handling registration -->

            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required placeholder="First Name..">

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required placeholder="Last Name..">

            <label for="username">User Name:</label>
            <input type="text" id="username" name="username" required placeholder="User name..">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Your Email..">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Password..">

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm Password..">

            <button type="submit">Register</button> <br>

        </form>
    </section>
</body>

</html>
