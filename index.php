<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
</head>
<body>
    <h2>Users</h2>
    <a href="create.php">Add New User</a><br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>

        <?php
        include 'db.php';
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['created_at'] . "</td>
                        <td>
                            <a href='update.php?id=" . $row['id'] . "'>Edit</a> |
                            <a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure?')\">Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No users found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
