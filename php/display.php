<!-- display.php -->

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

// Display records
$sql = "SELECT * FROM user_records";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
             <tr>
                 <th>Name</th>
                 <th>Email</th>
                 <th>Age</th>
                 <th>Actions</th>
             </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                 <td>{$row['name']}</td>
                 <td>{$row['email']}</td>
                 <td>{$row['age']}</td>
                 <td>
                     <a href='delete.php?id={$row['id']}'>Delete</a>
                     <a href='update.php?id={$row['id']}'>Update</a>
                 </td>
             </tr>";
    }

    echo "</table>";
} else {
    echo "No records found";
}

// Close the database connection
$conn->close();
?>
