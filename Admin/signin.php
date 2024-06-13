<?php
include '../html/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Retrieve form data
    $Adminname = $_POST["adminname"];
    $password = $_POST["adminpassword"];
    
    // Check if the logo file is present
    if (!isset($_FILES["logo"])) {
        echo "Please upload a logo.";
        exit;
    }
    
    $logo = $_FILES["logo"];

    // Validate form inputs
    if (empty($Adminname) || empty($password) || $logo["error"] != UPLOAD_ERR_OK) {
        echo "Please fill in all fields and upload a valid logo.";
        exit;
    }

    // Additional password strength check if needed
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Create a connection
    $con = mysqli_connect("localhost", "root", "", "ezone");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

    // Handle file upload
    $uploadDir = "uploads/";
    $uploadFile = $uploadDir . basename($logo["name"]);
    if (!move_uploaded_file($logo["tmp_name"], $uploadFile)) {
        echo "Error uploading the file.";
        exit;
    }

    // Prepare SQL statement
    $stmt = $con->prepare("INSERT INTO admin (user, password, logo) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $Adminname, $hashed_password, $uploadFile);

    if ($stmt->execute()) {
        header('location: AdminDashboard.php');
    } else {
        echo "Error during registration: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
}
?>
