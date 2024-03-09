<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wutdychonburi";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the file was uploaded without errors
    if (isset($_FILES["newImageFile"]) && $_FILES["newImageFile"]["error"] == 0) {
        $newImagePath = "pic/product_img/" . basename($_FILES["newImageFile"]["name"]);
        $sku = $_POST['sku'];
        $price = $_POST['price'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $badge = $_POST['badge'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert data into the 'product' table
        $sqlInsert = "INSERT INTO product (sku, price, name, description1, type, badge, picture_path) 
                      VALUES ('$sku', '$price', '$name', '$description', '$badge', '$newImagePath', NOW())";

        if ($conn->query($sqlInsert) === TRUE) {
            // Upload the file to the 'pic/product_img' directory
            move_uploaded_file($_FILES["newImageFile"]["tmp_name"], $newImagePath);
            echo "New product added successfully";
            header("Location: admin_product.php");
            exit(); // Make sure to exit after sending the header to prevent further execution
        } else {
            echo "Error adding product: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Error uploading file.";
    }
}
?>
