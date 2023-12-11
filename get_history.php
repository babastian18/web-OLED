<!-- File: get_history.php -->

<?php

// Sesuaikan dengan koneksi ke database Anda
require_once "db_config-users.php";

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM history"; // Sesuaikan dengan nama tabel yang sesuai

$result = $conn->query($sql);

$historyData = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $historyData[] = $row;
    }
}

$conn->close();


?>
