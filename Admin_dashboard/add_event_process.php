<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
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

$event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
$event_description = mysqli_real_escape_string($conn, $_POST['event_description']);
$event_date = mysqli_real_escape_string($conn, $_POST['event_date']);
$event_image = $_FILES['event_image']['tmp_name'];

if ($event_image) {
    $event_image_data = addslashes(file_get_contents($event_image));
} else {
    $event_image_data = NULL;
}

$sql = "INSERT INTO events (event_name, event_description, event_date, event_image) 
        VALUES ('$event_name', '$event_description', '$event_date', '$event_image_data')";

if (mysqli_query($conn, $sql)) {
    header('Location: ../Admin_dashboard/manage_events.php');
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
