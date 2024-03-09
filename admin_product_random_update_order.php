<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wutdychonburi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the received data
    $newOrder = isset($_POST['newOrder']) ? $_POST['newOrder'] : '';
    $newOrder = filter_var_array($newOrder, FILTER_SANITIZE_STRING);

    // Update the order numbers in the database
    updateOrderInDatabase($conn, $newOrder);

    // Close the MySQL connection
    $conn->close();
}

function updateOrderInDatabase($conn, $newOrder) {
    // Loop through the received order and update the order_number in the database
    foreach ($newOrder as $index => $productId) {
        $index = $index + 1; // Adjust the index to start from 1
        $productId = intval($productId); // Convert product ID to integer for security

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("UPDATE randomproducts SET order_number = ? WHERE product_id = ?");
        $stmt->bind_param("ii", $index, $productId);

        if ($stmt->execute() !== TRUE) {
            echo "Error updating order: " . $stmt->error;
            // You might want to handle errors appropriately in your application
        }

        $stmt->close();
    }

    echo "Order updated successfully";
}
?>
