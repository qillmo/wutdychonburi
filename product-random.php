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
$sql = "SELECT pd.*, pd.sku as id FROM randomproducts AS rp INNER JOIN product AS pd on rp.product_id = pd.product_id order by rp.order_number";
$result = $conn->query($sql);

// SQL query to count total rows
$sqlCount = "SELECT COUNT(*) AS total FROM product WHERE type LIKE '%ยอดนิยม%'";
$resultCount = $conn->query($sqlCount);
$rowCount = $resultCount->fetch_assoc();
$totalPages = ceil($rowCount['total'] / $itemsPerPage);

// Close the MySQL connection
$conn->close();
?>
<style>
    th {
        text-align: center;
        background-color: #f2f2f2;
    }

    img.badge-gif {
        max-width: 100%;
        height: auto;
    }

    .product-image {
        max-width: 100%;
        height: auto;
    }
</style>

<div class="container" style="position: relative;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="7">พระยอดนิยม Random</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $counter = 0;
            while ($row = $result->fetch_assoc()) {
                if ($counter % 6 === 0) {
                    echo '<tr>';
                }
                echo '<td style="width: 14.28%;background:white;">';

                // Check if .gif file exists for the badge and display it
                $gifFilePath = "./pic/hot.gif"; // Replace with the actual path to your GIF file
                if (file_exists($gifFilePath) && $row["badge"] !== null && $row["badge"] !== '') {
                    echo '<img src="' . $gifFilePath . '" alt="Badge" class="badge-gif" />';
                }

                $picturePaths = $row['picture_path'] ? explode(';', $row['picture_path']) : null;

                // if (!empty($picturePaths)) {
                //     foreach ($picturePaths as $path) {
                //         echo '<img src="./pic/product_img/' . $row["product_id"] . '/' . $path . '" alt="" class="product-image">';
                //     }
                // } else {
                //     // Display default image if $picturePaths is null or empty
                //     echo '<img src="./pic/wutdy_logo.png" alt="Default Image" class="product-image" />';
                // }

                // Display only the first image or a default image if $picturePaths is null or empty
                if (!empty($picturePaths) && isset($picturePaths[0])) {
                    echo '<img src="./pic/product_img/' . $row["product_id"] . '/' . $picturePaths[0] . '" alt="" class="product-image">';
                } else {
                    // Display default image if $picturePaths is null or empty
                    echo '<img src="./pic/wutdy_logo.png" alt="Default Image" class="product-image" />';
                }


                echo '<h5><a href="detail.php?id=' . $row["sku"] . '">' . $row["name"] . '</a></h5>';
                echo '<a href="detail.php?id=' . $row["sku"] . '" class="product-price">' . $row["price"] . ' บาท</a>';
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