<!-- File: history.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IoT Dashboard</title>
    <link rel="stylesheet" href="history.css">
</head>
<body>
    <header>
        <div class="logo">OLED Display Controller</div>
        <nav>
            <ul>
                <li><a href="dashboard.html">Home</a></li>
                <li><a href="#">Devices</a>
                    <ul class="dropdown">
                        <li><a href="#">Device 1</a></li>
                        <li><a href="#">Device 2</a></li>
                        <!-- Add more devices as needed -->
                    </ul>
                </li>
                <li><a href="#">Settings</a>
                    <ul class="dropdown">
                        <li><a href="history.php">History</a></li>
                        <li><a href="profile.html">My Account</a></li>
                        <!-- Add more devices as needed -->
                    </ul>                
                </li>
            </ul>
        </nav>
    </header>

    <section id="content">
        <h2>History</h2>
        <table id="history-table">
            <thead>
                <tr>
                    <th>Text Changes</th>
                    <th>Time</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            <?php
    // Skrip PHP untuk mengambil dan menampilkan data langsung
    require_once "get_history.php";
    foreach ($historyData as $row) {
        echo "<tr>";
        echo "<td>{$row['text']}</td>";
        echo "<td>{$row['timestamp']}</td>";
        echo "<td>";
        echo "<form action='delete_history.php' method='post'>";
        echo "<input type='hidden' name='timestamp' value='{$row['timestamp']}'>";
        echo "<button type='submit' name='deleteHistory'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
            </tbody>
        </table>
    </section>
</body>
</html>
