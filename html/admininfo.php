<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $adminname = $_POST["adminname"];
    $adminpassword = $_POST["adminpassword"];

    // Create a connection
    $con = mysqli_connect("localhost", "root", "", "ezone");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

    // Prepare SQL statement to fetch admin's credentials
    $stmt = $con->prepare("SELECT password FROM admin WHERE user = ?");
    $stmt->bind_param("s", $adminname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Admin user exists, fetch the hashed password
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verify the entered password with the hashed password
        if (password_verify($adminpassword, $hashed_password)) {
            // Passwords match, send a success response
            echo json_encode(array("valid" => true));
        } else {
            // Incorrect password, send an error response
            echo json_encode(array("valid" => false, "message" => "Incorrect password."));
        }
    } else {
        // Admin user not found, send an error response
        echo json_encode(array("valid" => false, "message" => "Admin user not found."));
    }

    $stmt->close();
    $con->close();
}
?>