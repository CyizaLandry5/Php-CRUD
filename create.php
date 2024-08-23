<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
</head>
<body>
    <h2>Add New User</h2>
    <form action="create.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="name" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br><br>
        <button type="submit">Add User</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include 'db.php';
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>
</html>
