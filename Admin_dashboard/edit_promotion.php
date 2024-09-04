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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $discount = $_POST['discount'];

    $sql = "UPDATE promotions SET title = ?, description = ?, discount = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssdi", $title, $description, $discount, $id);
    mysqli_stmt_execute($stmt);

    header('Location: ../Admin_dashboard/manage_promotions.php');
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM promotions WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $promotion = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Promotion</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <div class="header">
        <h1>Edit Promotion</h1>
    </div>
    <div class="content">
        <form action="edit_promotion.php" method="post">
            <input type="hidden" name="id" value="<?php echo $promotion['id']; ?>">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?php echo $promotion['title']; ?>" required>

            <label for="description">Description:</label>
            <textarea name="description" id="description" required><?php echo $promotion['description']; ?></textarea>

            <label for="discount">Discount (%):</label>
            <input type="number" name="discount" id="discount" value="<?php echo $promotion['discount']; ?>" required min="0" max="100">

            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
