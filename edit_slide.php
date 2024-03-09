<!-- edit.php -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wutdychonburi";
$conn = new mysqli($servername, $username, $password, $dbname);
// Initialize $id and $imagePath to avoid undefined variable warnings
$id = $imagePath = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch data from the 'config' table based on ID

    $sql = "SELECT id, value FROM config WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $imagePath = $row["value"];
        $conn->close();
    } else {
        echo "Invalid ID";
        $conn->close();
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission for updating the image path
    $id = $_GET["id"];
    // Assuming you have a folder named 'pic/slide' to store the images
    $targetDir = "./pic/slide/";

    // Get the uploaded file name
    $newImageName = basename($_FILES["newImage"]["name"]);

    // Set the target path for the new image
    $targetPath = $targetDir . $newImageName;

    // Update the 'config' table with the new image path
    $sqlUpdate = "UPDATE config SET value = '$targetPath' WHERE id = $id";
    if ($conn->query($sqlUpdate) === TRUE) {
        // Upload the new image to the 'pic/slide' folder
        move_uploaded_file($_FILES["newImage"]["tmp_name"], $targetPath);
        echo "Image path updated successfully";
        header("Location: admin_slide.php");
        exit(); // Make sure to exit after sending the header to prevent further execution
    } else {
        echo "Error updating image path: " . $conn->error;
    }
    $conn->close();
} else {
    echo "Invalid request";
    $conn->close();
    exit();
}
?>

<!-- HTML Form for editing -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Image Path</title>
</head>

<body>
    <h2>Edit Image Path</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>" method="post" enctype="multipart/form-data">
        <label for="newImage">Upload New Image:</label>
        <input type="file" name="newImage" id="newImage" accept="image/*">
        <br>
        <input type="submit" value="Save">
    </form>
</body>

</html>