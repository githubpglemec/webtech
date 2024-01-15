<!-- delete.php -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete record
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM user_records WHERE id=$id";
    $conn->query($sql);
}

// Close the database connection
$conn->close();

// Redirect back to the form page
header("Location: form.php");
exit();
?>
