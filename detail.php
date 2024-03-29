<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    echo "Invalid request";
}
?>

<style>
    .container-detail {
        max-width: 1300px;
        margin: 0 auto;
        position: relative;
    }

    .header-detail {
        color: red;
    }

    .full-image {
        display: flex;
        justify-content: center; /* จัดวางรูปตรงกลาง */
        align-items: center; /* จัดวางรูปตรงกลาง */
        max-width: 100%;
        background-color: #fff;
        padding: 20px;
    }


    .box-image img {
        max-width: 100px;
    }

    .body-detail {
        text-align: center;
    }

    @media only screen and (max-width: 1000px) {
        .full-image img{
        max-width: 300px;
    }
    }
</style>

<?php include 'header.php'; ?>
<div class="container-detail">
    <div class="header-detail">
        <span>หน้าหลัก / พระยอดนิยม / เหรียญเจ้าสัววัดกลางบางแก้วรุ่น2เนื้อนวะโลหะปี2535สภาพสวยพร้อมกล่องเดิมจากวัด</span>
    </div>
    <div class="row">
        <div class="col">
            <div class="full-image">
                <img src="./pic/product_img/2/416027378_917084543155495_7658685679343781971_n.jpg" />
            </div>
            <div class="full-image">
                <img src="./pic/product_img/2/416027378_917084543155495_7658685679343781971_n.jpg" />
            </div>
            <div class="full-image">
                <img src="./pic/product_img/2/416027378_917084543155495_7658685679343781971_n.jpg" />
            </div>
            <div class="full-image">
                <img src="./pic/product_img/2/416027378_917084543155495_7658685679343781971_n.jpg" />
            </div>
            <div class="full-image">
                <img src="./pic/product_img/2/416027378_917084543155495_7658685679343781971_n.jpg" />
            </div>
            <div class="full-image">
                <img src="./pic/product_img/2/416027378_917084543155495_7658685679343781971_n.jpg" />
            </div>
        </div>
    </div>


    <?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "wutdychonburi";

    // // Create connection
    // $conn = new mysqli($servername, $username, $password, $dbname);

    // // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    // // SQL query to fetch data for the specified product_id
    // $sql = "SELECT * FROM product WHERE sku = '$id'";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     // Fetch and display data
    //     $row = $result->fetch_assoc();
    //     // echo '<pre>';
    //     // var_dump($row);
    //     // echo '</pre>';
    //     // echo '<pre>';
    //     // var_dump($sql);
    //     // echo '</pre>';

    //     include 'header.php';
    //     echo '<div class="container" style="padding: 50px;position: relative;">';
    //     echo '<div class="post-block" style="height: 1173px; padding:50px;font-size: 3rem;line-height: 1.5;">';
    //     echo '<div style="text-align: center;">';
    //     echo '<img src="./pic/wutdy_logo.png" alt="" style="width: 20%" />';

    //     // Display right panel for switching pictures
    //     echo '<div style="float: right; max-width: 100px; overflow-y: auto; height: 400px;">';

    //     // Split picture paths and display them as thumbnails
    //     $picturePaths = $row['picture_path'] ? explode(';', $row['picture_path']) : null;
    //     if (!empty($picturePaths)) {
    //         foreach ($picturePaths as $path) {
    //             echo '<img src="./pic/product_img/' . $row["product_id"] . '/' . $path . '" alt="" style="max-width: 100%;" class="thumbnail" onclick="switchImage(\'' . $path . '\')" />';
    //         }
    //     }

    //     echo '</div>';

    //     echo '</div>';
    //     echo '<div>';
    //     echo '<h2><strong>' . $row["name"] . '</strong></h2>';
    //     echo '<p>' . $row["description1"] . '</p>';
    //     echo '<p>' . $row["price"] . '</p>';
    //     echo '</div>';
    //     echo '</div>';
    //     echo '</div>';
    // } else {
    //     echo "No data found for product ID $productID";
    // }

    // // Close the MySQL connection
    // $conn->close();
    ?>