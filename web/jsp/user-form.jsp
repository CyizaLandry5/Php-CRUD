<%@page contentType="text/html" pageEncoding="UTF-8"%>
<html>
<head>
    <title>User Form</title>
</head>
<body>
    <h2>${user == null ? "Add New User" : "Edit User"}</h2>
    <form action="${user == null ? 'insert' : 'update'}" method="post">
        <input type="hidden" name="id" value="${user != null ? user.getId() : ''}" />
        <label for="name">Name:</label><br>
        <input type="text" name="name" value="${user != null ? user.getName() : ''}" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" name="email" value="${user != null ? user.getEmail() : ''}" required><br><br>
        <button type="submit">${user == null ? "Add User" : "Update User"}</button>
    </form>
</body>
</html>
