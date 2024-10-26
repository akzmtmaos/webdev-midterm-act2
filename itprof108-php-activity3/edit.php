<?php
include 'dbconnect.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$sql = "SELECT * FROM students WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $student = $result->fetch_assoc();
} else {
    echo "No student found with that ID.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    $sql = "UPDATE students SET first_name='$first_name', last_name='$last_name', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Edit Student</h2>
    <form action="" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?php echo htmlspecialchars($student['first_name']); ?>" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="<?php echo htmlspecialchars($student['last_name']); ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($student['email']); ?>" required><br><br>

        <input type="submit" value="Update Student">
    </form>
    <a href="index.php">Back to Students List</a>
</body>
</html>
