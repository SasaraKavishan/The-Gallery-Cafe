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
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$Lastname = mysqli_real_escape_string($conn, $_POST['Lastname']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = password_hash(mysqli_real_escape_string($conn, $_POST['password']), PASSWORD_BCRYPT);
$role = mysqli_real_escape_string($conn, $_POST['role']);

$sql = "INSERT INTO users (firstname,Lastname,username, email, password, role) 
        VALUES ('$firstname','$Lastname','$username', '$email', '$password', '$role')";

if (mysqli_query($conn, $sql)) {
    header('Location: ../Admin_dashboard/manage_users.php');
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
