<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>

    <?php
    include 'db.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "No user found with ID $id";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('Location: index.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }
    ?>

    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label><br>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
        <button type="submit">Update User</button>
    </form>
</body>
</html>
