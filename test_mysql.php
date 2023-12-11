<?php
$servername = "localhost"; 
$password = ""; 
$username = "root"; 
$dbname = "db_app"; 

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi MySQL gagal: " . $conn->connect_error);
}   

echo "Koneksi MySQL berhasil!";
$conn->close();
?>
