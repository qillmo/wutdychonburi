<!-- header-section -->
<?php include 'backend-header.php'; ?>
<!-- /.header-section -->

<div class="container" style="background-color: #ffffff;">
    <div class="text-center">
        <h2>Edit Product</h2>
    </div>
    
    <!-- Fetch the product data based on the ID passed in the URL -->
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wutdychonburi";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $productId = $_GET["id"];
        $sqlEdit = "SELECT p.*, c.value as badge_path FROM product as p LEFT JOIN config as c ON p.badge = c.badge_text WHERE p.product_id = $productId";
        $resultEdit = $conn->query($sqlEdit);

        if ($resultEdit->num_rows > 0) {
            $rowEdit = $resultEdit->fetch_assoc();
        } else {
            echo "Product not found";
            exit();
        }
    } else {
        echo "Invalid request";
        exit();
    }
    ?>

    <div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="update_product.php" method="post" enctype="multipart/form-data">
                                        <!-- Hidden field to store the product ID -->
                                        <input type="hidden" name="productId" value="<?php echo $rowEdit["product_id"]; ?>">
                                        
                                        <!-- Your input fields for editing -->
                                        <!-- Add appropriate input fields and set their values based on $rowEdit -->

                                        <label for="editSKU">SKU:</label>
                                        <input type="text" id="editSKU" name="editSKU" value="<?php echo htmlspecialchars($rowEdit["sku"] ?? ''); ?>" required>
                                        <br><br>

                                        <!-- Add other input fields here for Price, Name, Description, Type, etc. -->
                                        
                                        <label for="editImageFile">Upload New Image:</label>
                                        <input type="file" name="editImageFile" id="editImageFile" accept="image/*">
                                        <br>

                                        <!-- Add other input fields or file upload for Badge if needed -->

                                        <br>
                                        <input type="submit" value="Update Product">
                                    </form>
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

<?php
$conn->close();
?>
