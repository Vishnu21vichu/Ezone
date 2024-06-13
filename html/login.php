<?php
include 'session.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming form fields are named "email" and "password"
    $email = $_POST["Email"];
    $password = $_POST["Password"];

    $_SESSION['Email'] = $email;

    // Validate form inputs (e.g., check for empty values, validate email format, etc.)
    if (empty($email) || empty($password)) {
        echo "<script>alert('Please fill in all fields.');</script>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.');</script>";
        exit;
    }

    $con = mysqli_connect("localhost", "root", "", "ezone");

    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

    $stmt = $con->prepare("SELECT email, password FROM signin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];

        // echo "Hashed Password from DB: " . $hashed_password . "<br>";
        // echo "Hashed Password from Login: " . password_hash($password, PASSWORD_DEFAULT) . "<br>";


        // Verify the password using password_verify
        if (password_verify($password, $hashed_password)) {
            // Password is correct, redirect to Index.php
            header('Location: Index.php');
            exit;
        } else {
            // Password is incorrect
            echo "<script>alert('Incorrect password.');</script>";
        }
    } else {
        // Email does not exist in the database
        echo "<script>alert('Email not found.');</script>";
    }

    $stmt->close();
    $con->close();
}
?>
