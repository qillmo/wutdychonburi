<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wutdychonburi";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch the image path based on ID
    $sql = "SELECT value FROM config WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $imagePath = $row["value"];

        // Delete the record from the 'config' table
        $sqlDelete = "DELETE FROM config WHERE id = $id";

        if ($conn->query($sqlDelete) === TRUE) {
            // Delete the image file from the server
            if (file_exists($imagePath)) {
                unlink($imagePath);
                echo "Record and image deleted successfully";
                header("Location: admin_slide.php");
                exit(); // Make sure to exit after sending the header to prevent further execution
            } else {
                echo "Record deleted, but image file not found";
            }
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Invalid ID";
    }

    $conn->close();
} else {
    echo "Invalid request";
}
?>
