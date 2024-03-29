<?php
// Assuming you have a MySQL connection established
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
$sql = "SELECT pd.* FROM product pd WHERE type LIKE '%พระหลักพัน%' LIMIT $offset, $itemsPerPage";
$result = $conn->query($sql);

// SQL query to count total rows
$sqlCount = "SELECT COUNT(*) AS total FROM product WHERE type LIKE '%พระหลักพัน%'";
$resultCount = $conn->query($sqlCount);
$rowCount = $resultCount->fetch_assoc();
$totalPages = ceil($rowCount['total'] / $itemsPerPage);

// Close the MySQL connection
$conn->close();
?>
<style>
    .container-random-v2 {
        max-width: 1300px;
        margin: 0 auto;
        position: relative;
    }

    .product-img-v2 {
        /* width: 100px; */
        padding: 5px;
        margin: 0 auto;
    }

    .product-img-v2 img {
        width: 100%;
        max-height: 600px;
    }

    .product-container-v2 {
        display: grid;
        grid-template-columns: repeat(6, [col] 1fr);
        grid-template-rows: repeat(5, [row] auto);
        grid-gap: 2px;
    }

    .product-item-v2 {
        background-color: #fff;
        /* box-shadow: 0 0 3px rgb(0, 0, 0, 0.3); */
    }
    
    .product-item-v2:hover {
            background-color: #97B3D4;
        }
        

    .product-detail-v2 {
        padding: 1rem;
        font-family: "Kanit", sans-serif;
        font-weight: 500;
        font-style: normal;
    }

    .product-price-v2 {
        width: 100%;
        text-align: center;
        color: rgb(63, 172, 10);
        font-family: "Kanit", sans-serif;
        font-weight: 700;
        font-style: normal;
        font-size: 1.5rem;
    }

    .product-title-v2 {
        width: 100%;
        text-align: center;
        /* background-color: #fff; */
        font-family: "Kanit", sans-serif;
        font-weight: 700;
        font-size: 2rem;
        font-style: normal;
        color: #fff;
        padding: 10px;
    }

    @media only screen and (max-width: 1000px) {
        .product-container-v2 {
            grid-template-columns: repeat(6, [col] 1fr);
            /* ปรับจำนวนคอลัมน์ให้น้อยลงเมื่อหน้าจอมีขนาดเล็กลง */
            grid-gap: 2px;
        }

        .product-detail-v2 {
            padding: 0.5rem;
            font-family: "Kanit", sans-serif;
            font-weight: 300;
            font-style: normal;
            font-size: 0.5rem;
        }

        .product-img-v2 {
            width: 100%;
            padding: 5px;
            margin: 0 auto;
        }

        .product-img-v2 img {
            width: 100%;
            max-height: 200px;
        }

        .product-price-v2 {
            width: 100%;
            text-align: center;
            color: rgb(63, 172, 10);
            font-family: "Kanit", sans-serif;
            font-weight: 700;
            font-style: normal;
            font-size: 0.7rem;
            padding: 0px 5px;
        }

    }
</style>

<div class="container-random-v2">
    <div class="product-title-v2">
        <span>พระหลักพัน</span>
    </div>
    <div class="product-container-v2">
        <?php
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product-item-v2">';
            echo '<div class="product-img-v2">';

            $picturePaths = $row['picture_path'] ? explode(';', $row['picture_path']) : null;

            if (!empty($picturePaths) && isset($picturePaths[0])) {
                echo '<img src="./pic/product_img/' . $row["product_id"] . '/' . $picturePaths[0] . '" alt="">';
            } else {
                echo '<img src="./pic/product_img/2/422923674_1648187856008001_2301797054567655180_n.jpg" alt="Default Image" />';
            }
            echo '</div>';
            $text = $row["name"];
            $max_length = 80;
            $truncated_text = mb_strimwidth($text, 0, $max_length, "...", 'UTF-8');
            echo '<a href="detail.php?id=' . $row["sku"] . '">';
            echo '<div class="product-detail-v2">' . $truncated_text . '</div>';
            echo '<div class="product-price-v2">฿ ' . number_format($row["price"]) . '</div>';
            echo '</a>';
            echo '</div>';
        }
        ?>
    </div>