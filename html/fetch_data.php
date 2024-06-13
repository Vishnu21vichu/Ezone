<?php
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

// SQL query to retrieve data
$sql = "SELECT Place, Battery FROM map";
$result = $conn->query($sql);

$locations = array();

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $locations[] = $row;
    }
} 

$conn->close();

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($locations);
?>
