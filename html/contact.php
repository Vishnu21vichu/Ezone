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

    // Prepare and bind SQL statement for insert
    $stmt = $conn->prepare("INSERT INTO contactus (name, email, phone, location) VALUES (?, ?, ?, ?)");
    
    // Check if the statement is prepared successfully
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssss", $name, $email, $phone, $location);

    // Sanitize and set parameters
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $location = htmlspecialchars($_POST['location']);

    // Check if all parameters are valid
    if (!$name || !$email || !$phone || !$location) {
        die("Invalid data submitted.");
    }

    // Execute the statement
    if ($stmt->execute()) {
        header('Location: contactus.php');
        exit(); // Important to exit after redirection
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
