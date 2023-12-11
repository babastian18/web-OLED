<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan validasi login (sesuai dengan implementasi Anda)
    // Misalnya, Anda dapat memeriksa password dari database
    $storedPassword = getPasswordFromDatabase($username);

    if ($storedPassword && password_verify($password, $storedPassword)) {
        // Jika login berhasil, set sesi dan redirect ke dashboard
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = 
        header('Location: dashboard.html');
        exit();
    } else {
        // Jika login gagal, tampilkan pesan kesalahan
        echo "Login failed. Please check your username and password.";
    }
}

function getPasswordFromDatabase($username) {
    // Fungsi ini harus mengembalikan password yang disimpan dari database berdasarkan $username
    // Implementasikan sesuai dengan struktur dan cara penyimpanan data Anda
    require_once "db_config-users.php";

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($storedPassword);
    $stmt->fetch();
    $stmt->close();

    $conn->close();

    return $storedPassword;
}

// login.php
// Setelah Anda memeriksa kecocokan username dan password dari database
if ($result->num_rows == 1) {
    // Login berhasil
    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row['id'];
    // Redirect atau tindakan lain setelah login berhasil
}

?>
