<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ezone";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the orders table
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

// Build the HTML table rows
$tableRows = '';
if ($result->num_rows > 0) {
    $count = 1;
    while ($row = $result->fetch_assoc()) {
        $tableRows .= '<tr>';
        $tableRows .= '<td data-label="Sno">' . $count . '</td>';
        $tableRows .= '<td data-label="User">' . $row['User'] . '</td>';
        $tableRows .= '<td data-label="Category">' . $row['Category'] . '</td>';
        $tableRows .= '<td data-label="Model">' . $row['Model'] . '</td>';
        $tableRows .= '<td data-label="Unique No.">' . $row['Unique_No'] . '</td>';
        $tableRows .= '</tr>';
        $count++;
    }
}

// Output the table rows
echo $tableRows;

$conn->close();
?>