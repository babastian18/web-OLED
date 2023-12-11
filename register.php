<?php
// Handle user registration logic here
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $division = $_POST["division"];

    // Validate password match
    if ($password !== $confirmPassword) {
        echo "Password and Confirm Password do not match.";
        exit();
    }

    // Hash the password before storing it in the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Perform database insertion (similar to login.php)
    require_once "db_config-users.php";

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (username, password, division) VALUES ('$username', '$hashedPassword', '$division')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. You can now <a href='login.html'>login</a>.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
