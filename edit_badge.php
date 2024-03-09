<!-- edit.php -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wutdychonburi";
$conn = new mysqli($servername, $username, $password, $dbname);
// Initialize $id and $imagePath to avoid undefined variable warnings
$id = $imagePath = $badgeText = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch data from the 'config' table based on ID

    $sql = "SELECT id, value, badge_text FROM config WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $imagePath = $row["value"];
        $badgeText = $row["badge_text"];
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
    $targetDir = "./pic/badge_img/";

    // Get the uploaded file name
    $newImageName = basename($_FILES["newImage"]["name"]);
    $newTagLabel =  $_GET["newTagLabel"];

    // Set the target path for the new image
    $targetPath = $targetDir . $newImageName;

    // Update the 'config' table with the new image path
    $sqlUpdate = "UPDATE config SET value = '$targetPath',badge_text = '$newTagLabel' WHERE id = $id";
    if ($conn->query($sqlUpdate) === TRUE) {
        // Upload the new image to the 'pic/slide' folder
        move_uploaded_file($_FILES["newImage"]["tmp_name"], $targetPath);
        echo "Image path updated successfully";
        header("Location: admin_badge.php");
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
    <title>Edit Badge</title>
</head>

<body>
    <h2>Edit Badge</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>" method="post" enctype="multipart/form-data">
        <label for="newTagLabel">Tag Label (ยอดนิยม,ล่าสุด):</label>
        <input type="text" id="newTagLabel" name="newTagLabel" required>
        <br><br>
        <label for="newImage">Upload New GIF:</label>
        <input type="file" name="newImage" id="newImage" accept="image/*">
        <br>
        <input type="submit" value="Save">
    </form>
</body>

</html>