<?php
// Assuming you have a MySQL connection established

// Your MySQL connection configuration
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

// Pagination parameters
$itemsPerPage = 6 * 7; // 6 rows and 6 columns per page
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Get the current page number
$offset = ($page - 1) * $itemsPerPage; // Calculate the offset

// SQL query with LIMIT for pagination
$sql = "SELECT product_id as id, name, price, badge FROM product WHERE type LIKE '%พระหลักแสน%' LIMIT $offset, $itemsPerPage";
$result = $conn->query($sql);

// SQL query to count total rows
$sqlCount = "SELECT COUNT(*) AS total FROM product WHERE type LIKE '%พระหลักแสน%'";
$resultCount = $conn->query($sqlCount);
$rowCount = $resultCount->fetch_assoc();
$totalPages = ceil($rowCount['total'] / $itemsPerPage);

// Close the MySQL connection
$conn->close();
?>

<!-- Your HTML structure using a responsive table -->
<div class="container" style="width: 1500px;position: relative;">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="2">พระหลักแสน</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $counter = 0;
                while ($row = $result->fetch_assoc()) {
                    // Start a new row for every 6th product
                    if ($counter % 6 === 0) {
                        echo '<tr>';
                    }

                    echo '<td style="width: 14.28%;background:white;">';

                    // Check if .gif file exists for the badge and display it
                    $gifFilePath = "./pic/hot.gif"; // Replace with the actual path to your GIF file
                    if (file_exists($gifFilePath) && $row["badge"] !== null && $row["badge"] !== '') {
                        echo '<img src="' . $gifFilePath . '" alt="Badge" class="badge-gif" />';
                    }

                    // Add a link to detail.php with the product ID
                    echo '<a href="detail.php?id=' . $row["id"] . '">';
                    echo '<img src="./pic/wutdy_logo.png" alt="" class="product-image" />';
                    echo '<h5><a href="detail.php?id=' . $row["id"] . '">' . $row["name"] . '</a></h5>';
                    echo '<a href="detail.php?id=' . $row["id"] . '" class="product-price">' . $row["price"] . ' บาท</a>';
                    echo '</a>';

                    echo '</td>';

                    // End the row for every 6th product
                    if ($counter % 6 === 5) {
                        echo '</tr>';
                    }

                    $counter++;
                }

                // If the last row is not completed with 6 products, close it
                if ($counter % 7 !== 0) {
                    echo '</tr>';
                }
                ?>

            </tbody>
        </table>
    </div>
</div>

<!-- Pagination links -->
<div class="pagination" style="position: relative;">
    <?php
    // Display previous button
    if ($page > 1) {
        echo '<a href="?page=' . ($page - 1) . '">Previous</a>';
    }

    // Display page numbers
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="?page=' . $i . '">' . $i . '</a>';
    }

    // Display next button
    if ($page < $totalPages) {
        echo '<a href="?page=' . ($page + 1) . '">Next</a>';
    }
    ?>
</div>