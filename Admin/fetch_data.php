<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ezone";

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

// Handle deletion if a POST request is received
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_id"])) {
    $delete_id = $_POST["delete_id"];
    $delete_query = "DELETE FROM contactus WHERE id = ?";
    
    // Prepare statement
    if ($stmt = $link->prepare($delete_query)) {
        $stmt->bind_param("i", $delete_id);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $link->error;
    }

    // Close connection
    $link->close();
    exit; // Stop further execution
}

// Assuming you have already established a database connection
$res = mysqli_query($link, "SELECT * FROM contactus");
if ($res) {
    while ($row = mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["location"] . "</td>";
        echo "<td><button class='done-row' data-id='" . $row["id"] . "'>✔️</button></td>"; // Action column with button
        echo "</tr>";
    }
} else {
    echo "Error fetching data: " . mysqli_error($link);
}

$link->close();
?>
