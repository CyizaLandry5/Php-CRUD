<%@page import="model.User"%>
<%@page import="java.util.List"%>
<html>
<head>
    <title>User List</title>
</head>
<body>
    <h2>Users</h2>
    <a href="new">Add New User</a><br><br>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <c:forEach var="user" items="${listUser}">
            <tr>
                <td>${user.getId()}</td>
                <td>${user.getName()}</td>
                <td>${user.getEmail()}</td>
                <td>
                    <a href="edit?id=${user.getId()}">Edit</a> |
                    <a href="delete?id=${user.getId()}" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        </c:forEach>
    </table>
</body>
</html>
