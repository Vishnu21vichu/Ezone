<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ezone";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement for update
    $stmt = $conn->prepare("UPDATE map SET Battery = ? WHERE Place = ?");
    $stmt->bind_param("ss", $Battery, $Place);

    // Set parameters and execute
    $Place = $_POST['Place'];
    $Battery = $_POST['Battery'];

    if ($stmt->execute()) {
        header('location: AdminDashboard.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>