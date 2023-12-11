<?php
// Sesuaikan dengan koneksi ke database Anda
require_once "db_config-users.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data teks dari formulir atau dari mana pun yang sesuai dengan aplikasi Anda
    $text = $_POST["text"];

    // Lakukan penyimpanan data ke database
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Gunakan parameterized query untuk menghindari SQL injection
    $sql = "INSERT INTO history (text, timestamp) VALUES ('$text', NOW())";
    
   // $stmt = $conn->prepare($sql);

  //  if ($stmt) {
        // Bind parameter
    //    $stmt->bind_param("s", $text);

        // Execute statement
      //  $stmt->execute();

        // Cek hasil eksekusi
    if ($conn->query($sql) === TRUE) {
            echo "Data successfully saved to history.";
            echo '<script>window.location.href = "dashboard.html";</script>';
        } else {
            echo "Error: Unable to save data to history.";
        }

        // Tutup statement
       // $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    // Tutup koneksi
    $conn->close();

?>
