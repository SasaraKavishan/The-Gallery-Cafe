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

$meal_name = mysqli_real_escape_string($conn, $_POST['meal_name']);
$meal_description = mysqli_real_escape_string($conn, $_POST['meal_description']);
$meal_price = mysqli_real_escape_string($conn, $_POST['meal_price']);
$meal_cuisine = mysqli_real_escape_string($conn, $_POST['meal_cuisine']);
$meal_image = $_FILES['meal_image']['tmp_name'];

if ($meal_image) {
    $meal_image_data = addslashes(file_get_contents($meal_image));
} else {
    $meal_image_data = NULL;
}

$sql = "INSERT INTO meals (name, description, price, image, cuisine) 
        VALUES ('$meal_name', '$meal_description', '$meal_price', '$meal_image_data', '$meal_cuisine')";

if (mysqli_query($conn, $sql)) {
    header('Location: ../Admin_dashboard/manage_meals.php');
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
