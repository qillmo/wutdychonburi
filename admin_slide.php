<!-- header-section-->
<?php include 'backend-header.php'; ?>
<!-- /. header-section-->

<div class="container" style="background-color: #ffffff;">
    <div class="text-center">
        <h2>ตัวอย่างรูปสไลด์</h2>
    </div>

    <div>
        <div class="slider">
            <div class="owl-carousel owl-one owl-theme">
                <?php
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

                // Fetch data from the 'config' table where menu is 'slide'
                $sql = "SELECT id, value FROM config WHERE menu = 'slide'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="item">';
                        echo '<div class="slider-img">';
                        echo '<img src="' . $row["value"] . '" alt="" width="50%" />';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No slides available</p>';
                }

                $conn->close();
                ?>
            </div>
        </div>

        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">

                    <div class="col-lg-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Image</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Image Path</th>
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
                                            // Fetch all data from the 'config' table
                                            $conn = new mysqli($servername, $username, $password, $dbname);
                                            $sqlAll = "SELECT id, value FROM config where menu = 'slide'";
                                            $resultAll = $conn->query($sqlAll);

                                            if ($resultAll->num_rows > 0) {
                                                while ($rowAll = $resultAll->fetch_assoc()) {
                                                    echo '<tr>';
                                                    echo '<td>' . $rowAll["id"] . '</td>';
                                                    echo '<td>' . $rowAll["value"] . '</td>';
                                                    echo '<td><a href="edit_slide.php?id=' . $rowAll["id"] . '"><button type="button" class="btn btn-info btn-xs">Edit</button></a></td>';
                                                    echo '<td><a href="delete_slide.php?id=' . $rowAll["id"] . '"><button type="button" class="btn btn-danger btn-xs">Delete</button></a></td>';
                                                    echo '</tr>';
                                                }
                                            } else {
                                                echo '<tr><td colspan="4">No data available</td></tr>';
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

        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">

                    <div class="col-lg-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Image</h4>
                                <div class="table-responsive">
                                    <form action="add_slide.php" method="post" enctype="multipart/form-data">
                                        <label for="newImageFile">Upload Image File:</label>
                                        <input type="file" name="newImageFile" id="newImageFile" accept="image/*" required>
                                        <br>
                                        <input type="submit" value="Add Image Path">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <hr>
        <!-- <div class="table-container" style="padding: 15px;">
            <div class="row">
                <div class="col-md-6">
                    <h3>Edit Image</h3>
                    <table border="1">
                        <tr>
                            <th>ID</th>
                            <th>Image Path</th>
                            <th>Action</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "wutdychonburi";
                        // Fetch all data from the 'config' table
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        $sqlAll = "SELECT id, value FROM config where menu = 'slide'";
                        $resultAll = $conn->query($sqlAll);

                        if ($resultAll->num_rows > 0) {
                            while ($rowAll = $resultAll->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $rowAll["id"] . '</td>';
                                echo '<td>' . $rowAll["value"] . '</td>';
                                echo '<td><button type="button" class="btn btn-info btn-xs"><a href="edit_slide.php?id=' . $rowAll["id"] . '">Edit</a></button></td>';
                                echo '<td><button type="button" class="btn btn-danger btn-xs"><a href="delete_slide.php?id=' . $rowAll["id"] . '">Delete</a></button></td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="4">No data available</td></tr>';
                        }

                        $conn->close();
                        ?>
                    </table>
                </div>
                <div class="col-md-6">
                    <h3>Add Image</h3>
                    <form action="add_slide.php" method="post" enctype="multipart/form-data">
                        <label for="newImageFile">Upload Image File:</label>
                        <input type="file" name="newImageFile" id="newImageFile" accept="image/*" required>
                        <br>
                        <input type="submit" value="Add Image Path">
                    </form>
                </div>
            </div>
        </div> -->
    </div>
</div>
<!-- footer -->
<?php include 'footer.php'; ?>
<!-- /.footer -->