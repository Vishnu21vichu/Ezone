<?php
// get_data.php
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

// Fetch all data except the first two rows
$sql = "SELECT user, logo FROM admin";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();

// Enable CORS
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo json_encode($data);
?>
