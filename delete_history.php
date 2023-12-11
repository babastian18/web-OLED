<!-- File: delete_history.php -->
<?php

require_once "db_config-users.php"; // Ubah sesuai dengan path yang benar

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteHistory'])) {
    // Periksa apakah timestamp dikirim dari formulir
    $timestamp = $_POST['timestamp'];

    // Koneksi ke database dan jalankan penghapusan
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Hindari SQL Injection
    $timestamp = mysqli_real_escape_string($connection, $timestamp);

    // SQL untuk menghapus entri histori berdasarkan timestamp
    $deleteHistorySQL = "DELETE FROM history WHERE timestamp = '$timestamp'";

    // Jalankan query penghapusan
    $result = mysqli_query($connection, $deleteHistorySQL);

    // Tutup koneksi database
    mysqli_close($connection);

    // Periksa apakah penghapusan berhasil
    if ($result) {
        echo "History entry deleted successfully.";
    } else {
        echo "Error deleting history entry. Please try again.";
    }
} else {
    echo "Invalid request method or missing parameters.";
}
?>
