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
    $stmt = $conn->prepare("UPDATE product SET quantity = ? WHERE name = ? AND product_type = ?");
    $stmt->bind_param("iss", $quantity, $name, $product_type);

    // Set parameters and execute
    $name = $_POST['name'];
    $product_type = $_POST['product_type'];
    $quantity = $_POST['quantity'];

    if ($stmt->execute()) {
        header('Location: AdminDashboard.php');
        exit(); // Make sure to stop the script execution after redirection
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
