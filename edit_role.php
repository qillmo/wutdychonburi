<!-- edit_role.php -->
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
    $id = $_GET["id"];  // Assuming you are passing the ID through the URL

    // Validate and sanitize the input data
    $editedRules = mysqli_real_escape_string($conn, $_POST["editedRules"]);

    // Update the data in the database
    $sql = "UPDATE config SET value = '$editedRules' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        $conn->close();
        header("Location: admin_rule.php");
        exit(); // Make sure to exit after sending the header to prevent further execution
    } else {
        echo "Error updating record: " . $conn->error;
        $conn->close();
    }
}
else {
    echo "Invalid request";
    $conn->close();
    exit();
}
?>


<!-- HTML Form for editing with TinyMCE -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rules</title>

    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/1sm87olnrewr90297v2o12pkyf486xlbw0n5nbcfvbezx4de/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
    </script>
</head>

<body>
    <h2>Rules</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>" method="post" enctype="multipart/form-data">
        <!-- Use a textarea for TinyMCE -->
        <textarea name="editedRules" id="editedRules"><?php echo $imagePath; ?></textarea>
        <br>
        <input type="submit" value="Save">
    </form>
</body>

</html>