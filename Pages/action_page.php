<?php
// Start session if needed
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "the_gallery_cafe";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Capture form data
$first_name = mysqli_real_escape_string($conn, $_POST['firstname']);
$last_name = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone_number = mysqli_real_escape_string($conn, $_POST['Pnumber']);
$people_count = mysqli_real_escape_string($conn, $_POST['reservation_people']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$time = mysqli_real_escape_string($conn, $_POST['reservation_time']);
$occasion = mysqli_real_escape_string($conn, $_POST['reservation_occasion']);

// Insert reservation into the database
$sql = "INSERT INTO reservations (first_name, last_name, email, phone_number, people_count, date, time, occasion)
VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$people_count', '$date', '$time', '$occasion')";

if (mysqli_query($conn, $sql)) {
    echo "Reservation created successfully!";
    header("Location: ../Pages/reservation_completed.php?success=1");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
