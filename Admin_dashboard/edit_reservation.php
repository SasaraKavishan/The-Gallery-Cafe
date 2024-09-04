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

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $full_name = $first_name . ' '. $last_name;
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $num_people = $_POST['people_count'];

    $sql = "UPDATE reservations SET first_name = '$first_name',last_name = '$last_name', date = '$date', time = '$time', people_count = '$num_people' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql); 

    header('Location: ../Admin_dashboard/manage_reservations.php');
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM reservations WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$reservation = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservation</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <div class="header">
        <h1>Edit Reservation</h1>
    </div>
    <div class="content">
        <form action="edit_reservation.php" method="post">
            <input type="hidden" name="id" value="<?php echo $reservation['id']; ?>">
            <label for="first_name">First Name:</label>
            <input type="text" name="firstname" id="first_name" value="<?php echo $reservation['first_name']; ?>" required>

            <label for="last_name">Last Name:</label>
            <input type="text" name="lastname" id="last_name" value="<?php echo $reservation['last_name']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $reservation['email']; ?>" required>

            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" id="phone_number" value="<?php echo $reservation['phone_number']; ?>" required>


            <label for="date">Date:</label>
            <input type="date" name="date" id="date" value="<?php echo $reservation['date']; ?>" required>

            <label for="time">Time:</label>
            <input type="time" name="time" id="time" value="<?php echo $reservation['time']; ?>" required>

            <label for="people_count">Number of People:</label>
            <input type="number" name="people_count" id="people_count" value="<?php echo $reservation['people_count']; ?>" required>

            <input type="submit" name="submit" value="Update Reservation">
        </form>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
