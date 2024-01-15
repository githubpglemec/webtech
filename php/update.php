<!-- update.php -->
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

// Fetch existing data based on the provided ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM user_records WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $age = $row['age'];
    } else {
        echo "Record not found.";
        exit();
    }
} else {
    echo "ID not provided.";
    exit();
}

// Handle form submission for updating
if (isset($_POST['update'])) {
    $newName = $_POST['newName'];
    $newEmail = $_POST['newEmail'];
    $newAge = $_POST['newAge'];

    $updateSql = "UPDATE user_records SET name='$newName', email='$newEmail', age='$newAge' WHERE id=$id";

    if ($conn->query($updateSql) === TRUE) {
        echo "Record updated successfully!";
        // Redirect to display page after updating
        header("Location: display.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
</head>

<body>
    <h2>Update Record</h2>
    <form method="post">
        <label for="newName">Name:</label>
        <input type="text" name="newName" value="<?php echo $name; ?>" required>
        <br>

        <label for="newEmail">Email:</label>
        <input type="email" name="newEmail" value="<?php echo $email; ?>" required>
        <br>

        <label for="newAge">Age:</label>
        <input type="number" name="newAge" value="<?php echo $age; ?>" required>
        <br>

        <button type="submit" name="update">Update</button>
    </form>
</body>

</html>
