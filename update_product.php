<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wutdychonburi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $productId = $_POST["productId"];
    $editSKU = $_POST["editSKU"];

    // Handle other form fields similarly

    // Check if a new image file was uploaded
    if (isset($_FILES["editImageFile"]) && $_FILES["editImageFile"]["error"] == 0) {
        $newImagePath = "pic/product_img" . basename($_FILES["editImageFile"]["name"]);

        // Update the product with the new image path
        $sqlUpdateImage = "UPDATE product SET picture_path = '$newImagePath',sku = '$editSKU' WHERE product_id = $productId";
        $conn->query($sqlUpdateImage);

        // Move the uploaded file to the specified directory
        move_uploaded_file($_FILES["editImageFile"]["tmp_name"], $newImagePath);
    }

    // Update other product information in a similar way

    // Redirect back to the product listing page
    header("Location: admin_product.php");
    exit();
} else {
    echo "Invalid request";
    exit();
}

$conn->close();
?>
