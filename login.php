<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="login">Username or Email:</label>
        <input type="text" id="login" name="login" required><br><br>
        
        <label for="passwd">Password:</label>
        <input type="password" id="passwd" name="passwd" required><br><br>
        
        <input type="submit" value="Login">
    </form>
    <br>
    <button onclick="window.location.href='register.php'">Register</button>
</body>
</html>
<?php
session_start();
include 'config.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $passwd = $_POST['passwd'];

    // Prepare and execute the query
    // Sanitize user input to prevent SQL injection
    $login = htmlspecialchars($login);
    $passwd = htmlspecialchars($passwd);
    $stmt = $conn->prepare("SELECT * FROM logins WHERE login = ? OR mail = ?");
    $stmt->bind_param("ss", $login, $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the row from the result set
        $row = $result->fetch_assoc();
        // Directly compare the provided password with the stored password
        if ($passwd === $row['passwd']) {
            // Password is correct, login successful
            $_SESSION['login'] = $login;
            header("Location: main.php");
            exit();
        } else {
            // Password is incorrect, login failed
            echo "<p>Invalid login credentials. Please try again.</p>";
        }
    } else {
        // No user found with the provided login
        echo "<p>Invalid login credentials. Please try again.</p>";
    }

    $stmt->close();
    $conn->close();
}

?>