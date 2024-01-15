<!-- form.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
</head>

<body>
    <h2>User Registration Form</h2>
    <form action="process.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>

        <label for="age">Age:</label>
        <input type="number" name="age" required>
        <br>

        <button type="submit" name="submit">Register</button>
    </form>

    <hr>

    <h2>User Records</h2>
    <ul>
        <?php include 'display.php'; ?>
    </ul>
</body>

</html>
