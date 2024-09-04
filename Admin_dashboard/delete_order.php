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

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // Delete order items related to the order
    $sql = "DELETE FROM order_items WHERE order_id='$order_id'";
    mysqli_query($conn, $sql);

    // Delete the order
    $sql = "DELETE FROM orders WHERE id='$order_id'";
    mysqli_query($conn, $sql);

    header('Location: ../Admin_dashboard/manage_orders.php');
}

mysqli_close($conn);
?>
