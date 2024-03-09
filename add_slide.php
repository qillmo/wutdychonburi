<!-- add_slide.php -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wutdychonburi";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the file was uploaded without errors
    if (isset($_FILES["newImageFile"]) && $_FILES["newImageFile"]["error"] == 0) {
        $newImagePath = "pic/slide/" . basename($_FILES["newImageFile"]["name"]);

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert data into the 'config' table
        $sqlInsert = "INSERT INTO config (menu, value, status, create_date, update_date) 
                      VALUES ('slide', '$newImagePath', 'active', NOW(), NOW())";

        if ($conn->query($sqlInsert) === TRUE) {
            // Upload the file to the 'pic/slide' directory
            move_uploaded_file($_FILES["newImageFile"]["tmp_name"], $newImagePath);
            echo "New image path added successfully";
            header("Location: admin_slide.php");
            exit(); // Make sure to exit after sending the header to prevent further execution
        } else {
            echo "Error adding image path: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Error uploading file.";
    }
}
?>
