<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming form fields are named "name", "email", and "Password"
    $username = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["Password"];

    // Validate form inputs (e.g., check for empty values, validate email format, etc.)
    if (empty($username) || empty($email) || empty($password)) {
        echo "Please fill in all fields.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    if (strlen($password) < 8 || !preg_match("/[A-Z]+/", $password) || !preg_match("/[a-z]+/", $password) || !preg_match("/\d+/", $password)) {
        echo "Please enter a strong password (at least 8 characters long, including uppercase, lowercase, and numbers).";
        exit;
    }

    // Additional password strength check if needed

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $con = mysqli_connect("localhost", "root", "", "ezone");

    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

    $stmt = $con->prepare("INSERT INTO signin (user, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);
    //echo "Hashed Password from DB:". $password."<br>";

    if ($stmt->execute()) {
        header('location: Index.php');
    }
    else {
        // Check for duplicate entry error
        if ($con->errno == 1062) { // MySQL error code for duplicate entry
            echo "It seems like you already have an account.";
        } else {
        echo "Error during registration: " . $stmt->error;
    }
}

    $stmt->close();
    $con->close();
}
?>