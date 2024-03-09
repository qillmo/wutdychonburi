<!-- header-section-->
<?php include 'backend-header.php'; ?>
<!-- /. header-section-->
<style>
    @media (max-width: 991px) {
        .responsive>thead th {
            display: none;
        }

        .responsive>tbody td,
        .responsive>tbody th {
            display: block;
        }

        .responsive>tbody>tr:nth-child(even) td,
        .responsive>tbody>tr:nth-child(even) th {
            background-color: #eee;
        }

        [row-header] {
            position: relative;
            width: 50%;
            vertical-align: middle;
        }

        [row-header]:before {
            content: attr(row-header);
            display: inline-block;
            vertical-align: middle;
            text-align: left;
            width: 50%;
            padding-right: 30px;
        }
    }
</style>
<div class="container" style="background-color: #ffffff;">
    <div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>SKU</th>
                                                <th>Price</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Type</th>
                                                <th>Image</th>
                                                <th>Badge</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "wutdychonburi";

                                            $conn = new mysqli($servername, $username, $password, $dbname);
                                            $sqlAll = "SELECT p.*,c.value as badge_path FROM product as p LEFT JOIN config as c ON p.badge = c.badge_text"; // Adjust the JOIN condition based on your actual structure

                                            $resultAll = $conn->query($sqlAll);

                                            if ($resultAll->num_rows > 0) {
                                                while ($rowAll = $resultAll->fetch_assoc()) {
                                                    echo '<tr>';
                                                    echo '<td>' . htmlspecialchars($rowAll["product_id"] ?? '') . '</td>';
                                                    echo '<td>' . htmlspecialchars($rowAll["sku"] ?? '') . '</td>';
                                                    echo '<td>' . htmlspecialchars($rowAll["price"] ?? '') . '</td>';
                                                    echo '<td>' . htmlspecialchars($rowAll["name"] ?? '') . '</td>';
                                                    echo '<td>' . htmlspecialchars($rowAll["description1"] ?? '') . '</td>';
                                                    echo '<td>' . htmlspecialchars($rowAll["type"] ?? '') . '</td>';

                                                    echo '<td>';
                                                    if (!empty($rowAll["picture_path"])) {
                                                        echo '<img src="' . $rowAll["picture_path"] . '" alt="Product Image" style="width:100px;" />';
                                                    } else {
                                                        echo '<img src="./pic/wutdy_logo.png" alt="Default Image" style="width:100px;" />';
                                                    }
                                                    echo '</td>';

                                                    echo '<td>';
                                                    if (!empty($rowAll["badge_path"])) {
                                                        echo '<img src="' . $rowAll["badge_path"] . '" alt="Product Image" style="width:50px;" />';
                                                    } else {
                                                        echo '<img src="./pic/wutdy_logo.png" alt="Default Image" style="width:50px;" />';
                                                    }
                                                    echo '</td>';

                                                    echo '<td><a href="edit_product.php?id=' . $rowAll["product_id"] . '"><button type="button" class="btn btn-info btn-xs">Edit</button></a></td>';
                                                    echo '<td><a href="delete_product.php?id=' . $rowAll["product_id"] . '"><button type="button" class="btn btn-danger btn-xs">Delete</button></a></td>';
                                                    echo '</tr>';
                                                }
                                            } else {
                                                echo '<tr><td colspan="12">No data available</td></tr>';
                                            }


                                            $conn->close();
                                            ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <hr>


    </div>
</div>
<!-- footer -->
<?php include 'footer.php'; ?>
<!-- /.footer -->