<!-- header-section-->
<?php include 'backend-header.php'; ?>
<!-- /. header-section-->

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

// SQL query with ORDER BY to sort by order_number
$sql = "SELECT pd.product_id, pd.picture_path, rp.order_number, rp.`type`,pd.name,pd.price FROM randomproducts AS rp INNER JOIN product AS pd on rp.product_id = pd.product_id order by rp.order_number";
$result = $conn->query($sql);
?>

<div class="container" style="background-color: #ffffff;">
    <div class="text-center">
        <h2>ตัวอย่างตาราง Random</h2>
    </div>

    <div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Random Product</h4>
                                <!-- Create a draggable table -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อ</th>
                                            <th>ราคา</th>
                                            <th>ประเภท</th>
                                            <th>ตัวอย่างรูปภาพ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Fetch and display data for the draggable table
                                        $result->data_seek(0); // Reset result pointer to the beginning
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr class="item" draggable="true" data-id="' . $row['product_id'] . '">';
                                            echo '<td>' . $row['order_number'] . '</td>';
                                            echo '<td>' . $row['name'] . '</td>';
                                            echo '<td>' . $row['price'] . '</td>';
                                            echo '<td>' . $row['type'] . '</td>';

                                            // Check if picture_path is null, display default image 'pic.jpg'
                                            $imagePath = $row['picture_path'] ? './pic/product_img/' . $row['product_id'] . '/' . $row['picture_path'] : './pic/wutdy_logo.png';

                                            echo '<td><img src="' . $imagePath . '" alt="Product Image" style="max-width: 100px;"></td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>

                                <!-- Add an "OK" button for the user to save the order -->
                                <button id="saveOrderButton" class="btn btn-primary mt-3">ตกลง</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    const sortableTable = document.querySelector(".table tbody");
    const rows = sortableTable.querySelectorAll("tr");

    rows.forEach(row => {
        row.addEventListener("dragstart", () => {
            setTimeout(() => row.classList.add("dragging"), 0);
        });
    });

    sortableTable.addEventListener("dragover", initSortableTable);
    sortableTable.addEventListener("dragenter", e => e.preventDefault());

    // Add an event listener to the "OK" button
    const saveOrderButton = document.getElementById("saveOrderButton");
    saveOrderButton.addEventListener("click", function() {
        // Extracting product IDs from the updated order
        const newOrder = Array.from(sortableTable.children).map(row => row.dataset.id);

        // Sending the new order to the server
        saveNewOrderToDatabase(newOrder);
    });

    function initSortableTable(e) {
        e.preventDefault();
        const draggingRow = document.querySelector(".dragging");
        let siblings = [...sortableTable.querySelectorAll("tr:not(.dragging)")];
        let nextSibling = siblings.find(sibling => e.clientY <= sibling.offsetTop + sibling.offsetHeight / 2);
        sortableTable.insertBefore(draggingRow, nextSibling);
    }

    function saveNewOrderToDatabase(newOrder) {
        $.ajax({
            type: "POST",
            url: "admin_product_random_update_order.php",
            data: {
                newOrder: newOrder
            },
            success: function(response) {
                if (response === 'Order updated successfully') {
                    location.reload();
                }
            },
            error: function(error) {
                console.error(error);
                // Handle error, e.g., display an error message
            }
        });
    }
</script>

<!-- footer -->
<?php include 'footer.php'; ?>
<!-- /.footer -->

<?php
// Close the MySQL connection
$conn->close();
?>