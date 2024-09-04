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
    $name = $_POST['name'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    $sql = "UPDATE events SET name = ?, date = ?, description = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $name, $date, $description, $id);
    mysqli_stmt_execute($stmt);

    header('Location: ../Admin_dashboard/manage_events.php');
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM events WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $event = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <div class="header">
        <h1>Edit Event</h1>
    </div>
    <div class="content">
        <form action="edit_events.php" method="post">
            <input type="hidden" name="id" value="<?php echo $event['id']; ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $event['name']; ?>" required>

            <label for="date">Date:</label>
            <input type="date" name="date" id="date" value="<?php echo $event['date']; ?>" required>

            <label for="description">Description:</label>
            <textarea name="description" id="description" required><?php echo $event['description']; ?></textarea>

            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
